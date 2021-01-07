<style type="text/css">
	.daftar{
  margin: 0 auto;
  width:400px;
}

.daftar input{

  width: 400px;
}
</style>

<main>
	<section>
		<h1><center>KONFIRMASI PEMBAYARAN</center></h1>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				 <div class="daftar">
				<form action="aksi_konfir.php" method="post">
					<div class="form-group">	
						<label class="col-form-label">Customer</label>				
						<select class="custom-select" name="id_customer">
							<?php 
							include "lib/koneksi.php"; 
							$kueriCustomer = mysqli_query($koneksi, "SELECT * FROM tbl_customer");
							while($cus=mysqli_fetch_array($kueriCustomer)){
								?>
								<option value="<?php echo $cus['id_customer']; ?>"><?php echo $cus['nama']; ?></option>
							<?php  }?>
						</select>
					</div>

					<div class="form-group">
						<label class="col-form-label">Jumlah</label>	
						<input type="text" class="form-control"  placeholder="jumlah transfer" name="jumlah">
					</div>

					<div class="form-group">
						<label class="col-form-label">Tgl Transfer</label>	
						<input type="date" class="form-control"  placeholder="Masukan Nomor Telepon" name="tgl_transfer">
					</div>
				
					<div class="form-group">
						<label class="col-form-label">Rekening</label>
						<input type="text" class="form-control"  placeholder="Masukkan Rekening" name="rekening">
					</div>
					<div class="form-group">
						<label class="col-form-label">Foto</label>	
						<input type="file" id="foto" name="foto">
					</div>
 
					<div class="kliksignup">
						<button type="submit" class="btn-more">KONFIRMASI</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</section>
</main>