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
		<h1><center>DAFTAR</center></h1>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				 <div class="daftar">
				<form action="aksi_daftar.php" method="post">
					<div class="form-group">	
						<label class="col-form-label">Nama Lengkap</label>				
						<input type="text" class="form-control"  placeholder="Masukkan Nama Lengkap" name="nama">
					</div>

					<div class="form-group">
						<label class="col-form-label">Email</label>	
						<input type="text" class="form-control"  placeholder="example@example.com" name="email">
					</div>

					<div class="form-group">
						<label class="col-form-label">Telepon</label>	
						<input type="text" class="form-control"  placeholder="Masukan Nomor Telepon" name="notelp">
					</div>
				
						<div class="form-group">
							<label class="col-form-label">Alamat</label>
								<input type="text" class="form-control"  placeholder="Masukkan Alamat" name="alamat" required>
							</div>

							<div class="form-group">
							<label class="col-form-label">Kota</label>
							<select class="custom-select" name="idKota">
									<?php 
									include "lib/koneksi.php"; 
									$kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
									while($kot=mysqli_fetch_array($kueriKota)){
										?>
										<option value="<?php echo $kot['id_kota']; ?>"><?php echo $kot['nama_kota']; ?></option>
									<?php  }?>
								</select>
							</div>
							<hr>
							<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" class="form-control"  placeholder="Masukkan Username" name="username" >
							</div>
							<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control"  placeholder="Masukkan Password" name="password" >
							</div>

							<div class="kliksignup">
								<button type="submit" class="btn-more">SIGN UP</button>
							</div>
				</form>
			</div>
			</div>
		</div>
	</section>
</main>