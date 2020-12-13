<?php 
session_start();
if (empty($_SESSION['username'])AND empty($_SESSION['password'])) {
	echo "<center> Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idProvinsi=$_POST['id_provinsi'];
	$kodeProvinsi=$_POST['kode_provinsi'];
	$namaProvinsi=$_POST['nama_provinsi'];
	$queryEdit = mysqli_query($koneksi,"UPDATE tbl_provinsi SET kode_provinsi='$kodeProvinsi', nama_provinsi='$namaProvinsi' WHERE id_provinsi='$idProvinsi'");

	if ($queryEdit) {
		echo "<script>alert('DATA provinsi BERHASIL DIUBAH'); window.location = '$admin_url'+'adminweb.php?module=provinsi';</script>";
	}else{
		echo "<script> alert('Data provinsi gagal diubah'); window.location='$admin_url'+'adminweb.php?module=edit_provinsi&id_provinsi='+'$idProvinsi';</script";
	}

}

?>