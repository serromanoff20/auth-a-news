<?php namespace backend;

class Main
{
    private int $id;
    public string $login;
    public static string $role;


    public function isLogin(): bool
    {
        if ($_GET['id'] === null && $_GET['role'] === null && $_GET['login'] === null){
            http_response_code(401);
            header('Location: '.$_SERVER['HTTP_HOST'].'/sauthorization/login.php');
        } else {
            $this->id = $_GET['id'];
            $this->login = $_GET['login'];

            ($_GET['role'] == 2)? Main::$role = 'Пользовательские права' : Main::$role = 'Права администратора';

            return true;
        }
    }
}

function autoloader(){
    return (new Main())->isLogin();
}

autoloader();

