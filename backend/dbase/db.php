<?php namespace dbase;

use PDO;
use PDOException;

class db {
    private string $host = "localhost";
    private string $db_name = "schema_test";
    private string $username = "root";
    private string $password = "";

    public object $conn;
    public string $back;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->back = $_SERVER['HTTP_REFERER'];
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}