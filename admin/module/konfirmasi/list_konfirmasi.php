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
                                        <th>Customer</th>
                                        <th>Jumlah</th>
                                        <th>Foto Struk</th>
                                        <th>Tgl Transfer</th>
                                        <th>Rekening</th>
                                      </tr>
                                      <?php 
                                      include "../lib/config.php";
                                      include "../lib/koneksi.php";
                                      $kueriKonfirmasi = mysqli_query($koneksi, "SELECT * from tbl_konfirmasi");
                                      while ($kon=mysqli_fetch_array($kueriKonfirmasi)) {
                                       
                                       ?>
                                       <tr>
                                        <td>
                                          <?php 
                                          include "../lib/koneksi.php";
                                          $kueriCustomer=mysqli_query($koneksi,"SELECT * FROM tbl_customer");
                                          while($cus=mysqli_fetch_array($kueriCustomer)){
                                            if($kon['id_customer']==$cus['id_customer'])
                                              {echo $cus['nama'];}}?>
                                        </td>
                                        <td><?php echo $kon['jumlah']; ?></td>
                                        <td>
                                          <img width="150" height="100" src="upload/<?php echo $kon['foto'];?>" >
                                        </td>
                                        <td><?php echo $kon['tgl_transfer']; ?></td>
                                        <td><?php echo $kon['rekening']; ?></td>
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
