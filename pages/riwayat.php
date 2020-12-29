<style type="text/css">
  section{
    padding: 20px;
  }
</style>
<main>
  <section>
    <div class="row">
      <div class="col-4" align="left">
        <div class="list-group" id="list-tab" role="tablist">

          <a class="list-group-item list-group-item-action active" id="list-belum-bayar" data-toggle="list" href="#belum-bayar" role="tab" aria-controls="home">Belum Dibayar <span class="badge badge-warning badge-pill"><?php 
          include "lib/koneksi.php";
          $idcust = $_SESSION['idCustomer'];
          $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS'count' FROM tbl_transaksi WHERE id_customer = $idcust AND status_transaksi = 'Belum Bayar'");
          $jumlah = mysqli_fetch_assoc($query); 
          echo $jumlah['count'];?></span></a>
          
          <a class="list-group-item list-group-item-action" id="list-dikemas" data-toggle="list" href="#dikemas" role="tab" aria-controls="profile">Dikemas <span class="badge badge-warning badge-pill"><?php 

          $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS'count' FROM tbl_transaksi WHERE id_customer = $idcust AND status_transaksi = 'Dikemas'");
          $jumlah = mysqli_fetch_assoc($query); 
          echo $jumlah['count'];?></span></a>
          <a class="list-group-item list-group-item-action" id="list-dikirim" data-toggle="list" href="#dikirim" role="tab" aria-controls="messages">Dikirim  <span class="badge badge-warning badge-pill"><?php 
          
          $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS'count' FROM tbl_transaksi WHERE id_customer = $idcust AND status_transaksi = 'Dikirim'");
          $jumlah = mysqli_fetch_assoc($query); 
          echo $jumlah['count'];?></span></a>
          <a class="list-group-item list-group-item-action" id="list-selesai" data-toggle="list" href="#selesai" role="tab" aria-controls="settings">Selesai  <span class="badge badge-warning badge-pill"><?php 

          $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS'count' FROM tbl_transaksi WHERE id_customer = $idcust AND status_transaksi = 'Selesai'");
          $jumlah = mysqli_fetch_assoc($query); 
          echo $jumlah['count'];?></span></a>
          <a class="list-group-item list-group-item-action" id="list-dibatalkan" data-toggle="list" href="#dibatalkan" role="tab" aria-controls="settings">Dibatalkan  <span class="badge badge-warning badge-pill"><?php 

          $query = mysqli_query($koneksi, "SELECT COUNT(id_transaksi) AS'count' FROM tbl_transaksi WHERE id_customer = $idcust AND status_transaksi = 'Dibatalkan'");
          $jumlah = mysqli_fetch_assoc($query); 
          echo $jumlah['count'];?></span></a>

        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="belum-bayar" role="tabpanel" aria-labelledby="list-belum-bayar">
            <div class="table-responsive">
              <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi t INNER JOIN tbl_biaya_kirim b ON t.id_biaya_kirim = b.id_biaya_kirim  INNER JOIN tbl_metode_bayar mb ON t.id_metode_bayar = mb.id_metode_bayar WHERE status_transaksi = 'Belum Bayar' AND id_customer = $idcust");
              while ($result = mysqli_fetch_array($query)) {
                $id=$result['id_transaksi'];
                ?>
                <table class="table table-borderless table-sm" style="background-color: #fcfcfc;">
                  <tr>
                    <td align="left" colspan="2"><b>Pembayaran : </b> <?php echo $result['nama_metode'] ?> <br> <b>No Rek.</b><?php echo $result['rekening'] ?> </td>

                  </tr>
                  <?php 
                  $total=0;
                  $q = mysqli_query($koneksi, "SELECT * FROM tbl_item_transaksi it INNER JOIN tbl_produk p ON it.id_produk = p.id_produk WHERE id_transaksi = '$id'");
                  while($r=mysqli_fetch_array($q)){ ?>
                    <tbody>

                      <tr >
                        <td rowspan="3"><img src="admin/upload/<?php echo $r['gambar']; ?>" width="100"></td>
                      </tr>
                      <tr >
                        <td align="left" ><?php 
                          
                        echo "<br>Jumlah : ".$r['jumlah_produk'];
                        echo "<br>@Rp.".number_format($r['harga']);
                        ?></td>
                      </tr>
                      <tr>
                        <td align="right">
                          Rp.<?php echo number_format($r['total_harga']); $total = $total + $r['total_harga']; ?> 


                        </tr>
                      <?php } ?>

                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Produk  </b> </td>
                        <td align="right"> Rp.<?php echo number_format($total) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Pengiriman </b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Total Pembayaran</b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']+$total) ?> </td>
                      </tr>
                      <tr  class="table-info" align="left">
                        <td>
                         <b> Status Transaksi </b>
                       </td>
                       <td align="right">

                        <?php echo $result['status_transaksi']; ?>

                      </td>
                    </tr>
                  </tbody>

                </table>
              <?php }?>

            </div>

          </div>

          <div class="tab-pane fade" id="dikemas" role="tabpanel" aria-labelledby="list-dikemas">
            <div class="table-responsive">
              <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi t INNER JOIN tbl_biaya_kirim b ON t.id_biaya_kirim = b.id_biaya_kirim  INNER JOIN tbl_metode_bayar mb ON t.id_metode_bayar = mb.id_metode_bayar WHERE status_transaksi = 'Dikemas' AND id_customer = $idcust");
              while ($result = mysqli_fetch_array($query)) {
                $id=$result['id_transaksi'];
                ?>
                <table class="table table-borderless table-sm" style="background-color: #fcfcfc;">
                  <tr>
                    <td align="left" colspan="2"><b>No Resi : </b> <?php echo $result['resi'] ?></td>
                    
                  </tr>
                  <?php 
                  $total=0;
                  $q = mysqli_query($koneksi, "SELECT * FROM tbl_item_transaksi it INNER JOIN tbl_produk p ON it.id_produk = p.id_produk WHERE id_transaksi = '$id'");
                  while($r=mysqli_fetch_array($q)){ ?>
                    <tbody>
                      
                      <tr>
                        <td rowspan="3"><img src="admin/upload/<?php echo $r['gambar']; ?>" width="100"></td>
                      </tr>
                      <tr>
                        <td align="left"><?php 
                        echo $r[ 'nama_produk']; 
                        echo "<br>Jumlah : ".$r['jumlah_produk'];
                        echo "<br>@Rp.".number_format($r['harga']);
                        ?></td>
                      </tr>
                      <tr>
                        <td align="right">
                          Rp.<?php echo number_format($r['total_harga']); $total = $total + $r['total_harga']; ?> 
                          
                          
                        </tr>
                      <?php } ?>
                      
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Produk  </b> </td>
                        <td align="right"> Rp.<?php echo number_format($total) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Pengiriman </b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Total Pembayaran</b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']+$total) ?> </td>
                      </tr>
                      <tr class="table-info" align="left">
                        <td>
                         <b> Status Transaksi </b>
                       </td>
                       <td align="right">
                        
                        <?php echo $result['status_transaksi']; ?>
                        
                      </td>
                    </tr>
                  </tbody>
                  
                </table>
              <?php }?>

            </div>
          </div>
          <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="list-dikirim">
            <div class="table-responsive">
              <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi t INNER JOIN tbl_biaya_kirim b ON t.id_biaya_kirim = b.id_biaya_kirim  INNER JOIN tbl_metode_bayar mb ON t.id_metode_bayar = mb.id_metode_bayar WHERE status_transaksi = 'Dikirim' AND id_customer = $idcust");
              while ($result = mysqli_fetch_array($query)) {
                $id=$result['id_transaksi'];
                ?>
                <table class="table table-borderless table-sm" style="background-color: #fcfcfc;">
                  <tr>
                    <td align="left" colspan="2"><b>No Resi : </b> <?php echo $result['resi'] ?></td>
                    
                  </tr>
                  <?php 
                  $total=0;
                  $q = mysqli_query($koneksi, "SELECT * FROM tbl_item_transaksi it INNER JOIN tbl_produk p ON it.id_produk = p.id_produk WHERE id_transaksi = '$id'");
                  while($r=mysqli_fetch_array($q)){ ?>
                    <tbody>
                      
                      <tr>
                        <td rowspan="3"><img src="admin/upload/<?php echo $r['gambar']; ?>" width="100"></td>
                      </tr>
                      <tr>
                        <td align="left"><?php 
                        echo $r[ 'nama_produk']; 
                        echo "<br>Jumlah : ".$r['jumlah_produk'];
                        echo "<br>@Rp.".number_format($r['harga']);
                        ?></td>
                      </tr>
                      <tr>
                        <td align="right">
                          Rp.<?php echo number_format($r['total_harga']); $total = $total + $r['total_harga']; ?> 
                          
                          
                        </tr>
                      <?php } ?>
                      
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Produk  </b> </td>
                        <td align="right"> Rp.<?php echo number_format($total) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Pengiriman </b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Total Pembayaran</b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']+$total) ?> </td>
                      </tr>
                      <tr class="table-info" align="left">
                        <td>
                         <b> Status Transaksi </b>
                       </td>
                       <td align="right">
                        
                        <?php echo $result['status_transaksi']; ?>
                        
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" class="table-info" style="padding-bottom: 20px;" >
                        <a onClick ="return confirm('Apakah pesanan telah Anda terima?')" href="aksi_selesai.php?id_transaksi=<?php echo $result['id_transaksi'] ?>" class="btn-all">Pesanan Selesai</a>
                      </td>
                    </tr>
                  </tbody>
                  
                </table>
              <?php }?>

            </div>
          </div>

          <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="list-selesai">
            <div class="table-responsive">
              <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi t INNER JOIN tbl_biaya_kirim b ON t.id_biaya_kirim = b.id_biaya_kirim  INNER JOIN tbl_metode_bayar mb ON t.id_metode_bayar = mb.id_metode_bayar WHERE status_transaksi = 'Selesai' AND id_customer = $idcust order by id_transaksi desc");
              while ($result = mysqli_fetch_array($query)) {
                $id=$result['id_transaksi'];
                ?>
                <table class="table table-borderless table-sm" style="background-color: #fcfcfc;">
                  <tr>
                    <td align="left" colspan="2"><b>No Resi : </b> <?php echo $result['resi'] ?></td>
                    
                  </tr>
                  <?php 
                  $total=0;
                  $q = mysqli_query($koneksi, "SELECT * FROM tbl_item_transaksi it INNER JOIN tbl_produk p ON it.id_produk = p.id_produk WHERE id_transaksi = '$id'");
                  while($r=mysqli_fetch_array($q)){ ?>
                    <tbody>
                      
                      <tr>
                        <td rowspan="3"><img src="admin/upload/<?php echo $r['gambar']; ?>" width="100"></td>
                      </tr>
                      <tr>
                        <td align="left"><?php 
                        echo $r[ 'nama_produk']; 
                        echo "<br>Jumlah : ".$r['jumlah_produk'];
                        echo "<br>@Rp.".number_format($r['harga']);
                        ?></td>
                      </tr>
                      <tr>
                        <td align="right">
                          Rp.<?php echo number_format($r['total_harga']); $total = $total + $r['total_harga']; ?> 
                          
                          
                        </tr>
                      <?php } ?>
                      
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Produk  </b> </td>
                        <td align="right"> Rp.<?php echo number_format($total) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Pengiriman </b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Total Pembayaran</b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']+$total) ?> </td>
                      </tr>
                      <tr class="table-info" align="left">
                        <td>
                         <b> Status Transaksi </b>
                       </td>
                       <td align="right">
                        
                        <?php echo $result['status_transaksi']; ?><br>
                        
                        
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" class="table-info" style="padding-bottom: 20px;" >
                        <a href="ulasan.php?id_transaksi=<?php echo $result['id_transaksi'] ?>" class="btn-all">Tulis Ulasan</a>
                      </td>
                    </tr>
                    
                  </tbody>
                  
                </table>
              <?php }?>

            </div>
          </div>

          <div class="tab-pane fade" id="dibatalkan" role="tabpanel" aria-labelledby="list-dibatalkan">
            <div class="table-responsive">
              <?php 
              $query = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi t INNER JOIN tbl_biaya_kirim b ON t.id_biaya_kirim = b.id_biaya_kirim  INNER JOIN tbl_metode_bayar mb ON t.id_metode_bayar = mb.id_metode_bayar WHERE status_transaksi = 'Dibatalkan' AND id_customer = $idcust");
              while ($result = mysqli_fetch_array($query)) {
                $id=$result['id_transaksi'];
                ?>
                <table class="table table-borderless table-sm" style="background-color: #fcfcfc;">
                  <tr>
                    <td align="left" colspan="2"><b>No Resi : </b> <?php echo $result['resi'] ?></td>
                    
                  </tr>
                  <?php 
                  $total=0;
                  $q = mysqli_query($koneksi, "SELECT * FROM tbl_item_transaksi it INNER JOIN tbl_produk p ON it.id_produk = p.id_produk INNER JOIN tbl_merek m ON p.id_merek = m.id_merek WHERE id_transaksi = '$id'");
                  while($r=mysqli_fetch_array($q)){ ?>
                    <tbody>
                      
                      <tr>
                        <td rowspan="3"><img src="admin/upload/<?php echo $r['gambar']; ?>" width="100"></td>
                      </tr>
                      <tr>
                        <td align="left"><?php 
                        echo $r[ 'nama_produk']; 
                        echo "<br>Jumlah : ".$r['jumlah_produk'];
                        echo "<br>@Rp.".number_format($r['harga']);
                        ?></td>
                      </tr>
                      <tr>
                        <td align="right">
                          Rp.<?php echo number_format($r['total_harga']); $total = $total + $r['total_harga']; ?> 
                          
                          
                        </tr>
                      <?php } ?>
                      
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Produk  </b> </td>
                        <td align="right"> Rp.<?php echo number_format($total) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Subtotal Pengiriman </b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']) ?> </td>
                      </tr>
                      <tr style="background-color: #f2f2f2">
                        <td align="left"><b> Total Pembayaran</b> </td>
                        <td align="right">Rp.<?php echo number_format($result['biaya']+$total) ?> </td>
                      </tr>
                      <tr class="table-info" align="left">
                        <td>
                         <b> Status Transaksi </b>
                       </td>
                       <td align="right">
                        
                        <?php echo $result['status_transaksi']; ?>
                        
                      </td>
                    </tr>
                  </tbody>
                  
                </table>
              <?php }?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
