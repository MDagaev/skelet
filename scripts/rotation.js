/*jslint browser: true*/
/*global $*/

//скрипт вытаскивает 1 видео случайным образом из БД без перезагрузки ajax'ом
        $("document").ready(function(){
            //1. первый вызов функции getVideo()
            //getVideo();

            //2. кликаем по ifram и запускаем play
            //$("iframe").click();


            //3. вызов getVideo() каждые 23 секунды
           setInterval(function(){
                getVideo();
            }, 23000);

            //4. сама функция getVideo()
           function getVideo(){
                $.ajax({
                    url: './models/getVideo.php',
                    type: 'POST',
                    //подготовка
                    success: function(ansdata){
                    //alert(ansdata);//Даные приходят из getVideo.php
                    ansdata = jQuery.parseJSON(ansdata);
                    //alert(ansdata);//данные преобразуются в объекты
                    //работа со строкой 30 замена части строки данными из ansdata, добавление ;mute=1;
                    $("iframe").attr("src", "http://www.youtube.com/embed/" + ansdata['video'] + "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0");
                    //запуск автоплей  для хрома
                    //$("iframe").attr("allow", "autoplay; encrypted-media");
                    //показывает кол-во лайков на данном видео
                    $("#liked").html("<font color='white' size='5'>" + ansdata['likes'] +" Laked</font>");
                    //отображаем id текущ. video в футтере потом сделать его невидимым
                    $("#idvideo").html("<font color='grey' size='1'>" + ansdata['id'] + "</font>");
                    }
                });
            }

            //5. Увеличиваем mylikes +1 и записваем в БД

//           function inslike(){
            $('#palets').click(function(){

                //1.Подготовка к вставки в Базу Данных
                var send ={};
                send['id'] = $('#idvideo').text();
                send['like1'] = 1;
                //alert(send['like1'] + ", " + send['id']);

                //1.1.Вставка в Базу Данных методом POST через AJAX
                $.ajax({
                    url: './models/inslike.php',
                    type: 'POST',
                    data: send, // отправляет 1 в inslike.php
                    // подготовка
                    success: function(anslike){
                        //данные приходят из inslike.php
                        //alert(anslike);
                        anslike = jQuery.parseJSON(anslike);
                        //приход данных из inslike.php не реализован. хотя поле likes бд увеличивается на +1
                    }
                });

/*                //2.вставляем данные в #liked общее кол-во лайков без запроса к БД через js
                $('#liked').html(function(index, oldhtml{
                    var newhtml = Number.parseInt(oldhtml) + 1;
                    return newhtml;
                                           }));
*/
                //3.вставляем данные в сессию мои лайки

            });
//           }
        });

