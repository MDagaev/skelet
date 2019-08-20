/*jslint browser: true*/
/*global $*/

//скрипт вытаскивает 1 видео случайным образом из БД без перезагрузки ajax'ом
$(document).ready(function() {
  //1. первый вызов функции getVideo()
  //getVideo();

  //2. кликаем по ifram и запускаем play
  //$("iframe").click();

  //3. вызов getVideo() каждые 23 секунды
  setInterval(function() {
    getVideo();
  }, 23000);

  //4. сама функция getVideo()
  function getVideo() {
      //вызываем class с текущими настройками CSS
      $("img[class^='palets']").removeClass().addClass("palets");
      //вызов Ajax функции
      $.ajax({
      url: "./models/getVideo.php",
      type: "POST",
      //подготовка
      success: function(ansdata) {
        //Даные приходят из getVideo.php
        ansdata = jQuery.parseJSON(ansdata);
        //alert(ansdata.video.substr(17));//данные преобразуются в объекты
        //работа со строкой 30 замена части строки данными из ansdata, добавление ;mute=1;
           $("iframe").attr(
          "src", "http://www.youtube.com/embed/" + ansdata.video.substr(17) +
          "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0"
        );
        //запуск автоплей  для хрома
        //$("iframe").attr("allow", "autoplay; encrypted-media");
        //показывает кол-во лайков на данном видео
        $("#liked").html(
          "<font id='font' color='white' size='5'>" +
            ansdata["likes"] +
            " Liked</font>"
        );
        //отображаем id текущ. video в футтере потом сделать его невидимым
        $("#idvideo").html(
          "<font color='grey' size='1'>" + ansdata["id"] + "</font>"
        );
        

      }
    });
  }
});
