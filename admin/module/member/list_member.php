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

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table class="table table-hover">

                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>No Telp</th>   
                                      </tr>
                                      <?php 
                                      include "../lib/config.php";
                                      include "../lib/koneksi.php";
                                      $kueriCustomer = mysqli_query($koneksi, "SELECT * from tbl_customer");
                                      while ($cus=mysqli_fetch_array($kueriCustomer)) {
                                       
                                       ?>
                                       <tr>
                                        <td><?php echo $cus['username']; ?></td>
                                        <td><?php echo $cus['password']; ?></td>
                                        <td><?php echo $cus['nama']; ?></td>
                                        <td><?php echo $cus['email']; ?></td>
                                        <td><?php echo $cus['alamat']; ?></td>
                                        <td>
                                            <?php 
                                            include "../lib/koneksi.php"; 
                                            $kueriKota = mysqli_query($koneksi, "SELECT * FROM tbl_kota");
                                            while($kot=mysqli_fetch_array($kueriKota)){ 
                                            if ($cus['id_kota'] == $kot['id_kota']) 
                                            {echo $kot['nama_kota'];}}?>       
                                        </td>
                                        <td><?php echo $cus['notelp'];?></td> 
                                       </tr>
                                    <?php  } ?>
                                    </table>
                            
                            <div class="box-footer">
                               
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
