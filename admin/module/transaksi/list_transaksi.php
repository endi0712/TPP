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
                          <th>Tanggal transaksi</th>
                          <th>Customer</th>
                          <th>Status transaksi</th>
                          <th>Status bayar</th>
                          <th>Jumlah bayar</th>
                          <th>Kurir</th>
                          <th>Resi</th>
                          <th></th>
                          <th style="width: 110px">Aksi</th> 
                        </tr>
                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $halaman = 5;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        $result = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halaman);  

                        if (isset($_POST['submit'])) {
                          $tgl_a = date("Y-m-d",strtotime($_POST['tgl-awal']));
                          $tgl_b = date("Y-m-d", strtotime($_POST['tgl-akhir']));

                          $_SESSION['tgl-a'] = $tgl_a;
                          $_SESSION['tgl-b'] = $tgl_b;

                          $kueriTransaksi = mysqli_query($koneksi, "SELECT * from tbl_transaksi t inner join tbl_customer c on t.id_customer = c.id_customer 
                            inner join tbl_biaya_kirim bk on t.id_biaya_kirim = bk.id_biaya_kirim inner join tbl_kurir kr on bk.id_kurir = kr.id_kurir WHERE t.tgl_transaksi BETWEEN '$tgl_a' AND '$tgl_b' order by id_transaksi desc limit $mulai, $halaman");
                        }else{

                          $kueriTransaksi = mysqli_query($koneksi, "SELECT * from tbl_transaksi t inner join tbl_customer c on t.id_customer = c.id_customer 
                            inner join tbl_biaya_kirim bk on t.id_biaya_kirim = bk.id_biaya_kirim inner join tbl_kurir kr on bk.id_kurir = kr.id_kurir  order by id_transaksi desc limit $mulai, $halaman");
                        }
                        while ($transa=mysqli_fetch_array($kueriTransaksi)) {

                         ?>
                         <tr>

                          <td><?php echo $transa['tgl_transaksi']; ?></td>
                          <td><?php echo $transa['username']; ?></td>
                          <td><?php echo $transa['status_transaksi'];?></td>
                          <td>
                            <?php
                            $status = $transa['status_bayar'];


                            if($status == "Belum"){
                              ?>
                              <span class="badge bg-red"><?php echo $status; ?></span>

                              <?php 
                            }else{
                              ?>
                              <span class="badge bg-green"><?php echo $status; ?></span>
                              <?php 
                            }?>     
                          </td>
                          <td>Rp.<?php echo number_format($transa['jumlah_bayar']); ?></td>
                          <td>
                            <?php echo $transa['nama_kurir']; ?>
                          </td>
                          <td>
                            <?php echo $transa['resi'];?>     
                          </td>
                          <td><div class="btn-group">
                            <a href="adminweb.php?module=item_transaksi&id_transaksi=<?php echo $transa['id_transaksi'];  ?>&id_customer=<?php echo $transa['id_customer'] ?>" class="btn btn-info">Detail</button></a>
                          </div></td>
                          <td><div class="btn-group">
                            <a href="adminweb.php?module=cetak_transaksi" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button></a>
                          </div></td>
                          <td>
                           <div class="btn-group">
                            <a href="adminweb.php?module=edit_transaksi&id_transaksi=<?php echo $transa['id_transaksi'];  ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                          </div>
                        </td>

                      </tr>
                    <?php  } ?>
                  </table>
                   <nav aria-label="Page navigation" style="margin-left: 35%">
                              <ul class="pagination justify-content-right">

                                <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
                                  <a class="page-link" href="?module=transaksi&halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>

                                <?php 
                                for ($i=1; $i<=$pages ; $i++){
                                  ?>
                                  <li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?module=transaksi&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>

                                <li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
                                  <a class="page-link" href="?module=transaksi&halaman=<?php echo $page + 1; ?>">Next</a>
                                </li>

                              </ul>
                            </nav>

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
