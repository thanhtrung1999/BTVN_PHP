<?php
require "models/Database.php";

class Employees extends Database
{
    public $id;
    public $name;
    public $description;
    public $gender;
    public $salary;
    public $birthday;
    public $created_at;

    public $connection;

    public function __construct()
    {
        $this->connection = $this->databaseConnect();
        return $this->connection;
    }

    public function setAllData($name, $description, $salary, $gender, $birthday){
        $this->name = $name;
        $this->description = $description;
        $this->salary = $salary;
        $this->gender = $gender;
        $this->birthday = $birthday;
    }

    public function getAllData(){
        $obj_select = $this->connection->prepare("SELECT * FROM `employees`");

        $obj_select->execute();
        $employees = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        $this->databaseClose($this->connection);
        return $employees;
    }

    public function getDataById($id){
        $this->id = $id;
        $obj_select = $this->connection->prepare("SELECT * FROM `employees` WHERE `id` = :id");
        $arr_select = ['id' => $id];
        $obj_select->execute($arr_select);
        $employees_by_id = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        $this->databaseClose($this->connection);
        return $employees_by_id;
    }

    public function createEmployee($name, $description, $salary, $gender, $birthday){
        $this->setAllData($name, $description, $salary, $gender, $birthday);

        $obj_insert = $this->connection->prepare("INSERT INTO `employees`(`name`,`description`,`gender`,`salary`,`birthday`) 
                    VALUES (:name, :description, :gender, :salary, :birthday)");

        $arr_insert = [
            'name' => $name,
            'description' => $description,
            'gender' => $gender,
            'salary' => $salary,
            'birthday' => $birthday
        ];

        $is_insert = $obj_insert->execute($arr_insert);

        $this->databaseClose($this->connection);
        return $is_insert;
    }

    public function updateEmployee($id, $name, $description, $gender, $salary, $birthday){
        $this->id = $id;
        $this->setAllData($name, $description, $gender, $salary, $birthday);

        $obj_update = $this->connection->prepare("UPDATE `employees` 
                    SET `name` = :name, `description` = :description, `gender` = :gender, `salary` = :salary, `birthday` = :birthday WHERE `id` = :id");
        $arr_update = [
            'name' => $name,
            'description' => $description,
            'gender' => $gender,
            'salary' => $salary,
            'birthday' => $birthday,
            'id' => $id
        ];

        $is_update = $obj_update->execute($arr_update);

        $this->databaseClose($this->connection);
        return $is_update;
    }

    public function deleteEmployee($id){
        $this->id = $id;
        $obj_delete = $this->connection->prepare("DELETE FROM `employees` WHERE `id` = :id");
        $arr_delete = ['id' => $id];

        $is_delete = $obj_delete->execute($arr_delete);

        $this->databaseClose($this->connection);
        return $is_delete;
    }
}