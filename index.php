<?php
// начальный файл
require_once("database.php");
require_once("models/func.php");

$link = db_connect();

if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = "";
}

if($action == "add"){
    if(!empty($_POST)){
        video_add($link, $_POST['video'], $_POST['datetime'], $_POST['timezone']);
        header("Location: index.php");
    }
    include("views/form.php");
}else{
    $video = video_get($link, $_GET['id']);
    include("views/video.php>");
//echo var_dump($video);
}
?>
