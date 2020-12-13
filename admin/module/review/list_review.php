
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
                                        <th>Pengirim</th>
                                        <th>Pesan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $kueriReview = mysqli_query($koneksi, "select * from tbl_review");
                                    while ($rev=mysqli_fetch_array($kueriReview)) {
                                     
                                     ?>
                                     <tr>
                                        <td>
                                        <?php
                                        $kueriMember = mysqli_query($koneksi, "SELECT * FROM tbl_user"); 
                                        while ($mem = mysqli_fetch_array($kueriMember)) {
                                        if($rev['id_user'] == $mem['id_user']){
                                          echo $mem['nama'];}
                                        }?>
                                        </td>
                                        <td><?php echo $rev['isi']; ?></td>
                                        <td><?php echo $rev['tgl_review']; ?></td> 
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