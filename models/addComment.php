<?php
//echo $_POST['nickname'] . ", " . $_POST['comment'];

require_once("../database.php");

$link = db_connect();
$nickname = trim($_POST['nickname']);
$comment = trim($_POST['comment']);

function addComment($link, $nickname, $comment)
{
    //Проверка: на пустое значение 
    if ($nickname == '' or $comment == ''){
            
        return 'Comment failed validation';

    } else {
        //Запрос
        $t = "INSERT INTO comments (nickname, comment) VALUES ('%s', '%s')";

        $query = sprintf($t, mysqli_real_escape_string($link, $nickname), mysqli_real_escape_string($link, $comment));

        $result = mysqli_query($link, $query);

        if (!$result)
        {
            die (mysqli_error($link));
        }

        return 'Ok, comment uploaded';
    } 
}

echo json_encode(addComment($link, $nickname, $comment));
?>