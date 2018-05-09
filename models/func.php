<?php



//берет  и вытаскивает 1 видео из базы //////////////////
function video_get($link, $id_video){
    //Запрос
    $query = sprintf("SELECT * FROM shorts WHERE id=%d", (int)$id_video);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    $video = mysqli_fetch_assoc($result);

    return $video;
}

//добавляет новое видео(пока не используем)//////////////
function videos_new($link, $names, $datetime, $timezone){

}

//удаляет видео из базы данных (пока не используем)//////
function videos_delete($id){

}






























*/
?>
