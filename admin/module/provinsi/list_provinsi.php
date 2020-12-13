
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
                                        <th>Kode provinsi</th>
                                        <th>Nama provinsi</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $halaman = 8;
                                    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                    $result = mysqli_query($koneksi,"SELECT * FROM tbl_provinsi");
                                    $total = mysqli_num_rows($result);
                                    $pages = ceil($total/$halaman);  
                                    $kueriProvinsi = mysqli_query($koneksi, "select * from tbl_provinsi limit $mulai, $halaman");
                                    while ($prov=mysqli_fetch_array($kueriProvinsi)) {
                                     
                                     ?>
                                     <tr>
                                        <td><?php echo $prov['kode_provinsi']; ?></td>
                                        <td><?php echo $prov['nama_provinsi']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $admin_url ;?>adminweb.php?module=edit_provinsi&id_provinsi=<?php echo $prov['id_provinsi'];?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?php echo $admin_url ;?>module/provinsi/aksi_hapus.php?id_provinsi=<?php  echo $prov['id_provinsi'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                        </td>
                                     </tr>
                                  <?php  } ?>
                            </table>
                            <nav aria-label="Page navigation" style="margin-left: 35%">
                              <ul class="pagination justify-content-right">

                                <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
                                  <a class="page-link" href="?module=provinsi&halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <?php 
                                for ($i=1; $i<=$pages ; $i++){
                                  ?>
                                  <li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?module=provinsi&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>

                                <li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
                                  <a class="page-link" href="?module=provinsi&halaman=<?php echo $page + 1; ?>">Next</a>
                                </li>

                              </ul>
                            </nav>

                            <div class="box-footer">
                              <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_provinsi"><button class="btn btn-primary ">Tambah Provinsi</button></a>
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