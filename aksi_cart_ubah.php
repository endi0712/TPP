<?php 
session_start();

include "lib/config.php";
include "lib/koneksi.php";

$idKeranjang = $_POST['id_keranjang'];
$Jumlah = $_POST['jumlah'];

if($Jumlah == 0 ){
	echo"<script>alert('Jumlah Kosong'); window.location = 'keranjang.php';</script>	";
}else{
	$queryEdit = mysqli_query($koneksi, "UPDATE tbl_keranjang SET jumlah='$Jumlah' WHERE id_keranjang='$idKeranjang'");
	if($queryEdit){
			
			echo"<script>alert('Berhasil Diubah'); window.location = 'keranjang.php';</script>";
		}else{
		echo"<script>alert('Gagal Diubah'); window.location = 'keranjang.php';</script>";
		}
}

?>