<?php
include "connect.php";
global $pdo;
//получаем данные из формы методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['auth'])) {
    $login = trim($_POST['login']); //trim обрезает лишние проблемы
    $password = trim($_POST['pass']);

    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `login` = :login");
    $stmt->execute(['login' => $login]);
    $user = $stmt->fetch();

    if ($user) {
        // Проверяем пароль с помощью password_verify()
        if (password_verify($password, $user['pass'])) {
            // Установка куки
            setcookie('user', $user['login'], time() + 3600, "/");
            // Перенаправление на главную страницу
            header("Location: ../auth.php");
        } else {
            echo "Неправильный  или пароль";
        }
    } else {
        echo "Такой пользователь не найден";
    }
}
?>

