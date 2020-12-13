
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
                                    $kueriKota = mysqli_query($koneksi, "select * from tbl_kota");
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