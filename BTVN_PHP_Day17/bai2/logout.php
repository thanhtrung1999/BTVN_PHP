<?php
session_start();

unset($_SESSION['username']);
setcookie('remember', '', time()-1);
setcookie('password','', time()-1);
setcookie('username','',time()-1);
$_SESSION['success'] = "Đăng xuất thành công";
header("Location: main.php");
exit();
?>
