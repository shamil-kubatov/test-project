$(document).ready(function(){


    $(document).on('click', '.column_sort', function(){
        var column_name = $(this).attr("id");
        var order = $(this).data("order");
        var arrow = '';

        if(order == 'desc')
        {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
        }
        else
        {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
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