<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idPemilik = $_GET['id_pemilik_ukm'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_pemilik_ukm WHERE id_pemilik_ukm ='$idPemilik'");

	if ($queryHapus) {
		//echo "<script >alert('Data Pemilik UKM Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=pemilik';</script>	";
	}else{
		//echo "<script >alert('Data Pemilik UKM Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=pemilik';</script>	";
	}
}
?>