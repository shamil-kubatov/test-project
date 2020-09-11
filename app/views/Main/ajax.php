<table class="table table-bordered">
      <tr>  
           <th><a class="column_sort" id="id" data-order="<?=$order?>">ID</a></th>
           <th><a class="column_sort" id="task" data-order="<?=$order?>">task</a></th>
           <th><a class="column_sort" id="email" data-order="<?=$order?>">email</a></th>
           <th><a class="column_sort" id="status" data-order="<?=$order?>">status</a></th>
      </tr>
<?php
$_SESSION['sort'] = array();
$_SESSION['sort'] = [ $_POST['column_name'] => $_POST['order']];

foreach ($row as $item) { ?>
      <tr>  
           <td><?=$item->id?></td>
           <td><?=$item->task?></td>
           <td><?=$item->email?></td>
           <td><?=$item->status?></td>
      </tr>
    <?php } ?>
</table>
<?=$pages->page_links();?>

