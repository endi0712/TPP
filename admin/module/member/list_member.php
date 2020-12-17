
        
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
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $kueriMember = mysqli_query($koneksi, "select * from tbl_member");
                                    while ($mem=mysqli_fetch_array($kueriMember)) {
                                     
                                     ?>
                                     <tr>
                                        <td><?php echo $mem['username']; ?></td>
                                        <td><?php echo $mem['password']; ?></td>
                                        <td><?php echo $mem['nama']; ?></td>
                                        <td><?php echo $mem['alamat']; ?></td>
                                        <td><?php echo $mem['email']; ?></td>  
                                        <td>
                                            <div class="btn-group">
                                                 
                                                <a href="<?php echo $admin_url ;?>module/member/aksi_hapus.php?id_member=<?php  echo $mem['id_member'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
