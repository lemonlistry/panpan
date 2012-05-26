<?php
include './conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['pass']==$adminpwd){
    echo "<script>location.href='main.php';</script>";
    exit();
}else{
    $_SESSION['adminname']=null;
    $_SESSION['pass']=null;
    echo "<script>location.href='login.php';</script>";
}

?>
<title>正在转向..........</title>