
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
                                        <th style="width: 110px">Aksi</th>   
                                      </tr>
                                      <?php 
                                        include "../lib/config.php";
                                        include "../lib/koneksi.php";
                                        $halaman = 5;
                                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                        $result = mysqli_query($koneksi,"SELECT * FROM tbl_customer");
                                        $total = mysqli_num_rows($result);
                                        $pages = ceil($total/$halaman);  
                                        $kueriCustomer = mysqli_query($koneksi, "select * from tbl_customer limit $mulai, $halaman");
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
                                        <td>
                                          <div class="btn-group">
                                            <a href="<?php echo $admin_url ;?>module/member/aksi_hapus.php?id_customer=<?php  echo $cus['id_customer'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                          </div>
                                        </td> 
                                       </tr>
                                    <?php  } ?>
                                    </table>
                                    <nav aria-label="Page navigation" style="margin-left: 35%">
                                    <ul class="pagination justify-content-right">

                                      <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
                                        <a class="page-link" href="?module=member&halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                      </li>

                                      <?php 
                                      for ($i=1; $i<=$pages ; $i++){
                                        ?>
                                        <li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?module=member&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                      <?php } ?>

                                      <li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
                                        <a class="page-link" href="?module=member&halaman=<?php echo $page + 1; ?>">Next</a>
                                      </li>

                                    </ul>
                                  </nav>

                            
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