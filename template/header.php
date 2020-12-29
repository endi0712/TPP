<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">

	<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="assets/css/jquery.timepicker.css">

	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/style3.css">
	<link rel="stylesheet" href="assets/css/style2.css">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>E-UKM Kalurahan Gedangrejo</title>
</head>
<script>    
	if(typeof window.history.pushState == 'function') {
		window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
	}
</script>
<body>

	<header >
		<div class="container-fluid p-0" >
			<nav class="navbar navbar-expand-lg navbar-light navi">
				<a class="btn" href="#">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a class="btn" href="#">
					<i class="fab fa-twitter"></i>
				</a>

				<a class="btn" href="#">
					<i class="fab fa-instagram"></i>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse menu-button" id="navbarNavDropdown">
					<div class="mr-auto"></div>
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kontak.php">Contact</a>
						</li>
						<?php session_start() ;if(!empty($_SESSION['idCustomer'])){ ?>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Account
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="profil.php">Profil</a>
								<a class="dropdown-item" href="riwayat.php">Riwayat</a>
								<a class="dropdown-item" href="ubah_password.php">Ubah Password</a>
								<a class="dropdown-item" href="aksi_logout.php">Keluar</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="keranjang.php"><i class="fa fa-shopping-cart"></i>  My Cart  <span class="badge badge-warning ml-1"><?php 
								include "lib/koneksi.php";
								$idcust = $_SESSION['idCustomer'];
								$query = mysqli_query($koneksi, "SELECT COUNT(id_keranjang) AS'count' FROM tbl_keranjang WHERE id_customer = $idcust");
								$jumlah = mysqli_fetch_assoc($query); 
								echo $jumlah['count'];
								?></span></a>
							</li>

							<?php } ; if(empty($_SESSION['idCustomer'])){ ?>

							<form class="form-inline">
								<div class="btn-login" >
									<a role="button" href="form_login.php">LOGIN</a>
								</div>

							</form>
							<?php } ; ?>
						</ul>
					</div>
				</nav>


				<div class="menu" id="navbar">
					<ul>
						<li><img src="assets/img/gkk.png"  width="70" class="mx-auto d-block" onclick="location.href='index.php';"></li>
						<li><a href="shop.php">SHOP PAGES</a></li> 
					</ul>
				</div>


			</header>