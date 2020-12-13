<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idBiaya = $_GET['id_biaya_kirim'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_biaya_kirim WHERE id_biaya_kirim ='$idBiaya'");

	if ($queryHapus) {
		echo "<script >alert('Data biaya_kirim Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>	";
	}else{
		echo "<script >alert('Data biaya_kirim Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>	";
	}
}
?>