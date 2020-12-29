<main>

	<div style="background-image: url(assets/img/tas.jpg) ; background-repeat: no-repeat; object-fit: cover; height: 700px;">
		<div class="jumbotron" style="background: none">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br> sed do eiusmod
				tempor incididunt ut labore et <br>dolore magna aliqua. Ut enim ad minim veniam,
			</p>
			<h1>DCARE</h1>
			<div class="btn-login" style="width: 150px">
				<a  href="petshop.php">SHOP NOW</a>
			</div>

		</div>

	</div>
	<div class="ket">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 isi">
					<img src="assets/img/home.png" width="80px">
					<h3>HOME</h3>
					<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 isi1">
					<img src="assets/img/cart.png" width="80px">
					<h3>SHOPPING PAGE</h3>
					<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
				</div>
				 
			</div>
		</div>
	</div>	
	<br>
	<br>
	<div class="info-box">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 info1">
				<img src="assets/img/batik.jpg">
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 info2">
				
				<h2 style="color:yellow;">SALE</h2>
				<h3>SALE</h3>
				<h4 style="color:salmon;">SALE</h4>

				<h1>45%</h1>
				<button class="btn btn-warning" onclick="location.href='petshop.php'">CHECK IT NOW</button>		
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 info3" >
				<img src="assets/img/gajah.jpg">		
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 info3">
				<img src="assets/img/ukir_kayu.jpg">

			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 info2">
				
				<h2 style="color:yellow;">SALE</h2>
				<h3>SALE</h3>
				<h4 style="color:salmon;">SALE</h4>

				<h1>50%</h1>
				<button class="btn btn-warning" onclick="location.href='shop.php'">CHECK IT NOW</button>		
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 info4">
				<img src="assets/img/ukir.jpg">		
			</div>
		</div>
	</div>


	<div class="shopnow">

		<h1 align="center">SHOP NOW</h1>
		<div class="shopnowcontainer">
			<div class="row">
				<?php 
				include "lib/koneksi.php"; 
				$q = mysqli_query($koneksi, "SELECT * FROM tbl_produk order by id_produk desc limit 8");
				while($r=mysqli_fetch_array($q)){ ?> 
					<div class="col-lg-3 col-md-3 col-sm-6 " >
						<div class="shopitem">
							<img src="admin/upload/<?php echo $r['gambar'] ?>" height="250px" >
							<p class="title" ><?php echo $r['nama_produk'] ?></p>
							<p class="price">Rp. <?php echo number_format($r['harga']) ?></p>
							<div class="overlay"></div>
							<div class="btn-buy"> <a href="shopitem.php?id_produk=<?php echo $r['id_produk'];?>">BUY</a> </div>

						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="mb-2">
			<button class="btn-more" onclick="location.href='shop.php';">FIND MORE</button>
		</div>
	</div>


</div>


<div class="row">
	 
	</div>
</div>

</main>