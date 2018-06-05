<?php
//////////////////////////////////////////////////////////////////////////////////////
//берет  и вытаскивает 1 видео из базы по ID ////////////////////////////////////////
function video_get($link, $id_video){
    //Запрос
    $query = sprintf("SELECT * FROM video WHERE id=%d", (int)$id_video);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}


//////////////////////////////////////////////////////////////////////////////////////
//добавляет новое видео///////////////////////////////////////////////////////////////
function video_add($link, $video, $datetim, $timezone)
{
    //Подготовка
    $video = trim($video);

    $tube = "https://youtu.be/";

    //Проверка: если $video пустое значение ИЛИ значение $tube НЕ равно первым 17символам $video
    if ($video == '' or $tube !== substr($video, 0, 17))
        return false;


    $video = substr(trim($video), 17);

    //Запрос
    $t = "INSERT INTO video (video, datetim, timezone) VALUES ('%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $video), mysqli_real_escape_string($link, $datetim), mysqli_real_escape_string($link, $timezone));


    $result = mysqli_query($link, $query);

    if (!$result)
    {
        die (mysqli_error($link));
    }

    return true;
}


/////////////////////////////////////////////////////////////////////////////////////
//удаляет видео из базы данных (пока не используем)///////////////////////////////////
function video_delete($id){

}



?>
