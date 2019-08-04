<?php
//AJAX оработчик увеличивает на 1 лайк БД в поле likes и возврщает в rotation.js
//echo "ответ от скрипт обработчика" . $_POST['id'] . ", " . $_POST['like1'];

    require_once("../database.php");
    $link = db_connect();

    $like1 = $_POST['like1'];
    $id_video = $_POST['id'];

    function inslike($link, $like1, $id_video){
       //вставка 1 лайка

        $query = sprintf("UPDATE video SET likes = likes + %d WHERE id =%d", $like1, (int)$id_video);
        $result = mysqli_query($link, $query) or die("ERROR: ".mysql_error());

        if (!$result)
            die(mysqli_error($link));

        //$anslike = mysqli_fetch_assoc($result);

        //return $anslike;
    }

    echo json_encode(inslike($link, $like1, $id_video));

?>
