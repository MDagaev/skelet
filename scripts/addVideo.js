// Ajax Скрипт добавляет Видео в базу данных
$(document).ready(function(){

    //Функция открытия openModal при клике tr_gamburger
    $("#tr_hamburger").click(function(){
      $("#openModal").css('display', 'block');
    });  

    //функция зыкрытие openModal при клике close
    $("#close").click(function(){
      $("#openModal").css('display', 'none');
    });

    //Функция добавления видео
    $("#send").click(function() {
        
        var dannie = $("form").serializeArray();
            //console.log(dannie); //отправляет данные с кракозяблами
            //alert(dannie);
            $.ajax({
              url: "models/addVideo.php",
              type: "POST",
              data: dannie,
              success: function(data) {
                //проверка
                //очишаем input video
                $("#video").val(" ");
                //закрываем модальное окно при клике на Send
                //$("#openModal").css('display', 'none'); //исчезает на совсем
                //alert(data);
                console.log(data);
                $('#otvet_srv').text(data);
              }
            });
    });
});