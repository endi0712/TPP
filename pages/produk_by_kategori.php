	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<?php 
							$q = mysqli_query ($koneksi, "SELECT * FROM tbl_kategori");
							while($r = mysqli_fetch_array($q)){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="produkbykategori.php?id_kategori=<?php echo $r['id_kategori'] ?>">
											<?php echo $r['nama_kategori'] ?>
										</a>
									</h4>
								</div>
							</div>
							<?php } ?>
						</div><!--/category-products-->
					 
						
						 
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Produk Berdasar Kategori</h2>
						<?php 
						$id = $_GET['id_kategori'];
						$q = mysqli_query($koneksi, "SELECT * FROM tbl_produk where id_kategori = $id ");
						while($r=mysqli_fetch_array($q)){ ?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="admin/upload/<?php echo $r['gambar'] ?>" alt="" />
											<h2>Rp. <?php echo number_format($r['harga']) ?></h2>
											<p><?php echo $r['nama_produk'] ?></p>
											<a href="keranjang.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<br> 
								</div>
								 
							</div>
						</div>
	
						<?php } ?>
					</div><!--features_items-->
					</div>
			</div>
		</div>
	</section>