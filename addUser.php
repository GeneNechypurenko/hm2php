<!DOCTYPE html>
<html lang="ru">
<?php include 'partials/head.php'; ?>
<body class="bg-light">
<?php include 'partials/navbar.php'; ?>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style="width: 350px;">
        <h2 class="text-center">Регистрация</h2>
        <form action="" method="post" class="mt-3">
            <div class="mb-3">
                <input type="text" name="login" class="form-control" placeholder="Логин" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = $_POST['email'];

            $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES) : [];

            foreach ($users as $user) {
                list($existingLogin) = explode(':', $user);
                if ($existingLogin === $login) {
                    echo "<div class='alert alert-danger mt-3'>Пользователь с таким логином уже существует!</div>";
                    exit;
                }
            }

            $newUser = "$login:$password:$email";
            file_put_contents('users.txt', $newUser . PHP_EOL, FILE_APPEND);
            echo "<div class='alert alert-success mt-3'>Регистрация прошла успешно!</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
