<?php
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul,Anda harus login<br>";
	echo "<a href=../../index.php><b>Login</b></a></center";
}
else{
 	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idBiaya = $_POST['id_biaya_kirim'];
	$idKota = $_POST['idKota'];
	$idKurir = $_POST['idKurir'];
	$idProvinsi = $_POST['idProvinsi'];
	$biaya = $_POST['biaya'];

	$queryEdit = mysqli_query($koneksi,"UPDATE tbl_biaya_kirim SET id_kota='$idKota',id_provinsi='$idProvinsi',id_kurir='$idKurir',biaya='$biaya' WHERE id_biaya_kirim='$idBiaya'");

		if ($queryEdit) {
			echo "<script>alert('Data Berhasil Diubah'); window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
		}else{
			echo "<script>alert('Data Gagal Diubah'); window.location='$admin_url'+'adminweb.php?module=tambah_biaya';</script>";	
	}
}
?>
