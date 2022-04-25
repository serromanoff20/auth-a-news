<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Вход</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<form method="get" action="../backend/login.php" class="login">
    <p>
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login" value="test">
    </p>

    <p>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" value="12345678">
    </p>

    <p class="login-submit">
        <button type="submit" class="login-button">Войти</button>
    </p>

    <p class="forgot-password"><a href="auth.php">Зарегистрироваться</a></p>
    <p class="forgot-password"><a href="remind-pass.php">Забыл пароль?</a></p>
</form>
</body>
</html>