<?php 
session_start();
  
 	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	

	$idKategori = $_POST['idKategori'];
	$namaProduk = $_POST['namaProduk'];
	$namapro=trim($namaProduk);
	$deskripsi = $_POST['deskripsiProduk'];
	$namades=trim($deskripsi);
	$hargaProduk = $_POST['hargaProduk'];
	$namahar=trim($hargaProduk);
	 

if ($namaProduk==" ") {
	echo "<script>alert('nama produk tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}else if ($deskripsi==" ") {
	echo "<script>alert('deskripsi Produk tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
} else if ($hargaProduk==" ") {
	echo "<script>alert('harga produk tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}else if (!is_numeric($hargaProduk)) {
	echo "<script>alert('harga produk tidak boleh string'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
}else{
	$path = "../../upload/".$nama_file;
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
		if ($ukuran_file <= 1000000) {
			if (move_uploaded_file($tmp_file, $path)) {
				$querySimpan = mysqli_query($koneksi,"INSERT INTO tbl_produk (id_kategori,nama_produk, deskripsi,gambar, harga) 
					VALUES ('$idKategori','$namaProduk','$deskripsi','$nama_file','$hargaProduk')" );
				echo "<script>alert('Data Produk Berhasil Masuk'); window.location='$admin_url'+'adminweb.php?module=produk';</script>";
			}else{
				echo "<script>alert('Data Produk Gagal Masuk'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
			}
		}else{
			echo "<script>alert('Data Gambar Produk Gagal dimasukkan, Ukuran melebihi 1Mb'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
		}
	}else{
		echo "<script>alert('Data Gambar Produk Gagal dimasukkan, Format tidak didukung'); window.location='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}
 ?>