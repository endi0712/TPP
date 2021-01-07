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
                                        <th>Level</th>
                                      </tr>
                                      <?php 
                                      include "../lib/config.php";
                                      include "../lib/koneksi.php";
                                      $kueriAdmin = mysqli_query($koneksi, "SELECT * from tbl_admin");
                                      while ($adm=mysqli_fetch_array($kueriAdmin)) {
                                       
                                       ?>
                                       <tr>
                                        <td><?php echo $adm['username']; ?></td>
                                        <td><?php echo $adm['password']; ?></td>
                                        <td><?php echo $adm['nama']; ?></td>
                                        <td><?php echo $adm['email']; ?></td>
                                        <td><?php echo $adm['level']; ?></td>
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
