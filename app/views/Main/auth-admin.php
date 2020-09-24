<?php if(!isset($_SESSION['admin'])){
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/main/auth-admin" method="post" style="width: 400px;display: block;margin: auto;padding-top: 100px">
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
<?php } ?>