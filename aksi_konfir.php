<?php 
include "lib/config.php";
include "lib/koneksi.php";

$Jumlah = $_POST['jumlah'];
$Foto = $_POST['foto'];
$Tgl = $_POST['tgl_transfer'];
$Rekening = $_POST['rekening'];
$idCustomer = $_POST['id_customer'];


$jumlah  = trim($Jumlah);
$rekening = trim($Rekening);
$tgl = trim($Tgl);
 
 
	if($jumlah==""){
		echo"<script> alert('Data Jumlah Tidak Boleh kosong');window.location = 'konfirmasi.php';</script>";
	}elseif($tgl==""){
		echo"<script> alert('Data Tanggal Transfer Tidak Boleh kosong'); window.location = 'konfirmasi.php';</script>";
	}elseif($rekening==""){
		echo"<script> alert('Data Rekening Tidak Boleh kosong'); window.location = 'konfirmasi.php';</script>";
	} 
	else{
		$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_konfirmasi (id_customer,jumlah,foto,rekening,tgl_transfer ) VALUES ( '$idCustomer','$Jumlah','$Foto','$Rekening','$Tgl' )" );

		if ($querySimpan) {

			 
				echo "<script> alert('Terimakasih Untuk Konfirmasinya'); window.location = 'index.php';</script>";
 
		}else{
			echo "<script> alert('Yahh gagal daftar'); window.location = 'konfirmasi.php';</script>";
		}
	}
 


?>