<?php
//Вставка URL видео только от youtube

//echo $_POST['video']. ", " .$_POST['datetim']. ", " .$_POST['timezone'];

require_once("../database.php");

$link = db_connect();
$video = $_POST['video'];
$datetim = $_POST['datetim'];
$timezone = $_POST['timezone'];

    //AJAX обработчик добавляет видео в Базу Данных
    function addVideo($link, $video, $datetim, $timezone)
    {
        //Подготовка
        $video = trim($video);

        $tube =  'https://youtu.be/' ;
        //$vimeo = 'https://vimeo.com/';

        //Проверка: если $video пустое значение ИЛИ значение $tube НЕ равно первым 17 символам $video
        if ($video == '' or substr($video, 0, 17) <> $tube /*or $vimeo <> substr($video, 0, 18)*/){
            
            return 'Video failed validation';

        } else { 

            //$video = substr(trim($video), 18);

            //Запрос
            $t = "INSERT INTO video (video, datetim, timezone) VALUES ('%s', '%s', '%s')";

            $query = sprintf($t, mysqli_real_escape_string($link, $video), mysqli_real_escape_string($link, $datetim), mysqli_real_escape_string($link, $timezone));

            $result = mysqli_query($link, $query);

            if (!$result)
            {
                die (mysqli_error($link));
            }

            return 'Ok, video uploaded';
        }
    }

echo json_encode(addVideo($link, $video, $datetim, $timezone));
//addVideo($link, $video, $datetim, $timezone);

?>
