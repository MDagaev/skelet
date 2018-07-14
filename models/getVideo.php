<?php
//Обработчик AJAX
//извлекает случайнное видео из БД отдает AJAX запросу
require_once("../database.php");


$link = db_connect();

    //медленная выборка
function video_getRand($link){
    //Запрос
    $query = "SELECT * FROM video ORDER BY RAND() LIMIT 1";

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}

    //быстрая выборка случайного видео
function video_getRand2($link){
    //Запрос
    $query = "SELECT id, video, likes FROM video f
            JOIN ( SELECT RAND() * (SELECT MAX(id) FROM video) AS max_id ) AS m
            WHERE f.id >= m.max_id
            ORDER BY f.id ASC
            LIMIT 1";

    $result = mysqli_query($link, $query);
    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}

    echo json_encode(video_getRand2($link));
