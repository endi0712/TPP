
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
                          <th>Nama Kategori</th>
                          <th>Nama produk</th>
                          <th>Deskripsi</th>
                          <th>Gambar produk</th>
                          <th>Harga</th>
                          <th style="width: 110px">Aksi</th>
                        </tr>
                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $kueriProduk = mysqli_query($koneksi, "select * from tbl_produk");
                        while ($pro=mysqli_fetch_array($kueriProduk)) {

                         ?>
                         <tr>
                          <td><?php 
                          include "../lib/koneksi.php"; 
                          $kuerikategori=mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
                          while($kat=mysqli_fetch_array($kuerikategori)){
                            if($pro['id_kategori']==$kat['id_kategori'])
                              {echo $kat['nama_kategori'];}}?>
                          </td>
                          <td><?php echo $pro['nama_produk']; ?></td>
                          <td><?php echo $pro['deskripsi'];?></td>
                          <td>
                            <img width="150" height="100" src="upload/<?php echo $pro['gambar'];?>" >
                          </td>
                          <td>Rp.<?php echo $pro['harga'];?></td>
                          <td>
                            <div class="btn-group">
                              <a href="<?php echo $admin_url ;?>adminweb.php?module=edit_produk&id_produk=<?php echo $pro['id_produk'];?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                              <a href="<?php echo $admin_url ;?>module/produk/aksi_hapus.php?id_produk=<?php  echo $pro['id_produk'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                            </div>
                          </td>
                        </tr>
                      <?php  } ?>
                    </table>
                    <div class="box-footer">
                      <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_produk"><button class="btn btn-primary ">Tambah Produk</button></a>
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