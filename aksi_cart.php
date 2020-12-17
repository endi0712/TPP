<?php 
session_start();

if(empty($_SESSION['idCustomer'])){
	echo "<script>alert('Anda belum login'); window.location = 'form_login.php';</script>	";
}else{
include "lib/koneksi.php";
$id_pro = $_GET['id_produk'];
$tanggal = date("Y-m-d");

$idcust = $_SESSION['idMember'];


$sql = mysqli_query($koneksi, "SELECT id_produk FROM tbl_keranjang WHERE id_produk='$id_pro' AND id_member='$idcust'") ;

$ketemu = mysqli_num_rows($sql);

if($ketemu == 0){
	mysqli_query($koneksi, "INSERT INTO tbl_keranjang (id_member, id_produk, jumlah) VALUES ('$idcust', '$id_pro', 1)");
	
}
else{
mysqli_query($koneksi, "UPDATE tbl_keranjang SET jumlah = jumlah + 1 WHERE id_produk='$id_pro' AND id_member='$idcust'");
$_SESSION['cek'] = "sukses";

}



header('location:petshopitem.php?id_produk='.$id_pro);
}
?>