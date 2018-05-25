<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yshorts</title>
    <link href="./css/styles.css" type="text/css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="scripts/rotation.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>
<body>
    <div class="panel">
        <div id="logo">
            <img src="./images/yshorts.jpg">
        </div>

        <div id="tr_hamburger" class="trigger">
            <a href="./admin/index.php?action=add"><img src="./images/hamburger_iconsvg.jpg"></a>
        </div>

 <!--       <div id="tr_krestik" class="trigger">
            <img src="../images/krestik.jpg"> -->
    </div>


    <div id="nechet" class="video">

        <iframe width="560" height="315" src="https://www.youtube.com/embed/DiEPdoOZJKM?rel=0&amp;autoplay=1;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>


    <footer><p>copyright &copy; tavintavan</p>
    </footer>
    <script>
        //скрипт вытаскивает 1 видео случайным образом из БД без перезагрузки ajax'ом
/*        $("document").ready(function(){
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


        });*/
    </script>

</body>
</html>
