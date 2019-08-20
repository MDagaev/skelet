<?php
//Обращение Ajax  к этому файлу для извлечения
//из базы данных
require_once("../database.php");

$link = db_connect();

function getTenComments($link)
{
    //Запрос
    $query = "SELECT * FROM comments  
        ORDER BY id 
        DESC LIMIT 10";

    $result = mysqli_query($link, $query);

    if (!$result) {
        die(mysqli_error($link));
    }

    $tencomments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $tencomments[] = $row;
    }

    $tencomments = array_reverse($tencomments);

    return $tencomments;
}

echo  json_encode(getTenComments($link));
?>