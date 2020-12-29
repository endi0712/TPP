<?php 

include "lib/koneksi.php";
$pengirim= $_POST['pengirim'];
$isi =  $_POST['isi'];

 
$feedback = mysqli_query($koneksi, "INSERT INTO tbl_review (pengirim,isi) VALUES ('$pengirim', '$isi')");

if ($feedback) {
	echo "<script> alert('Terimakasih telah mengirimkan feedback kepada kami'); window.location = 'kontak.php';</script>";
}


?>