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
                    $("#liked").html("<font id='font' color='white' size='5'>" + ansdata['likes'] +" Liked</font>");
                    //отображаем id текущ. video в футтере потом сделать его невидимым
                    $("#idvideo").html("<font color='grey' size='1'>" + ansdata['id'] + "</font>");
                    }
                });
            }

            //5. Увеличиваем mylikes +1 или -1 и записваем в БД
 //           var idvideo = + $('#idvideo').text();
 //           inslike();


 //           function inslike(){
            $('#palets').data('counter', 0).click(function(){

                //1.Подготовка к вставки в Базу Данных
                var send ={};
                send['id'] = $('#idvideo').text();
                send['like1'] = 1;

                //alert(send['like1'] + ", " + send['id']);

                //1.1.Вставка в Базу Данных методом POST через AJAX
                $.ajax({
                    url: './models/insLike.php',
                    type: 'POST',
                    data: send, // отправляет 1 в insLike.php
                    // подготовка
                    success: function(anslike){
                        //данные приходят из insLike.php
                        //alert(anslike);
                        anslike = jQuery.parseJSON(anslike);
                        //приход данных из insLike.php не реализован. хотя поле likes бд увеличивается на +1
                    }
                });

                //2.вставляем данные в #liked общее кол-во лайков без запроса к БД через js
                var str = $("#font").text(); //берем текст из тега id="font"
                var shstr = str.substr(0, str.length - 6); //убираем последние 6 символов
                var intliked = parseInt(shstr, 10);//меняем тип строки в число
                var liked1 = intliked + send['like1'];

                $("#liked").html("<font id='font' color='white' size='5'>" + liked1 + " Liked</font>");

                //3.вставляем данные в сессию мои лайки
                $('#mylikes').text(+$('#mylikes').text()+1);


                //4.вставляем li в строку
                var mylikes = parseInt($("#mylikes").text(),10);
                var strsrc = $("iframe").attr("src");
                var src = strsrc.slice(29, -47);

                if ($(".menu").find("li").length = 0 ){
                    $(".menu").html('<li class="submenu"><a name="' + src + '" href="javascript:void(0)">Video1</a></li>');//вставить name="код видео"
                }else{
                    $(".menu").prepend('<li class="submenu"><a name="' + src + '" href="javascript:void(0)">Video' + (mylikes) + '</a></li>');//вставить name="код видео", вставить номер
                };

                });
 //           }

            // При нажатии на строку выпадающего меню запускается выбранное видео

            $('.menu').on('click', '.submenu', function(){ //при клике на строке выпад меню
                //alert("сработало");
                //берем атрибут строки выпадающ меню name="src" и вставляем вместо ansdata['video']в строке ниже
                var namesrc = $(this).attr("name");
                $("iframe").attr("src", "http://www.youtube.com/embed/" + namesrc + "?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0");

            });

});



