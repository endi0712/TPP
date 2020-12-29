<?php 
include "lib/koneksi.php";
include "lib/config.php";


$username = $_POST['username'];
$password = md5($_POST['password']);

$queryLogin = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE username ='$username' AND password='$password'");
$resultQuery = mysqli_num_rows($queryLogin);

$result = mysqli_fetch_array($queryLogin);

if($resultQuery>0){
	session_start();

	$_SESSION['idCustomer'] = $result['id_customer'];

header("location:index.php");

}else{

	echo "<script> alert('Username atau Password Tidak Valid'); window.location = 'form_login.php';</script>";
} ?>