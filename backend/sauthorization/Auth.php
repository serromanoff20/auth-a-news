<?php namespace backend\sauthorization;

include 'LoginForm.php';

spl_autoload_register( function ($db='../dbase/db'){
    include $db.'.php';
});

use dbase\db as db;
use sauthorization\LoginForm;

class Auth {

    public string $login;
    public string $pass;

    public $db;

    const ErrorNotConnection = 'Ошибка: Нет соединения!';
    const ErrorUndefined = 'Ошибка: Неопределённая ошибка!';

    /**
     * Check: For password matches
     *
     * @return bool
     */
    public function comparePasswords(): bool
    {
        $this->db = new db();

        $this->login = $_POST['login'];
        $pass1 = $_POST['password_1'];
        $pass2 = $_POST['password_2'];

        if ($pass1 === $pass2 && $pass1 != null && $pass2 != null){
            $this->pass = $pass1;

            $this->hashPassword();

            return true;
        }else{
            return false;
        }
    }

    /**
     * Password encryption
     *
     * @return bool
     */
    public function hashPassword():bool
    {
        if (isset($this->pass)){
            $this->pass = md5($this->pass);

            return true;
        }
        return false;
    }

    /**
     * Create row in DB / Registration of user
     *
     * @return array|string
     */
    public function isCreate()
    {
        $loginForm = new LoginForm();

        if (isset($this->db->conn)){
            $arr_result = $loginForm->checkUsr($this->login, $this->pass);

            if(isset($arr_result)){

                return $arr_result;
            }else{
                $query_on_create = "INSERT INTO schema_test.users VALUES (0,'".(string)$this->login."','".(string)$this->pass."',2)";
                $this->db->conn->prepare($query_on_create)->execute();
                $arr_result['message'] = 'Пользоватль успешно зарегистрировался!';

                return $arr_result;
            }
        } else {
            $arr_result = ['message'=>self::ErrorNotConnection];
        }
        return $arr_result['message'];
    }
}
$auth = new Auth();
if ($auth->comparePasswords()) {
    if (gettype($auth->isCreate()) === 'array'){
        $sub = strrpos($_SERVER['HTTP_REFERER'],'/', 0);

        header('Location: '.substr($_SERVER['HTTP_REFERER'], 0, $sub).'/login.php');
    }
}else{
    $result = [
        'login'=>$auth->login,
        'message'=>Auth::ErrorUndefined . '<a href='.$auth->db->back.'> Вернуться назад</a>'
    ];

    echo ($result['message']);
}
