	<!DOCTYPE html>
	<html>
	<head>
        <meta charset="utf-8">
        <title>Регистрация</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
	<body>
		<h2>Регистрация</h2>

        <form action="../backend/syst-auth/auth.php" class="remind_pass">
            <p>
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login" value="test">
            </p>

            <p>
                <label for="password">Пароль:</label>
                <input type="password" name="password_1" id="password" value="12345678">
            </p>

            <p>
                <label for="password">Ещё раз:</label>
                <input type="password" name="password_2" id="password" value="12345678">
            </p>


            <p class="auth-submit">
                <button type="submit" class="auth-submit">Зарегистрироваться</button>
            </p>

            <p class="links"><a href="login.php">Назад</a></p>
        </form>
	</body>
	</html>
