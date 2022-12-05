<?php

class Account_model
{

    private static $data = null;
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public static function getInstance(): Account_model
    {
        if (!isset(self::$data)) {
            self::$data = new Account_model();
        }
        return self::$data;
    }

    public function getAccountTable()
    {
        try {
            $result = $this->db->executeQuery("SELECT*FROM user");
        } catch (error) {
            var_dump("kontol");
        }
        return $result;
    }

    public function getUser($email)
    {
        $result = $this->db->executeQuery("SELECT*FROM user WHERE email='$email'");
        return $result;
    }

    public function register($name,  $email, $address, $password)
    {
        $this->db->executeQuery("INSERT into user(name, email, address, password) VALUES('$name', '$email','$address', '$password')");
    }

    public function update($email, $password)
    {
        $this->db->executeQuery("UPDATE user SET password = '$password' WHERE email = '$email'");
    }
}
