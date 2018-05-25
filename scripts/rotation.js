/*jslint browser: true*/
/*global $*/
//setInterval(function(){вн.функ},5000); внутреняя функ будет выполнятся каждые 5 сек.

////////////////////////////////////////////////////////////////////////////
/*    $("#button").live("click", function() {

        if ($("#div").attr("display") == "none") {

            $("#div").attr("display","inline-block");

            $("#div").slideDown();
        }

        else {

            $("#div").slideUp();

            $("#div").attr("display","none");
        }
    });
*//////////////////////////////////////////////////////////////////////////////
//скрипт вытаскивает 1 видео случайным образом из БД без перезагрузки ajax'ом
        $("document").ready(function(){
            //первый вызов функции getVideo()
            //getVideo();

            //кликаем по ifram и запускаем play
            $("iframe").click();


            //вызов getVideo() каждые 5 секунд ПОМЕНЯТЬ на 23 секунды
           setInterval(function(){
                getVideo();
            }, 23000);

            //сама функция getVideo()
           function getVideo(){
                $.ajax({
                    url: './models/getVideo.php',
                    type: 'POST',
                    //подготовка
                    success: function(ansdata){
                    //alert(ansdata);//Даные приходят из getVideo.php
                    ansdata = jQuery.parseJSON(ansdata);
                    //console.log(ansdata);//данные преобразуются в объекты
                    //работа со строкой 30 замена части строки данными из ansdata, добавление ;mute=1;
                    $("iframe").attr("src", "http://www.youtube.com/embed/" + ansdata['video'] + "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0");
                    //запуск автоплей  для хрома
                    //$("iframe").attr("allow", "autoplay; encrypted-media");

                    }
                });
           }
        });

