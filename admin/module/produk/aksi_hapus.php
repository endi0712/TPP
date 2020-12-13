<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idProduk = $_GET['id_produk'];
	$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_produk WHERE id_produk ='$idProduk'");

	if ($queryHapus) {
		echo "<script >alert('Data produk Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>	";
	}else{
		echo "<script >alert('Data produk Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>	";
	}
}
?>