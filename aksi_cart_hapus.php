<?php

include "lib/config.php";
include "lib/koneksi.php";


$idKeranjang = $_GET['id_keranjang'];
$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_keranjang='$idKeranjang'");

if ($queryHapus) {
	echo "<script>alert('Data Keranjang Berhasil Dihapus'); window.location ='keranjang.php';</script>	";
}else{
	echo "<script >alert('Data Keranjang Dihapus'); window.location ='keranjang.php';</script>	";
} 
?>