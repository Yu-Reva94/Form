<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Форма авторизациии</title>
</head>
<body>
<div class="container mt-4">

    <?php if (empty($_COOKIE['user'])): ?>
    <h1>Форма авторизациии</h1>
    <form action="validation-form/authUsers.php" method="post">
        <input type="text" class="form-control mb-2" name="login" id="login" placeholder="Введи логин">
        <input type="password" class="form-control mb-2" name="pass" id="pass" placeholder="*********">
        <button type="submit" class="btn btn-success mb-2" name="auth">войти</button>
    </form>
    <div class="log">
        <a href="index.php"><strong>Зарегистрироваться</strong></a>
        <?php else: ?>
            <p>Привет <?php echo $_COOKIE['user']; ?>. Чтобы выйти, нажмите <a href="exit.php">здесь</a></p>
        <?php endif; ?>

    </div>
</body>
</html>