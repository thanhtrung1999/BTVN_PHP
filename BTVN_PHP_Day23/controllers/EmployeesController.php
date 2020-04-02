<?php
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : "show";
require_once "models/Employees.php";

class EmployeesController
{
    public $error = "";

    public function show(){
        $employee = new Employees();
        $employees = $employee->getAllData();

        require_once "views/employees/index.php";
    }

    public function create(){
        if(isset($_POST['save'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
            $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : "";

            if(empty($name)){
                $this->error = "<p class='error' style='font-size: 18px;'>Name không được để trống</p>";
            } else {
                $new_employee = new Employees();
                $is_create = $new_employee->createEmployee($name, $description, $salary, $gender, $birthday);

                if($is_create){
                    $_SESSION['success'] = "Thêm mới nhân viên thành công";
                    header("Location: index.php?controller=employees");
                    exit();
                } else {
                    die("<h3>Thất bại</h3>");
                }
            }
        }
        require_once "views/employees/create.php";
    }

    public function edit(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            die("<h4 class='error'>Tham số id không hợp lệ</h4>");
        }
        $id = $_GET['id'];
        $employee = new Employees();
        $employee_by_id = $employee->getDataById($id);

        if(isset($_POST['save'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
            $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : "";

            if(empty($name)){
                $this->error = "<p class='error' style='font-size: 18px;'>Name không được để trống</p>";
            } else {
                $update_employee = new Employees();
                $is_update = $update_employee->updateEmployee($id, $name, $description, $gender, $salary, $birthday);

                if($is_update){
                    $_SESSION['success'] = "Cập nhật nhân viên thành công";
                    header("Location: index.php?controller=employees");
                    exit();
                } else {
                    die("<h3>Thất bại</h3>");
                }
            }
        }
        require_once "views/employees/edit.php";
    }

    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            die("<h4 class='error'>Tham số id không hợp lệ</h4>");
        }
        $id = $_GET['id'];
        $employee = new Employees();
        $employee_by_id = $employee->getDataById($id);

        require_once "views/employees/detail.php";
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $employee = new Employees();
            $employee->deleteEmployee($id);

            header("Location: index.php?controller=employees");
            exit();
        }

        require_once "views/employees/delete.php";
    }
}