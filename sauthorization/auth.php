<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="main__contain">
        <h2>Регистрация</h2>

        <form method="post" action="../backend/sauthorization/Auth.php" class="remind_pass">
            <p>
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" value="test">
            </p>

            <p>
                <label for="password">Пароль:</label>
                <input type="password" name="password_1" id="password" value="1234">
            </p>

            <p>
                <label for="password">Ещё раз:</label>
                <input type="password" name="password_2" id="password" value="1234">
            </p>

            <p class="auth-submit">
                <button type="submit" class="auth-submit">Зарегистрироваться</button>
            </p>

            <p class="links"><a href="login.php">Войти</a></p>
        </form>
    </div>
</body>
</html>
