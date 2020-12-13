<?php 
session_start();

include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$idKota = $_POST['idKota'];
$idKurir = $_POST['idKurir'];
$idProvinsi = $_POST['idProvinsi'];
$biaya = $_POST['biaya'];
$nbiaya=trim($biaya);
if ($biaya=="") {
	echo "<script>alert('Data tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
}else{
	$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_biaya_kirim (id_kota, id_kurir, id_provinsi,biaya) VALUES ('$idKota','$idProvinsi','$idKurir','$biaya')");
	if ($querySimpan) {
		echo "<script>alert('Data Biaya kirim Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=biaya';</script>";
	}else{
		echo "<script>alert('Data Biaya kirim gagal dimasukkan'); window.location='$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
	}	
} ?>