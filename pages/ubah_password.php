<style type="text/css">
	.ubahpassword{
		width: 400px;
		margin: auto;
	}
</style>
<main>
	<section>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="ubahpassword">
					<?php 
				include "lib/koneksi.php";
				include "lib/config.php";
				$idCustomer = $_SESSION['idCustomer'];


				$queryGetProfil = mysqli_query($koneksi, "SELECT * FROM tbl_customer WHERE id_customer = '$idCustomer'");
				$res = mysqli_fetch_array($queryGetProfil);
				?>

				<form action="aksi_password_edit.php" method="post">
					<input type="hidden" name="id_customer" value="<?php echo $res['id_customer']; ?>">

					<label>Password Baru</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control"   name="newpassword">
					</div>
						<label>Ulangi</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control"   name="newpassword1">
					</div>
						<label>Password Lama</label>
					<div class="input-group mb-3">
						<input type="password" class="form-control"   name="oldpassword"> 
					</div>
					<button class="btn btn-success" id="btnSimpan" type="submit"> <i class="fa fa-save" aria-hidden="true" ></i> Simpan</button>
					
				</form>
				</div>
				
			</div>
		</div>

	</section>
</main>