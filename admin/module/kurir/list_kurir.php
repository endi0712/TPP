
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
                                        <th>Kurir</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $kueriKurir = mysqli_query($koneksi, "select * from tbl_kurir");
                                    while ($kur=mysqli_fetch_array($kueriKurir)) {
                                     
                                     ?>
                                     <tr>
                                        <td><?php echo $kur['nama_kurir']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $admin_url ;?>adminweb.php?module=edit_kurir&id_kurir=<?php echo $kur['id_kurir'];?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?php echo $admin_url ;?>module/kurir/aksi_hapus.php?id_kurir=<?php  echo $kur['id_kurir'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                        </td>
                                     </tr>
                                <?php  } ?>
                            </table>
                            <div class="box-footer">
                              <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_kurir"><button class="btn btn-primary ">Tambah Kurir</button></a>
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