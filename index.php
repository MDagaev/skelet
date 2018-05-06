<?php
// начальный файл
require_once("database.php");
require_once("models/func.php"); //подгружаем файлы

$link = db_connect();
$video = video_get($link, $_GET['id']);   //определяем новые переменные которые пойдут в файл ниже

include("views/testvideo.php");     //подгружаем файл.
?>
