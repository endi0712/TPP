<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idProvinsi = $_GET['id_provinsi'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_provinsi WHERE id_provinsi ='$idProvinsi'");

	if ($queryHapus) {
		echo "<script >alert('Data provinsi Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=provinsi';</script>	";
	}else{
		echo "<script >alert('Data provinsi Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=provinsi';</script>	";
	}
}
?>