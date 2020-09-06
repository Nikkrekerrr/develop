<?php

namespace Base;

use PDO;

class model
{
    public $host = 'mysql';
    public $username = 'root';
    public $password = 'password';
    public $db_name = 'test';

    public static $db_connect;

    public function __construct()
    {
        $db_connect = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        self::$db_connect = $db_connect;
        if (!$db_connect)  {
            echo "Соединение не установленно";
        }

    }

    public function selectData()
    {
        $data = self::$db_connect->query("SELECT * FROM data");

        $data->setFetchMode(PDO::FETCH_ASSOC);

        return $DB_data = $data->fetchAll();
    }

    public function insertDataRegister($email, $password)
    {
        $SHL = self::$db_connect->prepare("INSERT INTO data(email, password) VALUES ('$email','{$password}')");
        $SHL->execute();
    }

    public function getDataForLogin($username,$password)
    {
        $data = self::$db_connect->query("SELECT * FROM data WHERE email='{$username}' AND password='{$password}'");

        $data->setFetchMode(PDO::FETCH_ASSOC);

        return $DB_data = $data->fetchAll();
    }
}