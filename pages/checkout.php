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
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 

						if(!empty($_SESSION['idMember'])){
					      $id = $_SESSION['idMember'];
					      $queryMember = mysqli_query($koneksi,  "SELECT * FROM tbl_member WHERE id_member = '$id'");
					      $hasil=mysqli_fetch_array($queryMember);
					      $kotaM = $hasil['id_kota'];

					      $query = mysqli_query($koneksi,  "SELECT * FROM tbl_keranjang o INNER JOIN tbl_produk p ON o.id_produk = p.id_produk WHERE (o.id_member = '$id' OR o.id_session = '$sid') AND o.status = 'P' ");
					     }else{
					      $query = mysqli_query($koneksi,  "SELECT * FROM tbl_keranjang o INNER JOIN tbl_produk p ON o.id_produk = p.id_produk WHERE o.id_session = '$sid' AND o.status='P'");
     						}
							$total = 0;
							while ($d=mysqli_fetch_array($query)){
								$total += $d['harga']*$d['jumlah'];
								$subtotal = $d['harga']*$d['jumlah'];
						 ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="admin/upload/<?php echo $d['gambar']; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $d['nama_produk']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p>Rp. <?php echo number_format($d['harga']); ?></p>
							</td>
							<td class="cart_quantity">
								<?php echo $d['jumlah']; ?>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $subtotal; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Total Belanja</td>
										<td>Rp. <?php echo number_format($total); ?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Biaya Kirim</td>
										<td><?php 
										if(!empty($_SESSION['biaya_kirim'])){
											echo "Rp. ".$_SESSION['biaya_kirim'];
										}else{
											echo "Belum memilih kurir";
										}
										 ?></td>							
									</tr>
									<tr>
										<td>Total Bayar</td>
			<td><span>Rp. <?php $total_bayar = $total+$_SESSION['biaya_kirim']; echo number_format($total_bayar); ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Pilih Kurir</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="pilihkurir.php">

				            <div class="form-group col-md-6">
				            	<select name="id_kurir" class="form-control">
				            		<?php 
				            		$getKurir = mysqli_query($koneksi, "SELECT * FROM tbl_kurir");
				            		while ($itemKurir = mysqli_fetch_array($getKurir)) {
				            		 ?>
				            		 <option value="<?php echo $itemKurir['id_kurir'] ?>" >
				            		 	<?php echo $itemKurir['nama_kurir']; ?>
				            		 </option>
				            		<?php } ?>
				            	</select>
				            </div>

				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Pilih kurir">
				            </div>                   
				        </form>
	    			</div>
	    		</div>
	    	</div>
	    	<?php 
				$idMember = $_SESSION['idMember'];
				$queryGetProfilMember = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE id_member = $idMember");
				$res = mysqli_fetch_array($queryGetProfilMember);

	    	 ?>
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Data Penerima</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Nama" value="<?php echo $res['nama']; ?>" disabled>
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email" value="<?php echo $res['email']; ?>" disabled>
				            </div>
				            <div class="form-group col-md-6">
				                <input type="text" name="email" class="form-control" required="required" placeholder="Nomor Handphone" value="<?php echo $res['nohp']; ?>" disabled>
				            </div>
				            <div class="form-group col-md-6">
				            	<select name="idKota" class="form-control" disabled>
				            		<?php 
				            		$getKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
				            		while ($itemKota = mysqli_fetch_array($getKota)) {
				            		 ?>
				            		 <option value="<?php echo $itemKota['id_kota']; ?>" ><?php echo $itemKota['nama_kota']; ?></option>
				            		<?php } ?>
				            	</select>
				            </div>				            
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here" disabled><?php echo $res['alamat']; ?></textarea>
				            </div>                        
				        </form>
				        <a href="terimakasih.php"><button name="submit" class="btn btn-primary pull-right">Selesai</a>
	    			</div>
	    		</div>
	    	</div>	    				
		</div>
	</section> <!--/#cart_items-->
