<?php 
include "lib/config.php";
include "lib/koneksi.php";
$id_kurir = $_POST['id_kurir'];
//get id kota from tbl_member
session_start();

$id_member = $_SESSION['idMember'];
$querygetkota = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE id_member='$id_member'");
$res = mysqli_fetch_array($querygetkota);
$idKota = $res['id_kota'];

$querygetbiaya = mysqli_query($koneksi, "SELECT * FROM tbl_biaya_kirim WHERE id_kurir='$id_kurir' AND  id_kota = '$idKota'");
$result = mysqli_fetch_array($querygetbiaya);
$biaya = $result['biaya'];

$_SESSION['biaya_kirim'] = $biaya;

header("location:selesai.php");
?>