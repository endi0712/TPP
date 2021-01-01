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
                                        <th>Kota</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $halaman = 5;
                                    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                    $result = mysqli_query($koneksi,"SELECT * FROM tbl_kota");
                                    $total = mysqli_num_rows($result);
                                    $pages = ceil($total/$halaman);  
                                    $kueriKota = mysqli_query($koneksi, "select * from tbl_kota limit $mulai, $halaman");
                                    while ($kot=mysqli_fetch_array($kueriKota)) {
                                     
                                     ?>
                                     <tr>
                                        <td><?php echo $kot['nama_kota']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $admin_url ;?>adminweb.php?module=edit_kota&id_kota=<?php echo $kot['id_kota'];?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?php echo $admin_url ;?>module/kota/aksi_hapus.php?id_kota=<?php  echo $kot['id_kota'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                        </td>
                                     </tr>
                                <?php  } ?>
                            </table>
                            <nav aria-label="Page navigation" style="margin-left: 35%">
                              <ul class="pagination justify-content-right">

                                <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
                                  <a class="page-link" href="?module=kota&halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <?php 
                                for ($i=1; $i<=$pages ; $i++){
                                  ?>
                                  <li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?module=kota&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>

                                <li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
                                  <a class="page-link" href="?module=kota&halaman=<?php echo $page + 1; ?>">Next</a>
                                </li>

                              </ul>
                            </nav>
                            <div class="box-footer">
                              <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_kota"><button class="btn btn-primary ">Tambah Kota</button></a>
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
