<!DOCTYPE html>
<html lang="ru">
<?php include 'partials/head.php'; ?>
<body class="bg-light">
<?php include 'partials/navbar.php'; ?>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style="width: 350px;">
        <h2 class="text-center">Вход на сайт</h2>
        <form action="" method="post" class="mt-3">
            <div class="mb-3">
                <input type="text" name="login" class="form-control" placeholder="Логин" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Войти</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES) : [];
            $isAuthenticated = false;

            foreach ($users as $user) {
                list($storedLogin, $storedPassword) = explode(':', $user);
                if ($storedLogin === $login && password_verify($password, $storedPassword)) {
                    $isAuthenticated = true;
                    break;
                }
            }

            if ($isAuthenticated) {
                echo "<div class='alert alert-success mt-3'>Вход успешно выполнен!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Неверный логин или пароль!</div>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
