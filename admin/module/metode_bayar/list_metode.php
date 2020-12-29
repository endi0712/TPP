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
                                        <th>Nama metode</th>
                                        <th>Rekening</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $kueriMetode = mysqli_query($koneksi, "select * from tbl_metode_bayar");
                                    while ($met=mysqli_fetch_array($kueriMetode)) {
                                     
                                     ?>
                                     <tr>
                                        <td><?php echo $met['nama_metode']; ?></td>
                                        <td><?php echo $met['rekening']; ?></td>
                                         
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
