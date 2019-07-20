// Ajax Скрипт добавляет Видео в базу данных
$(document).ready(function(){

    //Функция добавления видео
    $("#send").click(function() {
        
        var dannie = $("form").serialize();

        alert(dannie);
        $.ajax({
            url: '.models/addVideo.php',
            type: 'POST',
            data: dannie,
            success: function(data){
                //проверка
                alert(data);
            }

        })
    });
});


//