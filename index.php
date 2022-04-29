<?php require 'backend/Main.php'?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h2>Главная пользовательская часть</h2>

    <h3>Ваш логин: <?=$_GET['login']?></h3>

    <li>Ваш id: <?= $_GET['id']?></li>
    <li>Права доступа: <?= \app\Main::$role?></li>
</body>
</html>
