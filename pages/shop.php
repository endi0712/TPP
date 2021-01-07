<style type="text/css">
	.kategori label{
		margin-left: 20px;
	}

	
</style>


<main>
	<div class="row">
		<div class="col-lg-2">
			<div class="option">
				<form action="shopbykategori.php" method="post">
					<div class="kategori mt-3">
						<?php 
						include "lib/koneksi.php"; 
						$q = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
						while($kat=mysqli_fetch_array($q)){
							
							
							?>
							
							<label class="container">

								<input type="checkbox" name="chkbox[]" class="custom-control-input" value="<?php echo $kat['id_kategori']; ?>" checked>
								<span class="checkmark"></span>
								<label><?php echo $kat['nama_kategori']; ?></label>
							</label>
						
						<?php 
							

						} ?>
						
								

					</div>
					 
				</form>
			</div>

		</div>
		<div class="col-lg-10 mainshop">
			<div class="cari mb-4 ">
				<form  action="shopbysearch.php" method="post">

					<div class="input-group">
						<input type="text" name="search" placeholder=" Search a good product">
						<button type="submit">Cari</button>
					</div>

				</form>
			</div>


			<div class="itemshop">

				<div class="row">
					<?php 
					$halaman = 6;
					$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
					$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
					$result = mysqli_query($koneksi,"SELECT * FROM tbl_produk");
					$total = mysqli_num_rows($result);
					$pages = ceil($total/$halaman);  
					$q = mysqli_query($koneksi, "SELECT * FROM tbl_produk order by id_produk desc limit $mulai, $halaman");
					while($r=mysqli_fetch_array($q)){ ?>
						<div class="col-lg-4 col-md-4 col-sm-6" >
							<div class="shopitem">
								<img src="admin/upload/<?php echo $r['gambar'] ?>" height="250px" >
								<p class="title" ><?php echo $r['nama_produk'] ?></p>
								<p class="price">Rp. <?php echo number_format($r['harga']) ?></p>
								<div class="overlay"></div>
								<div class="btn-buy"> <a href="shopitem.php?id_produk=<?php echo $r['id_produk'];?>" >BUY</a> </div>

							</div>
							
						</div>
					<?php } ?>
				</div>
				
			</div>


			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					
					<li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
						<a class="page-link" href="?halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
					</li>

					<?php 
					for ($i=1; $i<=$pages ; $i++){
						?>
						<li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					
						<li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
							<a class="page-link" href="?halaman=<?php echo $page + 1; ?>">Next</a>
						</li>

				</ul>
			</nav>
		</div>

	</div>
</div>

</main>


