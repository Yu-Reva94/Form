<?php
include "connect.php";
global $pdo;
$errMsg = '';
//получаем данные из формы методом POST,
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg'])) {
    $login = trim($_POST['login']);//trim обрезает лишние проблемы
    $name = trim($_POST['user-name']);
    $password = trim($_POST['pass']);
//делаем запрос в бд, проверяем существует ли такой логин
    $stmt = ("SELECT * FROM `users` WHERE `login` = :login");
    $query = $pdo->prepare($stmt);
    $query->bindParam(':login', $login);
    $query->execute();
    $user = $query->fetch();
    if ($user) {
        echo "Пользователь с таким логином уже зарегистрирован!";
        exit();
    }
//проверка логина имени и пароля на длину символов и на заполненность всех полей
    if ($login == '' || $name == '' || $password == '') {
        echo $errMsg = "Не все поля заполнены";
        exit();
    } else if (mb_strlen($login) < 2 || mb_strlen($login) > 90) {
        echo $errMsg = "Не допустимая длина логина";
        exit();
    } else if (mb_strlen($name) < 2 || mb_strlen($name) > 50) {
        echo $errMsg = "Не допустимая длина имени";
        exit();
    } else if (mb_strlen($password) < 4 || mb_strlen($password) > 70) {
        echo $errMsg = "Не допустимая длина пароля";
    } else {

// хэшируем пароь
        $password = password_hash($password, PASSWORD_DEFAULT);
//Помещаем данные в таблицу в БД
        $mysql = ("INSERT INTO `users` (`login`, `pass`, `name`) VALUES ('$login', '$password', '$name')");
        $query = $pdo->prepare($mysql);
        $query->execute();
        return $query->fetch();
    }
}
?>