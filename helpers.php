<?php

function redirect()
{
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

function printResult(int $page_id)
{
    $mysql = new mysqli('localhost', 'root', '', 'php-mysql');
    $result = $mysql->query("SELECT * FROM `comments` WHERE `page_id` = '$page_id'");
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $comment = $row['comment'];
        echo
        "
<div class='bg-dark container comment__block'>
<p class='text-info comment__name'>
$name   
</p>
<p class='text-light comment '>
$comment
</p>
</div>
        ";
    }

    $mysql->close();
}

