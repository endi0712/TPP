<?php 
session_start();
if (empty($_SESSION['username'])AND empty($_SESSION['password'])) {
	echo "<center> Untuk mengakses modul, anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idKategori=$_POST['id_kategori'];
	$namaKategori=$_POST['namaKategori'];
	$queryEdit = mysqli_query($koneksi,"UPDATE tbl_kategori SET nama_kategori='$namaKategori' WHERE id_kategori='$idKategori'");

	if ($queryEdit) {
		echo "<script> alert('DATA KATEGORI BERHASIL DIUBAH'); window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
	}else{
		echo "<script> alert('data kategori gagal diubah'); window.location='$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$idKategori';</script";
	}

}

?>