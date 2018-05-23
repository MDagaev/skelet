<?php
//файл обработчик делает запрос к базе данных
//извлекает случайнное видео
require_once("../database.php");

$link = db_connect();

function video_getRand($link){
    //Запрос
    $query = "SELECT * FROM video ORDER BY RAND() LIMIT 1";
    // Заменbnm на более быстрый вариант pfghjcf

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}

echo json_encode(video_getRand($link));
//$video = video_getRand($link);
//$test = json_encode($video);

