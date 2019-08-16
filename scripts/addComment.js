//Добавляем Комментарий в базу данных
$("document").ready(function(){

    $("#send_comment").click(function(){

        var form_comments = $("#form_comment").serialize();
            //alert(form_comments);
            
        $.ajax({
            url: "./models/addComment.php",
            type: "POST",
            data: form_comments,
            success: function (ansdata) {
                //проверка, ansdata возврат данных из php файла
                //очищаем input
                $("#id_nickname").val("");
                $("#id_comment").val("");

                alert(ansdata);
            }
        });

    });

});