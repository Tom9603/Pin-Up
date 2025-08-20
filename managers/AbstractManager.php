<?php
abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $connexion = "mysql:host=".$_ENV["localhost"].";port=3306;charset=utf8;dbname=".$_ENV["tomochietti_pin_up"];
        $this->db = new PDO(
            $connexion,
            $_ENV["DB_USER"],
            $_ENV["DB_PASSWORD"]
        );
    }
}