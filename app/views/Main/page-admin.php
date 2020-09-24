<div class="container">
    <div class="row">
        <div class="col-md-12 col-xl-12 col-sm-12" style="padding-top:5px;">
            <div class="header-btn">
                <?php if(isset($_SESSION['admin'])){ ?>
                    <a class="btn btn-primary" href="/main/log-out-admin/">Выйти из админки</a>
                <?php } ?>
            </div>
            <?php
            if($data){  ?>
                <div class="block-task">
                        <table border="1" style="width: 100%;padding: 5px">
                            <thead>
                            <tr>
                                <th>Задание</th>
                                <th>Майл</th>
                                <th>Статус</th>
                                <th>Редактировано</th>
                                <th>edit</th>
                            </tr>
                            </thead>
                            <tbody>
                <?php foreach ($data as $item){  ?>
                            <tr>
                                <td style="width: 20%"><?=$item->task?></td>
                                <td style="width: 20%"><?=$item->email?></td>
                                <td style="width: 20%"><?=$item->status?></td>
                                <td style="width: 20%"><?=$item->edit?></td>
                                <td style="width: 20%"><a href="<?="/main/update-page?id={$item->id}"?>"><=</a></td>
                            </tr>
                <?php }  ?>
                             </tbody>
                        </table>
                    </div>
                <?php } ?>
        </div>
    </div>
</div>

