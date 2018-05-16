<?php
// начальный файл
    require_once("database.php");
    require_once("models/func.php");

    $link = db_connect();
    $video = video_get($link, $_GET['id']); //берем 1 видео по id
    //$video = video_getRand($link);//берем видео случайным образом из БД

    include("views/video.php>");


?>
