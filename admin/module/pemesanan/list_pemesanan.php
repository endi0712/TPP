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
                        <th>Status pemesanan</th>
                        <th>Total belanja</th>
                        <th>Tanggal pemesanan</th>
                      </tr>
                      <?php 
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $kueriPemesanan = mysqli_query($koneksi, "SELECT * from tbl_pemesanan");
                      while ($pem=mysqli_fetch_array($kueriPemesanan)) {

                       ?>
                       <tr>
                        <td>
                          <?php 
                          include "../lib/koneksi.php"; 
                          $kueriCustomer = mysqli_query($koneksi, "SELECT * FROM tbl_customer");
                          while($cus=mysqli_fetch_array($kueriCustomer)){ 
                            if ($pem['id_customer'] == $cus['id_customer']) 
                              {echo $cus['nama'];}}?>       
                          </td>
                          <td><?php echo $pem['status_pemesanan'];?></td>
                            <td><?php echo $pem['total_belanja']; ?></td>
                            <td><?php echo $pem['tgl_pemesanan'];?></td>  
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
