<!DOCTYPE html>
<html lang="ru">
<?php include 'partials/head.php'; ?>
<body class="bg-light">
<?php include 'partials/navbar.php'; ?>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow" style="width: 600px;">
        <h2 class="text-center">Список пользователей</h2>
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
            <tr>
                <th>Логин</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $users = file_exists('users.txt') ? file('users.txt', FILE_IGNORE_NEW_LINES) : [];
            foreach ($users as $user) {
                list($login, , $email) = explode(':', $user);
                echo "<tr><td>$login</td><td>$email</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
