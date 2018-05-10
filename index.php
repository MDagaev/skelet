<?php
// начальный файл
require_once("database.php");
require_once("models/func.php"); //подгружаем файлы

$link = db_connect();
$video = video_get($link, $_GET['id']);

include("views/video.php");     //подгружаем файл.
echo var_dump($video);
?>
