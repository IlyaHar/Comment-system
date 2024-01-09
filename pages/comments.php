<?php
$mysql = new mysqli('localhost', 'root', '', 'php-mysql');
$result = $mysql->query("SELECT * FROM comments");
$mysql->close();
session_start();
$_SESSION['name'] = $_SESSION['name'] ?? '';
$_SESSION['comment'] = $_SESSION['comment'] ?? '';
$_SESSION['error_name'] = $_SESSION['error_name'] ?? '';
$_SESSION['error_comment'] = $_SESSION['error_comment'] ?? '';
$_SESSION['comm'] = $_SESSION['comm'] ?? '';
$_SESSION['success'] = $_SESSION['success'] ?? '';


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Комментарии</title>
</head>
<body>
<h1>Добавление комментариев</h1>
<h4><?= $_SESSION['success'] ?></h4>
<form action="../validation.php" method="POST">
    <h4><?= $_SESSION['error_name'] ?></h4>
    <label for="name">Имя:</label>
    <input type="text" name="name"><br><br>
    <h4><?= $_SESSION['error_comment'] ?></h4>
    <label for="comment">Комментарий:</label><br>
    <textarea name="comment"></textarea><br><br>
    <input type="submit">
</form>
<?php
while ($comment = $result->fetch_assoc()) {
    echo "<br>Комментарий: " . "<br><span>$comment[name]</span><br>" . "$comment[comment] <hr>";
}
?>


</body>
</html>