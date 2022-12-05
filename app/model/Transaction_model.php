<?php
class Transaction_model
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
    public function getAllTable($email)
    {
        try {
            $result = $this->db->executeQuery("SELECT * FROM orders o JOIN payment_details p on
            o.payment_id = p.payment_id JOIN category_details c
            on o.category_id = c.category_id JOIN
            duration_details d on o.duration_id = d.duration_id
            join user u on o.user_id = u.user_id WHERE email = '$email'");
        } catch (error) {
            var_dump("error");
        }
        return $result;
    }

    public function AddNewOrder($weight, $duration, $category, $payment, $user)
    {
        $date = date("Y-m-d");
        try {
            $this->db->executeQuery("INSERT INTO ORDERS (weight, duration_id, user_id, category_id, payment_id) VALUES($weight, $duration, $user, $category, $payment)");
        } catch (error) {
            var_dump("error");
        }
    }
}
