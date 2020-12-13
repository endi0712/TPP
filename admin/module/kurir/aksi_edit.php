<?php 
session_start();
if (empty($_SESSION['username'])AND empty($_SESSION['password'])) {
	echo "<center> Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idkurir=$_POST['id_kurir'];
	$namakurir=$_POST['nama_kurir'];
	$queryEdit = mysqli_query($koneksi,"UPDATE tbl_kurir SET nama_kurir='$namakurir' WHERE id_kurir='$idkurir'");

	if ($queryEdit) {
		echo "<script>alert('DATA kurir BERHASIL DIUBAH'); window.location = '$admin_url'+'adminweb.php?module=kurir';</script>";
	}else{
		echo "<script> alert('data kurir gagal diubah'); window.location='$admin_url'+'adminweb.php?module=edit_kurir&id_kurir='+'$idkurir';</script";
	}

}

?>