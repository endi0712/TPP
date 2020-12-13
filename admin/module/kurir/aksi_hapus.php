<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idkurir = $_GET['id_kurir'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_kurir WHERE id_kurir ='$idkurir'");

	if ($queryHapus) {
		echo "<script >alert('Data kurir Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kurir';</script>	";
	}else{
		echo "<script >alert('Data kurir Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kurir';</script>	";
	}
}
?>