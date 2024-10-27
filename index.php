<!DOCTYPE html>
<html lang="ru">
<?php include 'partials/head.php'; ?>
<body class="bg-light">
<?php include 'partials/navbar.php'; ?>
<div class="container mt-5">
    <h1 class="text-center">Главная страница</h1>
    <p class="text-center">
        Текущее количество пользователей:
        <?php
        $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES) : [];
        echo count($users);
        ?>
    </p>
</div>
</body>
</html>
