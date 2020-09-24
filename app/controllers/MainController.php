<?php

namespace app\controllers;

use app\models\Task;
use ishop\base\Controller;
use ishop\base\DB;
use ishop\Paginator;

class MainController extends Controller {

    public $layout = 'default';



    public function ajaxAction(){
        $db = DB::db_conect();
        $model =  new Task();
        $pages = new Paginator('3','page');
        $row = $model->getRows();
        $total = $row[0];
        $pages->set_total($total);
        $order = $_POST["order"];
        if($order == 'desc') {
            $order = 'asc';
        } else {
            $order = 'desc';
        }
        $sql = "SELECT * FROM task ORDER BY ".$_POST["column_name"]." ".$_POST["order"]. " " . $pages->get_limit();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        $this->set(compact('row','order','pages'));
    }


    

    public function indexAction(){
        $model =  new Task();
        $pages = new Paginator('3','page');
        $row = $model->getRows();
        $total = $row[0];
        $pages->set_total($total);
        $db = DB::db_conect();
        
        if(isset($_SESSION['sort'])){
            $column = key($_SESSION['sort']);
            $value = $_SESSION['sort'][$column];
            $query = "ORDER BY $column $value";
            $stmt = $db->prepare("SELECT * FROM task $query " . $pages->get_limit());
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_OBJ);
            $this->set(compact('data','pages'));
        }else{
            $stmt = $db->prepare("SELECT * FROM task " . $pages->get_limit());
            $stmt->execute();
            $data = $stmt->fetchAll(\PDO::FETCH_OBJ);
            $this->set(compact('data','pages'));    
        }
    

        if(isset($_POST['add-task'])){
            if(!empty($_POST['task']) & !empty($_POST['email'])) {
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    $model->addTask($_POST);
                    header('Location: /');
                }else{
                    $msg = 'Не правильная валидация майла!';
                    $this->set(compact('msg','task'));
                }
            }
        }
    }


    public function pageAdminAction() {
        if($_SESSION['admin'] !== 'admin'){
            header('Location: /');
        }else{
            $model = new Task();
            $data = $model->getTask();
            $this->set(compact('data'));
        }
    }


    public function authAdminAction(){
        if (isset($_POST['entry'])) {
            $model = new Task();
            if (!empty($_POST['username']) & !empty($_POST['password'])) {
                $user = $model->logInAdmin($_POST);
                if (@$user->role !== 'admin') {
                    $msg = 'Вы не являетесь админом';
                    $this->set(compact('msg'));
                }else{
                    $data = $model->getTask();
                    $_SESSION['admin'] = $_POST['username'];
                    $data = $model->getTask();
                    $this->set(compact('data'));
                    header('Location: /main/page-admin/');
                }
            }
        }
    }




    public function logOutAdminAction() {
        $_SESSION['admin'] = '';
        $_SESSION = [];
        session_destroy();
        header("Location: /");
    }



    public function updatePageAction() {
        if($_SESSION['admin'] !== 'admin'){
            header('Location: /');
            die();
        }

        $db = DB::db_conect();
        $sql = "SELECT * FROM task WHERE id = ?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        $this->set(compact('row'));

        if(isset($_POST['update-task'])){
         $model = new Task();           
           try{
               $db = DB::db_conect();
               $sql = "UPDATE task SET task = ?, email = ?, status = ?, edit = ? WHERE id= ?";
               $stmt= $db->prepare($sql);
               $stmt->execute([$_POST['task'], $_POST['email'], $_POST['status'],'Редактировано администратором',$_GET['id']]);
               $row = $model->getRow($_GET['id']);
               $this->set(compact('row'));
           }catch (\Exception $e){
               echo 'Ошибка ' . $e->getMessage() . '<br> Строка ошибки : ' . $e->getLine() . '<br>'. 'Файл ошибки ' . $e->getFile();
               die();
           }

       }
    }


}