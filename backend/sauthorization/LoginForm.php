<?php namespace sauthorization;

spl_autoload_register( function ($db='../dbase/db'){
    include $db.'.php';
});

use dbase\db;

class LoginForm {
    public ?string $login;
    public ?string $pass;

    public object $db;

    public function login(){
        $this->login = ($_GET['login']!=null)? $_GET['login'] : null;
        $this->pass = ($_GET['password']!=null)? $_GET['password'] : null;

        $isExist = $this->checkUsr($this->login, $this->pass);
        if (isset($isExist)){
            $sub = strrpos($_SERVER['HTTP_REFERER'],'/s', 0);
            $url= substr($_SERVER['HTTP_REFERER'],0, $sub).'?id='.$isExist['id'].'&role='.$isExist['role'].'&login='.$this->login;
            header('Location: '.$url);
        }
        print 'Неправильный логин или пароль. ' . '<a href='.$this->db->back.'> Вернуться назад</a>';
    }

    /**
     * Check: exist user in db?
     * @param string|null $login
     * @param string|null $pass
     *
     * @return array|null
     */
    public function checkUsr(?string $login, ?string $pass):?array
    {
        $this->db = new db();

        $query_exist_usr = $this->db->conn->prepare('
            SELECT  *
            FROM    schema_test.users 
            WHERE   login = :login
            and     password = :pass
        ');
        $query_exist_usr->execute([':login'=>$login, ':pass'=>$pass]);
        $dataUsr = $query_exist_usr->fetch();

        return [$login, $pass];

        if (!empty($dataUsr)){
            return $dataUsr;
        }else{
            return null;
        }

    }


}
$LoginForm = new LoginForm();

if (!empty($_GET['login']) && !empty($_GET['password'])){
    $LoginForm->login();
} else {
    
}