<?php  
?>	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">ID order</td>
							<td class="description">nama produk</td>
							<td>Harga Beli</td>
							<td class="total">jumlah</td>
						</tr>
					</thead>
					<tbody>
						<?php
						 $idOrder=$_GET['id_detail_pemesanan'];
							  $q = mysqli_query($koneksi,  "SELECT * , d.harga as harga_order FROM tbl_detail_pemesanan d INNER JOIN tbl_produk p ON d.id_produk = p.id_produk WHERE d.id_detail_pemesanan = '$idOrder'");

							  while ($or=mysqli_fetch_array($q)) {
							   ?>
						<tr>
							<td class="cart_product">
								<p><?php echo $or['id_detail_pemesanan'];?></p>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $or['nama_produk']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p>Rp.<?php echo number_format($or['harga_order']); ?></p>
							</td>
							<td class="cart_quantity">
								<?php echo $or['jumlah']; ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	</section> <!--/#cart_items-->
