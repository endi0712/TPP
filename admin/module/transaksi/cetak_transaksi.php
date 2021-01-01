 <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">

                <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                        </a>
                    </ol>
                </div>
            </div>
            <!-- row -->
<div class="content-wrapper">
 
<section class="content">
	<h1 align="center">E-UKM Kalurahan Gedangrejo <img src="upload/gkk.png" width="50"></h1>
	<div class="row">
		<div class="col-xs-12">
			<div class="box" id="printArea">

				<?php  			

				if(!empty($_SESSION['tgl-a'])){
					$tgl_a = $_SESSION['tgl-a'] ;
					$tgl_b = $_SESSION['tgl-b'] ;
				}else{
					include "../lib/config.php";
					include "../lib/koneksi.php";
					$kueri = mysqli_query($koneksi, "SELECT (SELECT tgl_transaksi FROM tbl_transaksi order by tgl_transaksi asc limit 1) as tgl_a,
						(SELECT tgl_transaksi FROM tbl_transaksi order by tgl_transaksi desc limit 1) as tgl_b  FROM tbl_transaksi");
					$res=mysqli_fetch_array($kueri);

					$tgl_a = $res['tgl_a'] ;
					$tgl_b = $res['tgl_b'] ;
				} ?>
				<div class="box-header">
					<h4 class="box-tittle">Data Transaksi <small>Tanggal : <?php echo date("d-M-Y",strtotime($tgl_a))." s/d ".date("d-M-Y",strtotime($tgl_b)); ?></small></h4>	 			
				</div>


				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<td>ID transaksi</td>
							<th>Tanggal transaksi</th>
							<th>Customer</th>
							<th>Status transaksi</th>
							<th>Status bayar</th>
							<th>Jumlah bayar</th>
							<th>Biaya Kirim</th>
							<th>Kurir</th>
							<th>Resi</th>
						</tr>
						<?php 


						if(!empty($_SESSION['tgl-a'])){
							$kueri = mysqli_query($koneksi, "SELECT * from tbl_transaksi t inner join tbl_customer c on t.id_customer = c.id_customer 
								inner join tbl_biaya_kirim bk on t.id_biaya_kirim = bk.id_biaya_kirim inner join tbl_kurir kr on bk.id_kurir = kr.id_kurir WHERE t.tgl_transaksi BETWEEN '$tgl_a' AND '$tgl_b' order by id_transaksi asc ");
						}else{
							$kueri = mysqli_query($koneksi, "SELECT * from tbl_transaksi t inner join tbl_customer c on t.id_customer = c.id_customer 
								inner join tbl_biaya_kirim bk on t.id_biaya_kirim = bk.id_biaya_kirim inner join tbl_kurir kr on bk.id_kurir = kr.id_kurir  order by id_transaksi asc");
						}

						$totalbk = 0;
						while ($r=mysqli_fetch_array($kueri)) {
							$totalbk = $totalbk + $r['biaya'];
							$idTransaksi[] = $r['id_transaksi'];
							?>
							<tr class="">
								<td><?php echo $r['id_transaksi']; ?></td>
								<td><?php echo $r['tgl_transaksi']; ?></td>
								<td><?php echo $r['username']; ?></td>
								<td><?php echo $r['status_transaksi'];?></td>
								<td>
									<?php
									$status = $r['status_bayar'];


									if($status == "Belum"){
										?>
										<span class="badge bg-red"><?php echo $status; ?></span>

										<?php 
									}else{
										?>
										<span class="badge bg-green"><?php echo $status; ?></span>
										<?php 
									}?>     
								</td>
								<td>Rp.<?php echo number_format($r['jumlah_bayar']); ?></td>
								<td>Rp.<?php echo number_format($r['biaya']); ?></td>
								<td>
									<?php echo $r['nama_kurir']; ?>
								</td>
								<td>
									<?php echo $r['resi'];?>     
								</td>


							</tr>
						<?php } 
						$idO = implode(",", $idTransaksi);
						unset($_SESSION['tgl-a']);
						unset($_SESSION['tgl-b']); 
						?>
						
					</table>


				</div>


			</div>	
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12">
			<div class="box">


				<div class="box-header">
					<h4 class="box-tittle">Data Detail Transaksi</h4>	 			
				</div>


				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th style="width: 100px">ID Transaksi</th>
							<th style="width: 100px">ID Produk</th>
							<th style="width: 150px">Nama Produk</>
								<th style="width: 110px">Harga Produk</>	
									<th style="width: 110px">Jumlah</th>
									<th style="width: 110px">Subtotal</th>

								</tr>
								<?php 
								$kueri = mysqli_query($koneksi, "SELECT * , d.harga as harga_transaksi FROM tbl_item_transaksi d INNER JOIN tbl_produk p on d.id_produk = p.id_produk WHERE d.id_transaksi IN ($idO) order by d.id_transaksi asc");	

								$total = 0;
								while ($r=mysqli_fetch_array($kueri)) {
									$Subtotal = $r['jumlah_produk']*$r['harga_transaksi'];
									$total = $total + $Subtotal;
									?>

									<tr class="">
										<td><?php echo $r['id_transaksi']; ?></td>
										<td><?php echo $r['id_produk']; ?></td>
										<td><?php echo $r['nama_produk']; ?></td>
										<td><?php echo number_format($r['harga_transaksi']); ?></td>
										<td><?php echo $r['jumlah_produk']; ?></td>
										<td>Rp.<?php echo number_format($Subtotal); ?></td>

									</tr>

								<?php  } 
								?>
								<tr>
									<td colspan="5" align="right"><b>Total Transaksi</b></td>
									<td><b>Rp.<?php echo number_format($total); ?></b></td>
								</tr>
								<tr>
									<td colspan="5" align="right"><b>Total Biaya Kirim</b></td>
									<td><b>Rp.<?php echo number_format($totalbk); ?></b></td>
								</tr>
							</table>


						</div>


					</div>	
				</div>
			</div>

		</section>
</div>


		

<div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                 <div class="box-footer">
                               <button class="btn btn-primary" id="cetak" onclick="cetak()">Cetak</button>
                           </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- #/ container -->
  </div>
        <!--**********************************
            Content body end
        ***********************************-->
<script>
	 

        function cetak(){
            var printContents = document.getElementById("printArea").innerHTML;
            var original = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = original;
        }
</script>
