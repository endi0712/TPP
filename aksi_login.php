<?php 
include "lib/config.php";
include "lib/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$queryLogin = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE username = '$username' AND password = '$password'");
$resultQuery = mysqli_num_rows($queryLogin);
$result = mysqli_fetch_array($queryLogin);

if ($resultQuery>0) {
	session_start();

	$_SESSION['idMember'] = $result['id_member'];
	header('location:index.php');
}else{

	echo "<script>alert('Data Login Salah'); window.location='$base_url'+'login.php';</script>";	
}
?>