<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Небольшой вебсайт</title>
</head>
<body>
<h2>Добавление комментариев</h2>

<form name="comment" action="comment.php" method="post">
    <p>
        <label>Имя:</label>
        <input type="text" name="name" />
    </p>
    <p>
        <label>Комментарий:</label>
        <br />
        <textarea name="text_comment" cols="30" rows="10"></textarea>
    </p>
    <p>
        <input type="hidden" name="page_id" value="151" />
        <input type="submit" value="Отправить" />
    </p>
</form>

<?php
require_once 'helpers.php';
printResult(151);
?>
</body>
</html>
