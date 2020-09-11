<?php if(!isset($_SESSION['admin'])){
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/main/page-admin/" method="post" style="width: 400px;display: block;margin: auto;padding-top: 100px">
                <h2 style="text-align: center;padding-bottom: 30px">Вход в админку</h2>
                <?php if(isset($msg)){ echo '<p style="color: red;font-weight: 700">' . $msg . '</p>';  } ?>
                <div class="form-group">
                    <label for="username">Введите ваш логин:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="username">Введите ваш пароль:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <input type="submit" name="entry" class="btn btn-primary" value="Войти">
            </form>
        </div>
    </div>
</div>
<?php }else{ ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-12 col-sm-12" style="padding-top:5px;">
            <div class="header-btn">
                <?php if(isset($_SESSION['admin'])){ ?>
                    <a class="btn btn-primary" href="/main/log-out-admin/">Выйти из админки</a>
                <?php } ?>
            </div>
            <?php
            if($data){
                foreach ($data as $item){  ?>
                    <div class="block-task">
                        <table border="1" style="width: 100%;padding: 5px">
                            <thead>
                            <tr>
                                <th>Задание</th>
                                <th>Майл</th>
                                <th>Статус</th>
                                <th>Редактировать</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="width: 25%"><?=$item->task?></td>
                                <td style="width: 25%"><?=$item->email?></td>
                                <td style="width: 25%"><?=$item->status?></td>
                                <td style="width: 25%"><a href="<?="/main/update-page?id={$item->id}"?>"><=</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <?php }} ?>
        </div>
    </div>
</div>
<?php } ?>

