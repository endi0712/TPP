<!--form-->
<!-- <section id="form"> -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Form Profil Member</h2>
						<?php 
							$idMember = $_SESSION['idMember'];
							$queryGetMember = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE id_member = $idMember");
							$res = mysqli_fetch_array($queryGetMember);
							$idMember = $res['id_member'];
							$idKota = $res['id_kota'];
						 ?>
						<form action="aksi_edit_profil.php" method="post">
							<input type="hidden" name="idMember" value="<?php echo $idMember; ?>"> 
							<input type="text" name="username" placeholder="Username" value="<?php echo $res['username']; ?>" />
							<input type="text" name="namalengkap" placeholder="Nama Lengkap" value="<?php echo $res['nama']; ?>" />
							<input type="text" name="alamat" placeholder="Alamat" value="<?php echo $res['alamat']; ?>" />
							
        <select class="form-control" name="idkota">
          <?php
          $kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
          while ($kot=mysqli_fetch_array($kueriKota)){?>
          <option value="<?php echo $kot['id_kota']; ?>"
          <?php 
          if ($idKota == $kot['id_kota']) {
            echo 'selected';
          }
           ?>>
            <?php echo $kot['nama_kota']; ?>
            </option>
          <?php } ?>
        </select>					        <hr>
							<input type="email" name="email" placeholder="Email Address" value="<?php echo $res['email']; ?>"/>
							<br>
							<button type="submit" class="btn btn-default">Edit</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
<!-- 	</section> -->
<!--/form-->