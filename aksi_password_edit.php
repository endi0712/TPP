<?php 
session_start();

include "lib/config.php";
include "lib/koneksi.php";

$idCustomer = $_POST['id_customer'];
$NewPassword = md5($_POST['newpassword']);
$NewPassword1 = md5($_POST['newpassword1']);
$Password = md5($_POST['oldpassword']);


$queryCekPass = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE id_customer ='$idCustomer' AND password='$Password'");
$hsl = mysqli_num_rows($queryCekPass);

if ($hsl > 0) {

	if($NewPassword==$NewPassword1){
		$queryEdit = mysqli_query($koneksi, "UPDATE tbl_customer SET password='$NewPassword' WHERE id_customer='$idCustomer'");

		if($queryEdit){
			
			echo"<script >alert('Password Berhasil Diubah'); window.location = 'ubah_password.php?id_customer=$idCustomer';</script>	";
		}else{
			echo"<script >alert('Password Gagal Diubah'); window.location = 'ubah_password.php?id_customer=$idCustomer';</script>	";
		}
	}else{
		echo"<script >alert('Password Baru Tidak Sama'); window.location = 'ubah_password.php?id_customer=$idCustomer';</script>	";
	}
}else{
	echo"<script >alert('Password Lama Salah'); window.location = 'ubah_password.php?id_customer=$idCustomer';</script>	";
}

?>