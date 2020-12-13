
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
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Produk</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $kueriPemilik = mysqli_query($koneksi, "select * from tbl_pemilik_ukm");
                                    while ($pem=mysqli_fetch_array($kueriPemilik)) {
                                     
                                     ?>
                                     <tr>
                                        <td><?php echo $pem['username']; ?></td>
                                        <td><?php echo $pem['password']; ?></td>
                                        <td><?php echo $pem['nama']; ?></td>
                                        <td><?php echo $pem['alamat']; ?></td>
                                        <td><?php echo $pem['email']; ?></td>
                                        <td><?php echo $pem['produk']; ?></td>  
                                        <td>
                                            <div class="btn-group">
                                                 
                                                <a href="<?php echo $admin_url ;?>module/pemilik/aksi_hapus.php?id_pemilik_ukm=<?php  echo $pem['id_pemilik_ukm'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                        </td>
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