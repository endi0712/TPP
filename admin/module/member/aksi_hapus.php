<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idUser = $_GET['id_user'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user ='$idUser'");

	if ($queryHapus) {
		echo "<script >alert('Data User Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>	";
	}else{
		echo "<script >alert('Data User Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>	";
	}
}
?>