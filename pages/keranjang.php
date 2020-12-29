<main>
	<?php include "lib/config.php"; ?>
	<section>

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="cart-item">
					<h1>My Carts</h1>
					<form name = "frm" action="checkout.php" method="post" >
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Produk</th>
									<th scope="col">Harga</th>
									<th scope="col">Jumlah</th>
									<th scope="col">Total</th>
									<th scope="col">Ubah</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								include "lib/koneksi.php";
								include "lib/config.php";
								$idCust = $_SESSION['idCustomer'];
								$subtotal = 0;
								$query = mysqli_query($koneksi,  "SELECT K.id_keranjang, P.gambar, P.nama_produk, P.deskripsi, P.harga, K.jumlah FROM tbl_keranjang K INNER JOIN tbl_produk P ON K.id_produk = P.id_produk WHERE K.id_customer = '$idCust'");
								while ($cart=mysqli_fetch_array($query)){
									$idcart = $cart['id_keranjang'];
									?>
									<tr> 
										<td width="70"><label class="container">
											<input type="checkbox" name="chkbox[]" value="<?php echo $cart['id_keranjang'] ?>" id="checkbok" class="cekbox">
											<span class="checkmark"></span>
										</label></td>
										<td><img src="admin/upload/<?php echo $cart['gambar']; ?>" width="100"> <br> <h5><?php echo $cart['nama_produk'] ;?></h5></td>
										

										<td>Rp.<?php echo number_format($cart['harga']) ;?> 



										<td><?php echo $cart['jumlah'] ;?></td>

										<td >Rp. <?php $total = $cart['harga'] * $cart['jumlah'];
										$subtotal = $subtotal + $total; echo number_format($total);   ?></span></td>

										<td>

											<a class="btn btn-danger" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" href="aksi_cart_hapus.php?id_keranjang=<?php echo $cart['id_keranjang']?>"><i class="fa fa-trash" aria-hidden="true" ></i></a></button>

											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $cart['id_keranjang']; ?>" ><i class="fa fa-edit" aria-hidden="true"></i></button>

										</td>
									</tr>
									
									</div>
								<?php } ?>
								<tr>
									<td><label class="container">
										<input type="checkbox" onchange="checkAll(this)" name="chk[]">
										<span class="checkmark"></span>
									</label></td>
									<td><button type="submit" class="btn btn-success cekout" name="checkout" id="checkbtn" >Check Out</button></td>
									<td></td>
									<td ><h4>Subtotal</h4></td>
									<td><h4> Rp. <?php 
									echo number_format($subtotal);?></h4></td>
									<td></td>
								</tr>

							</tbody>
						</table>
					</div>
						</form>
						<div class="modal fade" id="myModal<?php echo $idcart; ?>" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">Ubah Keranjang</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>

												</div>
												<div class="modal-body">
													<form role="form" action="aksi_cart_ubah.php" method="post" >

														<?php
														include "lib/koneksi.php";
														; 
														$query_edit = mysqli_query($koneksi,"SELECT * FROM tbl_keranjang WHERE id_keranjang='$idcart'");

														while ($row = mysqli_fetch_array($query_edit)) {  
															?>

															<input type="hidden" name="id_keranjang" value="<?php echo $row['id_keranjang']; ?>">

															<div class="form-group">
																<label>Jumlah</label>
																<input type="number" name="jumlah" class="form-control" value="<?php echo $row['jumlah'] ;?>">      
															</div>


															<div class="modal-footer">  
																<button type="submit" class="btn btn-success" >Ubah</button>
																<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
															</div>
														<?php } ?>
													</form>
												</div>
											</div>
										</div>
					</div>

				</div>


			</div>


		</section>
		
	</main>

	<script type="text/javascript">
		function checkAll(ele) {
			var checkboxes = document.getElementsByTagName('input');
			if (ele.checked) {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox' ) {
						checkboxes[i].checked = true;
					}
				}
			} else {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = false;
					}
				}
			}
		}

		


	</script>
