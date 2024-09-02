<?php
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

$driver = 'mysql'; // sql
$host = 'localhost'; //имя домена
$dbname = 'onlinestore'; //имя базы данных
$dbUser = 'root'; // логин к бд
$dbPass = 'admin'; // пароль к бд
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]; // опции которые будем использовать при подключении к бд

try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$dbname", $dbUser, $dbPass, $options
    );
} catch (PDOException $i) {
    die("Ошибка подключения к базе данных");
}