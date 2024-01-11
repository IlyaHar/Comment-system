<?php
session_start();
$_SESSION['name'] = $_SESSION['name'] ?? '';
$_SESSION['comment'] = $_SESSION['comment'] ?? '';
$_SESSION['error_name'] = $_SESSION['error_name'] ?? '';
$_SESSION['error_comment'] = $_SESSION['error_comment'] ?? '';
$_SESSION['success'] = $_SESSION['success'] ?? '';


?>
<div class="container comment__form">
    <?php
    if (!empty($_SESSION['error_name'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error_name'] ?></div>
    <?php
    elseif (!empty($_SESSION['error_comment'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['error_comment'] ?></div>
    <?php
        else: ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
    <?php
    endif; ?>
    <form action="comment.php" method="POST">
        <label class="text-secondary mt-2" for="name">Имя:</label>
        <input class="form-control w-25 mt-2" value="<?= $_SESSION['name'] ?>" type="text" name="name" placeholder='Введите свое имя..'>
        <label class="text-secondary mt-2" for="comment">Комментарий:</label>
        <textarea  class="form-control w-50 mt-2"  name="comment" id="" cols="30" rows="3" placeholder="Введите комментарий.."><?= $_SESSION['comment'] ?></textarea>
        <input type="hidden" name="page_id" value="<?= $page_id ?>">
        <input class="btn btn-primary mt-3" type="submit">
    </form>
</div>