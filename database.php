<?php
//подключение базы данных
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'yshorts');

function db_connect(){
    $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die("Error: ".mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")){
        print("Error: ".mysqli_error($link));
    }

    return $link;
}

?>
