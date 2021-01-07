<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=.../../index.php><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idCustomer = $_GET['id_customer'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_customer WHERE id_customer='$idCustomer'");

	if ($queryHapus) {
		echo "<script >alert('Data Customer Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>	";
	}else{
		echo "<script >alert('Data Customer Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=member';</script>	";
	}
}
?>