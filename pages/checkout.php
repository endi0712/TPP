 <head>
 	
 	
 	<style type="text/css">
 		.penerima{
 			background-color: rgba(241, 240, 242,0.3);
 			width: 400px;
 			margin: auto;
 			height: auto;
 			padding: 30px;
 			margin-bottom: 70px;
 		}

 		.rincian{
 			width: 400px;
 			margin-left: 10%;
 		}

 		.kurir{
 			width: 400px;
 		}

 		.total li{
 			list-style: none;
 			text-align: left;
 		}

 		.total li b{
 			margin-right: 40%;
 			display: inline-block;
 		}

 		.total li span {
 			text-align: right;

 		}

 		td input{
 			text-align: right;
 			border: none;
 			background-color: white;
 		}
 	</style>
 </head>

 

 <?php 

 include "lib/config.php";
 include "lib/koneksi.php";
 if(!empty($_POST['chkbox'])){


 	

 	
 	if(isset($_POST["checkout"])){
// foreach($_POST['chkbox'] as $selected){
//                  // echo "Anda memilih $selected<br/>";
// 				$idCart.=$selected.", ";

//             }


 		$idCart = implode(",", $_POST['chkbox']);
 	}

 	$idCust = $_SESSION['idCustomer'];
 	



 	?>

 	<main>
 		<div class="row">
 			<div class="col-lg-12 col-md-12 col-sm-12">
 				<form name="pilih" method="post" action="aksi_order.php">
 					<?php 
 					$queryCustomer = mysqli_query($koneksi,  "SELECT *, K.nama_kota as kota FROM tbl_customer C INNER JOIN tbl_kota K ON C.id_kota = K.id_kota WHERE id_customer = '$idCust' ");


 					while ($cust=mysqli_fetch_array($queryCustomer)){
 						$idkota = $cust['id_kota'];
 						?>



 						<div class="penerima">
 							<h5>Alamat Pengiriman : </h5>
 							<p><?php echo $cust['nama'] ; echo " || " ; echo $cust['alamat'];?></p>
 							<p><?php echo $cust['notelp'] ;?></p>
 							<p><?php echo $cust['kota'] ;?></p>
 						</div>
 					<?php }


 					?>

 				</div>
 				<div class="col-lg-6 col-md-6 col-sm-12 " >
 					<?php 
 					$totalproduk = 0;
 					$query = mysqli_query($koneksi,  "SELECT K.id_keranjang, P.id_produk, P.gambar, P.nama_produk, P.deskripsi, P.harga, K.jumlah FROM tbl_keranjang K INNER JOIN tbl_produk P ON K.id_produk = P.id_produk WHERE K.id_keranjang IN ($idCart)");

 					    while ($cart=mysqli_fetch_array($query)){ 

 						$subtotalproduk= $cart['jumlah'] * $cart['harga'];
 						$totalproduk = $totalproduk + $subtotalproduk;
 						?>
 						<input type="checkbox" name="idkeranjang[]" value="<?php echo $cart['id_keranjang'] ?>" checked hidden>
 						<input type="checkbox" name="idproduk[]" value="<?php echo $cart['id_produk'] ?>" checked hidden>
 						<input type="checkbox" name="jumlah[]" value="<?php echo $cart['jumlah'] ?>" checked hidden>
 						<input type="checkbox" name="harga[]" value="<?php echo $cart['harga'] ?>" checked hidden>
 						<input type="checkbox" name="total[]" value="<?php echo $subtotalproduk ?>" checked hidden>
 						<table class="table table-sm  rincian" >
 							<tbody align="left">
 								<tr align="center">
 									<td rowspan="3"><img src="admin/upload/<?php echo $cart['gambar'] ?>" width="100"></td>
 								</tr>
 								<tr>
 									<td><?php echo "<b>". $cart['nama_produk'];echo "<br> @Rp. "; echo number_format($cart['harga']); echo "<br>Jumlah : ". $cart['jumlah']; ?></td>
 								</tr>
 								<tr>
 									<td align="right"><h6>Rp. <?php echo number_format($subtotalproduk) ;?> </h6> </td>
 								</tr>



 							</tbody>
 						</table>
 					<?php } ?>
 				</div>
 				<div class="col-lg-6 col-md-6 col-sm-12">
 					<div class="kurir">

 						<div class="input-group mb-3 ml-3">

 							<div class="input-group-prepend">
 								<label class="input-group-text" for="inputGroupSelect01">Kurir</label>
 							</div>

 							<select class="custom-select" name="idKurir" id="kurir" onchange="getSelect();">
 								<option disabled selected>--Pilih Kurir--</option>
 								<?php 
 								include "lib/koneksi.php"; 
 								$kueriKurir = mysqli_query($koneksi, "SELECT *, k.nama_kurir as kurir FROM tbl_biaya_kirim b INNER JOIN tbl_kurir k ON b.id_kurir = k.id_kurir WHERE id_kota  = '$idkota'");
 								while($kur=mysqli_fetch_array($kueriKurir)){
 									?>

 									<option value="<?php echo $kur['id_biaya_kirim']; ?>"><?php echo $kur['kurir']; echo "     Rp. " . number_format($kur['biaya']);?></option>
 									<?php   $biayakurir = $kur['biaya']; }?>

 								</select>
 							</div>

 							


 							<div class="input-group mb-3 ml-3 ">

 								<div class="input-group-prepend">
 									<label class="input-group-text" for="inputGroupSelect01">Metode Bayar</label>
 								</div>
 								
 								<select class="custom-select" id="bank" name="metodeBayar">
 									<?php $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_metode_bayar");
 								while($mtd=mysqli_fetch_array($kueri)){
 									 ?>
 									<option value="<?php echo $mtd['id_metode_bayar']; ?>"><?php echo $mtd['nama_metode']; ?></option>

 								<?php } ?>
 								</select>

 							</div>

 							<div class="total ml-4">
 								<input type="text" name="totalTagihan" id="totalTagihan" hidden>
 								<table>
 									<tr>
 										<td align="left"><b>Subtotal Produk</b></td>
 										<td width="200" align="right" >Rp. <?php echo number_format($totalproduk); ?> <span hidden id="totalproduk"><?php echo number_format($totalproduk); ?></span></td>
 									</tr>
 									<tr>
 										<td  align="left"><b>Subtotal Pengiriman</b></td>
 										<td align="right"><input type="text"  disabled id="biaya" name="biaya_kirim"></td>
 									</tr>
 									<tr>
 										<td  align="left"><b>Total Pembayaran</b></td>
 										<td align="right"><input type="text"  disabled id="totalall"></td>
 									</tr>
 									<tr>
 										
 										<td colspan="2"><button type="submit" class="btn-all">Buat Pesanan</button></td>
 									</tr>
 								</table>


 							</div>
 						</form>

 					</div>
 				</div>

 			</div>

 		<?php }else{
 			echo"<script>alert('Pilih produk terlebih dahulu!'); window.location = 'keranjang.php';</script>	";
 		} 
 		?>
 	</main>

 	<script type="text/javascript">
 		function getSelect(){
 			var d = document.getElementById("kurir");
 			var selectv = d.options[d.selectedIndex].text;
 			var kirim = parseFloat(selectv.slice(-6));
 			var totalpro = parseFloat('<?php echo $totalproduk; ?>');
 			var total = totalpro + (kirim * 1000);
 			document.getElementById("biaya").value = selectv.slice(-10);
 			document.getElementById("totalall").value = "Rp. " + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g,'$1,');
 			document.getElementById("totalTagihan").value = total;
 		}

	/*function getSelect(){
		document.getElementById("biaya").innerHTML ={
			"<b>".pilih.kurir[pilih.kurir.selectedIndex].text"</b"
		}
	}*/
	
</script>
