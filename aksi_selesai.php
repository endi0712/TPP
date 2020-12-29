<?php 
session_start();

include "lib/config.php";
include "lib/koneksi.php";

$idTransaksi= $_GET['id_transaksi'];

		$queryEdit = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status_transaksi='Selesai' WHERE id_transaksi='$idTransaksi'");

		if($queryEdit){
			
			echo"<script >alert('Pesanan telah selesai!'); window.location = 'riwayat.php';</script>	";
		}

?>