<?php 
include "lib/config.php";
include "lib/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$namalengkap = $_POST['nama'];
$alamat = $_POST['alamat'];
$idkota = $_POST['idkota'];
$email = $_POST['email'];
 

$queryCekUsername = mysqli_query($koneksi, "SELECT username FROM tbl_member WHERE username = '$username'");
$jmlUsername = mysqli_num_rows($queryCekUsername);

if ($jmlUsername>0) {
	echo "<script>alert('Username sudah digunakan'); window.location='$base_url'+'daftar.php';</script>";
}else{
	$queryDaftar = mysqli_query($koneksi, "INSERT INTO tbl_member(username, password, nama, alamat, id_kota, email )VALUES ('$username', '$password', '$namalengkap', '$alamat', '$idkota', '$email' ) ");

	if ($queryDaftar) {
		echo "<script>alert('Data registrasi Berhasil Masuk'); window.location='$base_url'+'index.php';</script>";	
	}else{
		echo "<script>alert('Data registrasi Gagal Masuk'); window.location='$base_url'+'daftar.php';</script>";
	}
}
?>