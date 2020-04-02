<?php
require "config/database.php";

class Database
{
    private $connection;

    public function databaseConnect(){
        try {
            $this->connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->connection;
    }

    public function databaseClose($connection){
        $this->connection = $connection;
        return $connection = null;
    }
}