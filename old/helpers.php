<?php


function printResult($page_id)
{
    $mysqli = new mysqli("localhost", "root", "", "php-mysql"); // Подключается к базе данных
    $result_set = $mysqli->query("SELECT * FROM `comments` WHERE `page_id`='$page_id'"); //Вытаскиваем все комментарии для данной страницы
    while ($row = $result_set->fetch_assoc()) {
        print_r($row); //Вывод комментариев
        echo "<br />";		}
}