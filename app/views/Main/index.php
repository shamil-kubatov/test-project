<?php if(isset($msg)){ ?>
    <div class="container">
        <div class="errors" style="height: 50px;width: 100%;background: red">
            <p style="font-family: 'Roboto';color: white;font-size: 30px;font-weight: 700;text-align: center"><?=$msg?></p>
        </div>
    </div>
    <script>
        setTimeout(function (){
            document.querySelector('.errors').style.display = 'none';
        },2500);
    </script>
<?php } ?>
<section class="tasks">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-sm-12">
                <div class="header-btn">
                    <a class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Создать</a>
                    <?php if(isset($_SESSION['admin'])){ ?>
                    <a class="btn btn-primary" style="float: right" href="/main/log-out-admin/">Выйти из админки</a>
                    <?php }else{  ?>
                        <a class="btn btn-primary" style="float: right" href="pageAdmin/">Войти в админку</a>
                    <?php } ?>
                </div>
                <div class="table-responsive" id="employee_table">
                    <table class="table table-bordered">
                        <tr>
                            <th><a class="column_sort" id="id" data-order="desc">ID</a></th>
                            <th><a class="column_sort" id="task" data-order="desc">task</a></th>
                            <th><a class="column_sort" id="email" data-order="desc">email</a></th>
                            <th><a class="column_sort" id="status" data-order="desc">status</a></th>
                        </tr>
                        <?php  foreach ($data as $item){  ?>
                     <tr>
                         <td style="width: 10%"><?=$item->id?></td>
                         <td style="width: 30%"><?=$item->task?></td>
                         <td style="width: 30%"><?=$item->email?></td>
                         <td style="width:30%"><?=$item->status?></td>

                     </tr>
                <?php }?>
                    </table>
                    <nav class="nav-pagination">
                        <?=$pages->page_links();?>
                    </nav>
                </div>
        </div>
    </div>
</section>


<div class="block">
    <div class="data"></div>
</div>

<!-- Модальное окно для добавление задачи -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавление задачи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form action="/main/index" method="post">
                        <label for="task">Email:</label> <br>
                        <input class="task" name="email"  required>
                        <label for="task">Добавьте задачу:</label> <br>
                        <textarea class="task" name="task" rows="5" required></textarea>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="add-task" value="Добавить">
                            <a type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
