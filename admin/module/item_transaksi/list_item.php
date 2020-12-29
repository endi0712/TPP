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
                                  <section class="content">
                                    <!--Info boxes -->
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="box box-default">
                                          <div class="box box-info" style="padding: 10px;">
                                            <?php 
                                            include "../lib/config.php";
                                            include "../lib/koneksi.php";
                                            $idCust = $_GET['id_customer'];
                                            $queryCustomer = mysqli_query($koneksi,  "SELECT *, K.nama_kota as kota FROM tbl_customer C INNER JOIN tbl_kota K ON C.id_kota = K.id_kota WHERE id_customer = '$idCust' ");


                                            while ($cust=mysqli_fetch_array($queryCustomer)){
                                              $idkota = $cust['id_kota'];
                                              ?>



                                              <div class="penerima">
                                                <b>Alamat Pengiriman : </b>
                                                <p><?php echo $cust['nama'] ; echo " || " ; echo $cust['alamat'];?></p>
                                                <p><?php echo $cust['notelp'] ;?></p>
                                                <p><?php echo $cust['kota'] ;?></p>
                                            </div>
                                        <?php }


                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-xs-12">
                                  <div class="box">
                                    <div class="box-header">
                                      <h3 class="box-title">Data Item Transaksi</h3>

                                  </div>
                                <table class="table table-hover">

                                    <tr>
                                       <th>ID Produk</th>
                                       <th>Gambar</th>
                                       <th>Produk</th>
                                       <th>Jumlah produk</th>
                                       <th>Total harga</th>

                                   </tr>
                                   <?php 
                                   $id = $_GET['id_transaksi'];
                                   $kueriItem = mysqli_query($koneksi, "SELECT * from tbl_item_transaksi d inner join tbl_produk p on d.id_produk = p.id_produk WHERE id_transaksi = '$id'");
                                   while ($item=mysqli_fetch_array($kueriItem)) {

                                     ?>
                                     <tr>
                                        <td>
                                          <?php echo $item['id_produk'];?>       
                                      </td>
                                      <td>
                                         <img width="150"src="upload/<?php echo $item['gambar'];?>" >
                                     </td>
                                     <td>
                                      <?php 
                                      include "../lib/koneksi.php"; 
                                      $kueriProduk = mysqli_query($koneksi, "SELECT * FROM tbl_produk");
                                      while($pro=mysqli_fetch_array($kueriProduk)){ 
                                        if ($item['id_produk'] == $pro['id_produk']) 
                                          {echo $pro['nama_produk'];}}?>       
                                  </td>
                                  <td><?php echo $item['jumlah_produk']; ?></td>
                                  <td>Rp.<?php echo number_format($item['total_harga']); ?></td>

                              </tr>
                          <?php  } ?>
                      </table>
                      </div>

        </div>
      </div>
    </selection>
  </div>
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
