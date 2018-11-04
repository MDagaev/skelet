<?php
    //AJAX обработчик добавляет видео в Базу Данных
    function addVideo($link, $video, $datetim, $timezone)
    {
        //Подготовка
        $video = trim($video);

        $tube = "https://youtu.be/";
        $vimeo = "https://vimeo.com/";

        //Проверка: если $video пустое значение ИЛИ значение $tube НЕ равно первым 17символам $video
        if ($video == '' or $tube !== substr($video, 0, 17) or $vimeo !== substr($video, 0, 18))
            return false;

        //$video = substr(trim($video), 17);

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

    echo json_encode(addVideo($link, $video, $datetim, $timezone));
?>
