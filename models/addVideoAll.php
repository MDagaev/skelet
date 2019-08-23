<?php
//

require_once("../database.php");

$link = db_connect();
$video = $_POST['video'];
$datetim = $_POST['datetim'];
$timezone = $_POST['timezone'];

    //AJAX обработчик добавляет видео в Базу Данных
    function addVideo($link, $video, $datetim, $timezone)
    {
        //Подготовка
        //Вставляемое значение
        $video = trim($video); 

        // Домены с которых можно вставлять URL 
        $tube =  'https://youtu.be/' ;
        $tube1 = 'https://youtube.com/';
        $vimeo = 'https://vimeo.com/';
        $vimeo1 = 'https://player.vimeo.com/';
        $daily = 'https://dai.ly/';
        $daily1 = 'https://dailymotion.com';
        $rutube = 'https://rutube.ru/';
        $nico = 'https://embed.nicovideo.jp/';
        $nico1 = 'https://nicovideo.jp/';
        $youku = 'http://player.youku.com/';
        $youku1 = 'http://youku.com/';

        $videoMassiv = array($tube, $tube1, $vimeo, $vimeo1, $daily, $daily1, $rutube, $nico, $nico1, $youku, $youku1);
        
        foreach ($videoMassiv as $value) { 
            if (strpos ($video, $value) !== false) { 
                $value = $GLOBALS ["value"]; 
                unset($value);
            } else {
                $value = 1;
            }
        }


        //Проверка: если $video пустое значение 
        if ($video == '') {
        
            return 'Video failed validation';

        //Проварка: если $value пустое значение (нет совпадений)
        } elseif ($value == 1) {
            
            return 'Video failed validation';
        
        } else { 

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