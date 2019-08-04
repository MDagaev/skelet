$(document).ready(function(){
  
//по клику по пальцу вставляем +/- лайк в БД и меняем значение htmд строк

    $("#link_img").click(function(){

     //1.Подготовка к вставки в Базу Данных
    var send = {};
    send["id"] = $("#idvideo").text();
    //send["like1"] = 1;
    let klik = 0; //счетчик для подсчета только положительных/нечетных кликов по пальцу
    //1.1. поворот пальца (смена класса стилей) 
    if ($("img.palets").hasClass("palets"))
    {
      // из первоначального состояния 0 в палец вниз +1 лайк
      $("img.palets").removeClass("palets").addClass("paletsDown");
      send["like1"] = 1;
      klik = 1;
    }
    else if ($("img.paletsDown").hasClass("paletsDown"))
    {
      //из состояния палец вниз +1 лайк в палец вверх -1 лайк
      $("img.paletsDown").removeClass("paletsDown").addClass("paletsUp");
      send["like1"] = -1;
      klik = 0;
    }
    else if ($("img.paletsUp").hasClass("paletsUp"))
    {
      //из состяния палец вверх -1 лайк в палец вниз +1 лайк
      $("img.paletsUp").removeClass("paletsUp").addClass("paletsDown");
      send["like1"] = 1;
      klik = 1;
    }
        
    //console.log(send);
    //alert(send['like1'] + ", " + send['id']);

    //1.2.Вставка в Базу Данных методом POST через AJAX
    $.ajax({
      url: "./models/insLike.php",
      type: "POST",
      data: send, // отправляет +1 или -1 в insLike.php
      // подготовка
      success: function(anslike) {
        //данные приходят из insLike.php
        //alert(anslike);
        //console.log(anslike);
        //anslike = jQuery.parseJSON(anslike);
        //приход данных из insLike.php не реализован. хотя поле likes бд увеличивается на +1
      }
    });

    ////////////////////////////////////////////////////////////////////////////////////////////////
//2.вставляем данные в #liked общее кол-во лайков без запроса к БД через js
    var str = $("#font").text(); //берем текст из тега id="font"
    var shstr = str.substr(0, str.length - 6); //убираем последние 6 символов
    var intliked = parseInt(shstr, 10); //меняем тип строки в число
    var liked1 = intliked + send["like1"];

    $("#liked").html(
      "<font id='font' color='white' size='5'>" + liked1 + " Liked</font>"
     );

    console.log(liked1); 
    //3.вставляем данные в сессию "мои лайки"
    $("#mylikes").text(+$("#mylikes").text() + klik);

    //4.вставляем li в строку
    var mylikes = parseInt($("#mylikes").text(), 10);
    var strsrc = $("iframe").attr("src");
    var src = strsrc.slice(29, -47);

/*              if (($(".menu").find("li").length = 0)) {
                $(".menu").html(
                  '<li class="submenu"><a name="' +
                  src +
                  '" href="javascript:void(0)">Video1</a></li>'
                ); //вставить name="код видео"
              } else {
                $(".menu").prepend(
                  '<li class="submenu"><a name="' +
                  src +
                  '" href="javascript:void(0)">Video' +
                  mylikes +
                  "</a></li>"
                ); //вставить name="код видео", вставить номер
              }
*/
  }); 
  //  

  // При нажатии на строку выпадающего меню запускается выбранное видео

  $(".menu").on("click", ".submenu", function() {
    //при клике на строке выпад меню
    //alert("сработало");
    //берем атрибут строки выпадающ меню name="src" и вставляем вместо ansdata['video']в строке ниже
    var namesrc = $(this).attr("name");
    $("iframe").attr(
      "src",
      "http://www.youtube.com/embed/" +
        namesrc +
        "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0"
    );
  });
});