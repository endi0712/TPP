<?php 
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['passuser'])){
	echo "<center>Untuk mengakses modul, Anda harus login <br>" ;
	echo "<a href= .../../index.php ><b>login</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$idTransaksi = $_POST['id_transaksi'];
	$Statust = $_POST['statust'];
	$Statusb = $_POST['statusb'];
	$Resi = $_POST['resi'];
	
	$queryEdit = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status_transaksi='$Statust' , status_bayar='$Statusb', resi = '$Resi'  WHERE id_transaksi ='$idTransaksi'");

	if($queryEdit){
		echo"<script >alert('Data Transaksi Berhasil Diubah'); window.location =  '$admin_url'+'adminweb.php?module=transaksi';</script>	";
	}else{
		echo"<script >alert('Data Transaksi Gagal Diubah'); window.location =  '$admin_url'+'adminweb.php?module=edit_transaksi&id_transaksi='+'$idTransaksi';</script>	";
	}

}

?>