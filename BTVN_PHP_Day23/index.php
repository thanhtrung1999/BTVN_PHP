<?php
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'employees';

$controller = ucfirst($controller);
$controller .= "Controller";

$path_controller = "controllers/" . $controller . ".php";

if(!file_exists($path_controller)){
    die("<h1>Trang bạn tìm không tồn tại</h1>");
}

require_once "$path_controller";

$object = new $controller;
if(!method_exists($object, $action)){
    die("<h1>Không tồn tại phương thức $action</h1>");
}

$object->$action();
?>