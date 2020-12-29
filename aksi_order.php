<?php 
include "template/header.php";
$idcust = $_SESSION['idCustomer'];

if(empty($idcust)){
	echo "<script>alert('Anda belum login'); window.location = 'form_login.php';</script>	";
}else{
	include "lib/koneksi.php";

	$keranjang = $_POST['idkeranjang'];
	$produk = $_POST['idproduk'];
	$jumlah = $_POST['jumlah'];
	$total = $_POST['total'];
	$harga = $_POST['harga'];

	$id_biaya_kirim = $_POST['idKurir'];
	$id_metode_bayar = $_POST['metodeBayar'];
	$tanggal = date("Y-m-d");

	$totalTagihan = $_POST['totalTagihan'];
	$resi = "DPS".(date("dm")).$idcust.mt_rand(5,15);

	


	$queryTransaksi =	mysqli_query($koneksi, "INSERT INTO tbl_transaksi(id_customer, tgl_transaksi, jumlah_bayar, id_biaya_kirim, id_metode_bayar,resi) VALUES ('$idcust', '$tanggal', '$totalTagihan', '$id_biaya_kirim', '$id_metode_bayar','$resi')");

	if($queryTransaksi){
		$last_id = mysqli_insert_id($koneksi);
		for ($i=0; $i < count($produk); $i++) { 
			$idKeranjang = $keranjang[$i];
			$idProduk = $produk[$i];
			$jumlahProduk = $jumlah[$i];
			$totalProduk = $total[$i];
			$hargaProduk = $harga[$i];

			$queryItem = mysqli_query($koneksi, "INSERT INTO tbl_item_transaksi(id_transaksi, id_produk, jumlah_produk,harga, total_harga) VALUES ('$last_id', '$idProduk', '$jumlahProduk', '$hargaProduk','$totalProduk')");

			if($queryItem){
				$queryHapus = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_keranjang = '$idKeranjang' ");
			}


		}

	}
	
	?>

	
	<main>
		<div class="row">
			<?php $kueri = mysqli_query($koneksi, "SELECT * FROM tbl_metode_bayar WHERE id_metode_bayar = '$id_metode_bayar'");
			while($mtd=mysqli_fetch_array($kueri)){
				?>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="alert alert-info" role="alert">
						<b>Menunggu Pembayaran</b> <br> Silakan melakukan pembayaran atas pesanan Anda ke rekening berikut :
					</div>
					<div>
						<h4><?php echo $mtd['rekening']; ?></h4>
						<h6>Total Tagihan : Rp. <?php echo number_format($totalTagihan) ?></h6>
						<h6>Metode Bayar  : <?php echo $mtd['nama_metode'] ?></h6>
					</div>
				</div>
			</div>
		</main>


		<?php 

		
	}


}
include "template/footer.php"; ?>
?>