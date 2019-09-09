<?php
if (!isset ($_COOKIE['count'])) {
    //если не существует куки  уникальный пользователь
    $_COOKIE['count'] = 0;
    $visitors = $_COOKIE['count'] + 1;

    setcookie('count', $visitors, 0x6FFFFFFF);
    echo "Посещений сайта " . $visitors;

} /*elseif (isset($_COOKIE['count'])) {
    # иначе если куки существуют не уникальный пользователь
    $visits = "";

*/ //} 

