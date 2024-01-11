<?php
session_start();
unset($_SESSION['error_name']);
unset($_SESSION['error_comment']);
unset($_SESSION['success']);
unset($_SESSION['name']);
unset($_SESSION['comment']);
require 'helpers.php';
$name = htmlspecialchars(trim($_POST['name']));
$comment = htmlspecialchars(trim($_POST['comment']));
$page_id = $_POST['page_id'];
$_SESSION['name'] = $name;
$_SESSION['comment'] = $comment;

$mysql = new mysqli('localhost', 'root', '', 'php-mysql');

if (mb_strlen($name) <= 2) {
    if (empty($name )) {
        $_SESSION['error_name'] =  "Введите имя!";
    } else
    $_SESSION['error_name'] =  "Имя : $name не существует!";
} elseif (mb_strlen($comment) < 15) {
    $_SESSION['error_comment'] = 'Комментарий должен быть не менее 15 символов!';
} else {
    unset($_SESSION['name']);
    unset($_SESSION['comment']);
    $_SESSION['success'] = 'Комментарий успешно опубликован!';
    $mysql->query("INSERT INTO comments (`name`, `comment`, `page_id`) VALUES ('$name', '$comment', $page_id)");
}

redirect();
$mysql->close();