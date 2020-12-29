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
                        <th>Produk</th>
                        <th>Jumlah</th>
                      </tr>
                      <?php 
                      include "../lib/config.php";
                      include "../lib/koneksi.php";
                      $kueriKeranjang = mysqli_query($koneksi, "SELECT * from tbl_keranjang");
                      while ($ker=mysqli_fetch_array($kueriKeranjang)) {

                       ?>
                       <tr>
                        <td>
                          <?php 
                          include "../lib/koneksi.php"; 
                          $kueriCustomer = mysqli_query($koneksi, "SELECT * FROM tbl_customer");
                          while($cus=mysqli_fetch_array($kueriCustomer)){ 
                            if ($ker['id_customer'] == $cus['id_customer']) 
                              {echo $cus['nama'];}}?>       
                          </td>
                          <td>
                            <?php 
                            include "../lib/koneksi.php"; 
                            $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_produk");
                            while($pro=mysqli_fetch_array($kueriProduk)){ 
                              if ($ker['id_produk'] == $pro['id_produk']) 
                                {echo $pro['nama_produk'];}}?>       
                            </td>
                            <td><?php echo $ker['jumlah']; ?></td>

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
