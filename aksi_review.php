<?php 
include "lib/config.php";
include "lib/koneksi.php";

$idUser = $_POST['id_user'];
$isi =$_POST['isi'];
$tgl_review=$_POST['tgl_review'];

$querySimpan =mysqli_query($koneksi,"INSERT INTO tbl_review (id_user,isi,tgl_review)VALUES('$idUser','$isi','$tgl_review')");
if ($querySimpan) {
	echo "<script> alert ('DATA REVIEW BERHASIL MASUK'); window.location='$base_url'+'index.php';</script>";
} else { 
	echo "<script> alert('DATA REVIEW GAGAL DIMASUKKAN'); window.location = '$base_url'+'shop.php';</script>";
}

?>