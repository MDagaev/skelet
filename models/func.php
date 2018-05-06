<?php

// 'функции для работы базой данной и не только';

//работает со всеми видео (вывод всех видео)
/*function videos_all($link){
    //Запрос
    $query = "SELECT * FROM shorts ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    //Извлекаем видео из БД
    $n = mysqli_num_rows($result);
    $videos = array();

    for ($i = 0; $i < $n; $i++) {

        $row = mysqli_fetch_assoc($result);
        $videos[] = $row;
    }

    return $videos;

}
*/

//берет  и вытаскивает видео из базы
function video_get($link, $id_video){
    //Запрос
    $query = sprintf("SELECT * FROM shorts WHERE id=%d", (int)$id_video);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}

//добавляет новое видео(пока не используем)
function videos_new($link, $names, $datetime, $ip){

}

//удаляет видео из базы данных (пока не используем)
function videos_delete($id){

}
/*





























*/
?>
