<?php 
include "template/header.php";
if(!empty($_SESSION['idUser'])){
	include "pages/checkout.php";
	include "template/footer.php";
}else{
	header("location:login.php");
}
?>