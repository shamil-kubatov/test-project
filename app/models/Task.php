<?php


namespace app\models;

use ishop\base\DB;

class Task  extends DB {

    public function getTask(){
        $db = DB::db_conect();
        $stmt = $db->prepare("SELECT * FROM task");
        $stmt->execute();
        $task = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $task;
    }


    public function addTask($data){
        try{
            $db = DB::db_conect();
            $sql = "INSERT INTO task (task, email) VALUES (?, ?)";
            $stmt= $db->prepare($sql);
            $stmt->execute([$data['task'], $data['email']]);
        }catch (\Exception $e){
            echo 'Ошибка ' . $e->getMessage() . '<br> Строка ошибки : ' . $e->getLine() . '<br>'. 'Файл ошибки ' . $e->getFile();
            die();
        }
        return true;
    }

    public function logInAdmin($data){
        try{
            $db = DB::db_conect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = :username and password = :password");
            $stmt->execute(array(':username' => $data['username'], ':password' => $data['password']));
            $user = $stmt->fetch(\PDO::FETCH_OBJ);
            return $user;
        }catch (\Exception $e){
            echo 'Ошибка ' . $e->getMessage() . '<br> Строка ошибки : ' . $e->getLine() . '<br>'. 'Файл ошибки ' . $e->getFile();
            die();
        }
    }


    public function getRows(){
        try{
            $db = DB::db_conect();
            $stmt = $db->query('SELECT count(id) FROM task');
            $row = $stmt->fetch(\PDO::FETCH_NUM);
            return $row;
        }catch (\Exception $e){
            echo 'Ошибка ' . $e->getMessage() . '<br> Строка ошибки : ' . $e->getLine() . '<br>'. 'Файл ошибки ' . $e->getFile();
            die();
        }
    }


    public function getRow($id){
        try{
            $db = DB::db_conect();
            $stmt = $db->prepare("SELECT * FROM task WHERE id = :id");
            $stmt->execute(['id'=> $id]);
            $row = $stmt->fetch(\PDO::FETCH_OBJ);
            return $row;
        }catch (\Exception $e){
            echo 'Ошибка ' . $e->getMessage() . '<br> Строка ошибки : ' . $e->getLine() . '<br>'. 'Файл ошибки ' . $e->getFile();
            die();
        }
    }

}