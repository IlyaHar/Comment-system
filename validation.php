<?php
session_start();

unset($_SESSION['error_name']);
unset($_SESSION['error_comment']);
unset($_SESSION['success']);
function redirect()
{
    header('Location: /');
}

$_SESSION['name'] = htmlspecialchars(trim($_POST['name']));
$_SESSION['comment'] = htmlspecialchars(trim($_POST['comment']));


$mysql = new mysqli('localhost', 'root', '', 'php-mysql');

if (mb_strlen($_SESSION['name']) <= 2) {
    $_SESSION['error_name'] = 'Слишком короткое имя!';
} elseif (mb_strlen($_SESSION['comment']) < 15) {
    $_SESSION['error_comment'] = 'Комментарий должен быть не менее 15 символов';
} else {
    $_SESSION['success'] = 'Вы успешно опубликовали комментарий!';
    $mysql->query("INSERT INTO comments (`name`, `comment`) VALUES ('$_SESSION[name]', '$_SESSION[comment]')");
    $result = $mysql->query("SELECT * FROM comments");
}



$mysql->close();
redirect();