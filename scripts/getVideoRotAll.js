/*jslint browser: true*/
/*global $*/

//скрипт вытаскивает 1 видео случайным образом из БД без перезагрузки ajax'ом
$(document).ready(function () {

    //3. вызов getVideo() каждые 23 секунды
    setInterval(function () {
        getVideo();
    }, 23000);

    //4. сама функция getVideo()
    function getVideo() {
        //вызываем class с текущими настройками CSS
        $("img[class^='palets']").removeClass().addClass("palets");
        //вызов Ajax функции
        $.ajax({
            url: "./models/getVideoRot.php",
            type: "POST",
            //подготовка
            success: function (ansdata) {
                //Данные приходят из getVideo.php
                ansdata = jQuery.parseJSON(ansdata);
                //alert(ansdata.video.substr(17));//данные преобразуются в объекты проверка

                //Работа с переменной ansdata.video
                let urlDB = ansdata.video;
                let srcDB ="";

                let tube = "https://youtu.be/";
                let tube1 = "https://www.youtube.com/";
                let vimeo = "https://vimeo.com/";
                let dai = "https://dai.ly/";
                let dai1 = "https://www.dailymotion.com/";
                let youku = "https://v.youku.com/";

                let nico = "https://nico.ms/";
                let nico1 = "https://www.nicovideo.jp/";
                let rutube = "https://rutube.ru/";  


                switch (urlDB) {
                    case tube + urlDB.substr(17): //17

                        srcDB = "http://www.youtube.com/embed/" + urlDB.substr(17) +
                        "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0";
                        break;

                    case tube1 + urlDB.substr(24):  //24
                        
                        srcDB = "http://www.youtube.com/embed/" + urlDB.substr(32) +
                        "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0";
                        console.log(srcDB);
                        
                        break;

                    case vimeo + urlDB.substr(18): //18   
                        
                        srcDB = "https://player.vimeo.com/video/" + urlDB.substr(18) + 
                        "?autoplay=1";
                        break;

                    case dai + urlDB.substr(15): // 15

                        srcDB = "https://www.dailymotion.com/embed/video/" + urlDB.substr(15) + 
                        "?autoPlay=1";
                        break;

                    case dai1 + urlDB.substr(28): // 28
                        
                        srcDB = "https://www.dailymotion.com/embed/video/" + urlDB.substr(34) + 
                        "?autoPlay=1";
                        break;

                    case youku + urlDB.substr(20): // 20
                            
                        srcDB = "http://player.youku.com/embed/" + urlDB.substr(27) +
                        "?autoPlay=1";
                        break;

                    
                
                    //default:
                    //    break;
                }


                $("iframe").attr(
                    "src", srcDB
                );

                //замена атрибута scr во фрейме
                /*        $("iframe").attr(
                          "src", "http://www.youtube.com/embed/" + ansdata.video.substr(17) +
                          "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0"
                        );
                */
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
