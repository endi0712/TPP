<!--form-->
<!-- <section id="form"> -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Sign Up</h2>
						<form action="aksi_daftar.php" method="post">
							<input type="text" name="username" placeholder="Username" />
							<input type="password" name="password" placeholder="Password" />
							<input type="text" name="nama" placeholder="Nama Lengkap"/>
							<input type="text" name="alamat" placeholder="Alamat" />

					        <select class="form-control" name="idkota">
					          <?php
					          include "../lib/koneksi.php";
					          $kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
					          while ($kot=mysqli_fetch_array($kueriKota)){  
					          ?>
					          <option value="<?php echo $kot['id_kota']; ?>">
					            <?php echo $kot['nama_kota']; ?>
					            </option>
					          <?php } ?>
					        </select>							

					        <hr>
							<input type="email" name="email" placeholder="Email Address"/>
							 
							<br>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
<!-- 	</section> -->
<!--/form-->