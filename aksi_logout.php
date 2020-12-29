<?php 
session_start();

$_SESSION['idCustomer'] = '';
unset($_SESSION['idCustomer']);


session_unset();
session_destroy();
header("location:index.php");
?>