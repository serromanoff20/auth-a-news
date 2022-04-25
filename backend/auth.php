<?php
    $login = $_GET['login'];
    $pass1 = $_GET['password_1'];
    $pass2 = $_GET['password_2'];

    $back = $_SERVER['HTTP_REFERER'];

    if ($pass1 === $pass2){
        $pass = $pass1;

        print_r(array('login' => $login, 'pass' => $pass));
    }else{
        echo 'Пароли не совпадают!' . '<a href="<?=$back=?>">Назад</a>';
    }

?>
