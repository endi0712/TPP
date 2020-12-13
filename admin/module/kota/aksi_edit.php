<?php 
session_start();
if (empty($_SESSION['username'])AND empty($_SESSION['password'])) {
	echo "<center> Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idKota=$_POST['id_kota'];
	$namakota=$_POST['nama_kota'];
	$queryEdit = mysqli_query($koneksi,"UPDATE tbl_kota SET nama_kota='$namakota' WHERE id_kota='$idKota'");

	if ($queryEdit) {
		echo "<script>alert('DATA KOTA BERHASIL DIUBAH'); window.location = '$admin_url'+'adminweb.php?module=kota';</script>";
	}else{
		echo "<script> alert('data kota gagal diubah'); window.location='$admin_url'+'adminweb.php?module=edit_kota&id_kota='+'$idKota';</script";
	}

}

 ?>