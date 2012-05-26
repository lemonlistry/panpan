<?php
include 'conn.php';
session_start();
$_SESSION=array(); 

echo "<script>location.href='login.php';</script>";
?>