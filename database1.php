<?php
//подключение базы данных
define('MYSQL_SERVER', '185.175.156.58');
define('MYSQL_USER', 'u19214_yshorts.com');
define('MYSQL_PASSWORD', '3U9e9P8e');
define('MYSQL_DB', 'u19214_yshorts');


function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die("Error: ".mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")){
        print("Error: ".mysqli_error($link));
    }

    return $link;
}

?>
