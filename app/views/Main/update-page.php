<? if ($row): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/main/page-admin/" class="btn btn-danger">Вернуться назад</a>
                <form action="" method="post" style="width: 400px;display: block;margin: auto;padding-top: 100px">
                    <h2 style="text-align: center;padding-bottom: 30px">Редактирования</h2>
                    <div class="form-group">
                        <label for="username">Введите ваш логин:</label>
                        <input type="text" class="form-control" value="<?=$row->task?>" name="task" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Введите ваш пароль:</label>
                        <input type="text" value="<?=$row->email?>" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Выберите статус:</label>
                        <select name="status">
                            <option value="<?=$row->status?>"><?=$row->status?></option>
                            <option value="<?php if($row->status === 'новый'){ echo 'завершен'; }else{ echo 'новый'; }?>"><?php if($row->status === 'новый'){ echo 'завершен'; }else{ echo 'новый'; }?></option>
                        </select>
                    </div>
                    <input type="submit" name="update-task" class="btn btn-primary" value="Сохранить">
                </form>
            </div>
        </div>
    </div>
<? endif; ?>
