<?php
include "validation-form/regUsers.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Форма регистрации</title>
</head>
<body>
<div class="container mt-4">
    <h1>Форма регистрации</h1>
    <form action="validation-form/regUsers.php" method="post">
        <input type="text" class="form-control mb-2" name="login" id="login" placeholder="Введи логин">
        <input type="text" class="form-control mb-2" name="user-name" id="user_name" placeholder="Введи Ваше имя">
        <input type="password" class="form-control mb-2" name="pass" id="pass" placeholder="*********">
        <button type="submit" class="btn btn-success mb-2" name="reg">Зарегистрировать</button>
    </form>
    <div class="log">
        <a href="auth.php"><strong>Войти</strong></a>
    </div>
</body>
</html>