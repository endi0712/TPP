<?php
$sid = session_id();    
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
							<td class="description">ID member</td>
							<td class="total">Biaya_Kirim</td>
							<td class="quantity">Status</td>
							<td class="price">Tanggal</td>
							<td class="">detile</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$sid =$_SESSION['idMember'];
					      $query = mysqli_query($koneksi,  "SELECT * FROM tbl_order WHERE id_member = '$sid'");
							$total = 0;
							while ($d=mysqli_fetch_array($query)){
								// $total += $d['harga']*$d['jumlah'];
								// $subtotal = $d['harga']*$d['jumlah'];
						 ?>
						<tr>
							<td class="cart_product">
								<p><?php echo $d['id_order'];?></p>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $d['id_member']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p>Rp.<?php echo number_format($d['biaya_kirim']); ?></p>
							</td>
							<td class="cart_quantity">
								<?php echo $d['status_order']; ?>
							</td>
							<td class="cart_total">
								<p class="cart_total"><?php echo $d['tanggal']; ?></p>
							</td>
							<td>
								<a href="detail_riwayat_pemesanan.php?id_order=<?php echo $d['id_order'];?>"class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i>DETAIL ORDER</button></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	</section> <!--/#cart_items-->
