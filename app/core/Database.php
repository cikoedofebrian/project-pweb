<?php


class Database
{
    private $host = DB_HOST;
    private $user = DB_USERNAME;
    private $pass = DB_PASSWORD;
    private $name = DB_NAME;
    private static $_database = null;
    private $conn;

    public function __construct()
    {
        $this->conn = $this->getDb();
    }

    public function getDb()
    {
        $dbh = null;
        try {
            $dbh = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
        } catch (error) {
            var_dump('dbh error');
        }
        return $dbh;
    }

    public function executeQuery($query)
    {
        try {
            $result = mysqli_query($this->conn, $query);
            return $result;
        } catch (error) {
            echo "error";
        }
    }

    public static function getInstance(): Database
    {
        if (!isset(self::$_database)) {
            self::$_database = new Database();
        }
        return self::$_database;
    }
}
