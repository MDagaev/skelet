<?php
// начальный файл
    require_once("models/count.php");
    
    require_once("database.php");
    
    $link = db_connect();

    include("views/video.php");


?>
