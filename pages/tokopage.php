<style type="text/css">
	.card p{
		font-size: 19px;
	}
</style>
<main>

	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="breadcumb">
				 
			</div>

			<?php 

			include "lib/koneksi.php";
			include "lib/config.php";
			$idPemilik = $_GET['id_pemilik_ukm'];
			$q = mysqli_query($koneksi, "SELECT * FROM tbl_pemilik_ukm where id_pemilik_ukm= $idPemilik");
			while($r=mysqli_fetch_array($q)){ ?>
				<div class="imgproduct">
					<img src="admin/upload/<?php echo $r['gambar'] ?>" class="imgprod">	
				</div>
			</div>

			<div class="col-lg-8 col-md-6 col-sm-12 mt-5">
				<div class="judul">
					<h5><?php echo $r['nama'] ?><h5>
					<h4><?php echo $r['produk'] ?></h4>
					<h4><?php echo $r['alamat'] ?></h4>
				</div>
				 
		<!-- 		<div class="angka">
					<button data-decrease class="btn-angka">-</button>
					<input data-value type="" name="" value="1">
					<button data-increase class="btn-angka">+</button>
				</div> -->
				 
			</div>
		</div>
		
		
	<?php } ?>


</main>