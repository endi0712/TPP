<?php 
session_start();
include "lib/config.php";
include "lib/koneksi.php";

$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];

$idMember = $_SESSION['idMember'];
$querycari = mysqli_query($koneksi,"SELECT * From tbl_member WHERE id_member= '$idMember' AND password = '$password2'");
$hsl = mysqli_num_rows($querycari);	
if ($hsl > 0 ) {
	$queryEdit = mysqli_query($koneksi, 
		"UPDATE tbl_member SET 
		password = '$password'
		WHERE  id_member = '$idMember' ");
	if ($queryEdit) {
		echo "<script>alert('Data password Berhasil Diganti'); window.location='$base_url'+'index.php';</script>";	
	}else{
		echo "<script>alert('Data password tidak berhasil diganti'); window.location='$base_url'+'ganti_password.php';</script>";
	}

}else{
	echo "<script>alert('password salah'); window.location='$base_url'+'.php'ganti_password.php;</script>";
}


?>