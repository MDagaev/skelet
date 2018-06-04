<?php
    //echo "ответ от скрипт обработчика" . $_POST['id'] . ", " . $_POST['like1'];

    require_once("../database.php");
    $link = db_connect();
    $like1 = $_POST['like1'];
    $id_video = $_POST['id'];

    function inslike($link, $like1, $id_video){
       //вставка 1 лайка

        $query = sprintf("UPDATE video SET likes = likes + 1 WHERE id =%d", (int)$id_video);
        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        $anslike = mysqli_fetch_assoc($result); //на этой строке выдает ошибку , UPDATE/SELECT?

        return $anslike;
    }

    echo json_encode(inslike($link, $like1, $id_video));
    //обработчик увеличивает на 1 лайк БД в поле likes и возврщает в rotation.js


