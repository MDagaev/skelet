//забираем 10 последних комментариев при открытие
//сайдбара т.е. если существует класс sidebar
$(document).ready(function(){

    $(".btn_click").click(function () {
        
        if ($(".sidebar").hasClass("sidebar")) {
            
           var ids = []; 

            getComments();

            setInterval(function () {
               getComments(); 
            }, 10000);

            //берем из БД Ajax'ом 10 последних комментов
            function getComments() {
                
                $.ajax({
                    url: "./models/getTenComments.php",
                    type:  "POST",
                    success: function (ansdata) {
                        //проверка, ansdata возврат данных из php файла
                        //alert(ansdata);
                        //json превращаем в объект понятный js скрипту
                        ansdata = jQuery.parseJSON(ansdata);
                        
                        //выводим 10 комментов
                        $.each(ansdata, function (i, item) {
                            if (jQuery.inArray(item.id, ids) == -1) {
                                ids.push(item.id);
                                $(".one_comment").prepend("<b>" + item.nickname +"</b> <br> <span>" + item.comment + "</span> <br><br>"); 
                            }    
                        });

                        //вставляем номер последнего коммента (итого комментов)
                        
                        $("#totalComments").html("<b>" + "должно быть общее число комментов" + "</b>")
                    }    
                });
            }
        };
    });
});