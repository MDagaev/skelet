<?php
// начальный файл
    require_once("database.php");
    
    $link = db_connect();

    include("views/video.php");


?>
