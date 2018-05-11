<?php
//берет  и вытаскивает 1 видео из базы по ID //
function video_get($link, $id_video){
    //Запрос
    $query = sprintf("SELECT * FROM video WHERE id=%d", (int)$id_video);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}


//берет и вытаскивает 1 видео выбранное случайным образом из базы //////////////////
function video_getRand($link){
    //Запрос
    $query = "SELECT * FROM video ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}


//добавляет новое видео//////////////
function video_add($link, $video, $datetime, $timezone)
{    //Подготовка
    $video = trim($video);

    //datetyme, берем из компьютера
    $datetime = date('Y-m-d H:i:s');

    //tymezone,  надо узнать?
    $timezone = '';

    //Проверка
    if ($video == '')
        return false;

    //Запрос
    $t = "INSERT INTO video (video, datetime, timezone) VALUES ('%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $video), mysqli_real_escape_string($link, $datetime), mysqli_real_escape_string($link, $timezone));


    $result = mysqli_query($link, $query);

    if (!$result)
    {
        die (mysqli_error($link));
    }

    return true;
}



//удаляет видео из базы данных (пока не используем)//////
function video_delete($id){

}

?>
