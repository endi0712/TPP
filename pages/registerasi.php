	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
 
				<div class="col-sm-4 col-sm-offset-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="aksi_daftar.php" method="post">
							<input type="text" placeholder="Username"/>
							<input type="password" placeholder="Password"/>
							<input type="text" placeholder="Nama Lengkap"/>
							<input type="text" placeholder="Alamat"/>
							<select>
								<?php
								$getKota = mysqli_query($koneksi,"select * from tbl_kota");
								while($itemKota=mysqli_fetch_array($getKota)){; 
								?>
								<option value="<?php echo $itemKota['id_kota'] ?>"><?php echo $itemKota['nama_kota']?></option>
								<?php } ?>
							</select>
							<hr>
							<input type="text" placeholder="Email"/>
							<input type="text" placeholder="No Hp"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->