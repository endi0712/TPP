<style type="text/css">
	.card p{
		font-size: 19px;
	}
</style>
<main>

	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="breadcumb">
				<ul>
					<li><a href="" class="br-item">Shop</a> / </li>
					<li><a href="" class="br-item">Category</a> / </li> 
					<li ><a href="" class="aktif">Shopping item</a></li>
				</ul>
			</div>

			<?php 

			include "lib/koneksi.php";
			include "lib/config.php";
			$idProduk = $_GET['id_produk'];
			$q = mysqli_query($koneksi, "SELECT * FROM tbl_produk where id_produk= $idProduk");
			while($r=mysqli_fetch_array($q)){ ?>
				<div class="imgproduct">
					<img src="admin/upload/<?php echo $r['gambar'] ?>" class="imgprod">	
				</div>
			</div>

			<div class="col-lg-8 col-md-6 col-sm-12 mt-5">
				<div class="judul">
					<h5><?php echo $r['nama_produk'] ?></h5>
					<h4>Rp. <?php echo number_format($r['harga']) ?></h4>
				</div>
				<div class="keterangan">
					<p><?php echo $r['deskripsi'] ?></p>
				</div>
		<!-- 		<div class="angka">
					<button data-decrease class="btn-angka">-</button>
					<input data-value type="" name="" value="1">
					<button data-increase class="btn-angka">+</button>
				</div> -->
				<div class="btn-choice">
					
					<a href="aksi_cart.php?id_produk=<?php echo $r['id_produk'];?>" class="add-to-cart"  id="cart-success"><i class="fa fa-shopping-cart"></i> Add to Cart</a>

					
					
				</div>
			</div>
		</div>
		<hr>
		<div class="deskripsi-produk">
			<div class="spesifikasi">
				<ul>
					<?php
					$idkat = $r['id_kategori'];
					$kueriKategori = mysqli_query($koneksi, "SELECT * from tbl_kategori where id_kategori = '$idkat'");
					while ($kat=mysqli_fetch_array($kueriKategori)){  
						?>
						<li><label>Kategori</label> <p><?php echo $kat['nama_kategori'] ;?></p></li><?php } ?>
				</ul>
					</div>


					</div>
 
				<?php } ?>


			</main>
