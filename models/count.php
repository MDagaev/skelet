<?php

if (!isset ($_COOKIE['count'])) {
    //если не существует куки  уникальный пользователь
    $visitor = "";

} elseif (isset($_COOKIE['count'])) {
    # иначе если куки существуют не уникальный пользователь
    $visits = "";

} 

