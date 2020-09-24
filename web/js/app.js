$(document).ready(function(){


    $(document).on('click', '.column_sort', function(){
        var column_name = $(this).attr("id");
        var order = $(this).data("order");
        var arrow = '';

        if(order == 'desc')
        {
            arrow = '<span class="glyphicon glyphicon-arrow-down"><i style="font-size:24px;padding-left:5px" class="fa">&#xf0ab;</i></span>';
        }
        else
        {
            arrow = '<span class="glyphicon glyphicon-arrow-up"><i style="font-size:24px;padding-left:5px" class="fa">&#xf0aa;</i></span>';
        }
        $.ajax({
            url:"/main/ajax",
            method:"POST",
            data:{column_name:column_name, order:order},
            success:function(data) {
                $('#employee_table').html(data);
                $('#'+column_name+'').append(arrow);
            },
            error: function (){
                console.log("Ошибка в ajax запросе!");
            }
        })
    });



});