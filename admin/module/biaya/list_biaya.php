
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
                                        <th>Nama kota</th>
                                        <th>Nama provinsi</th>
                                        <th>Nama kurir</th>
                                        <th>Biaya</th>
                                        <th style="width: 110px">Aksi</th>
                                    </tr>
                                    <?php 
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";
                                    $kueriBiaya = mysqli_query($koneksi, "select * from tbl_biaya_kirim");
                                    while ($bia=mysqli_fetch_array($kueriBiaya)) {
                                     
                                     ?>
                                     <tr>
                                        <td>
                                        <?php 
                                        include "../lib/koneksi.php";
                                        $kueriKota=mysqli_query($koneksi,"SELECT * FROM tbl_kota");
                                        while($kot=mysqli_fetch_array($kueriKota)){
                                          if($bia['id_kota']==$kot['id_kota'])
                                            {echo $kot['nama_kota'];}}?>
                                        </td>
                                        <td>
                                        <?php 
                                        include "../lib/koneksi.php";
                                        $kueriProvinsi=mysqli_query($koneksi,"SELECT * FROM tbl_provinsi");
                                        while($prov=mysqli_fetch_array($kueriProvinsi)){
                                          if($bia['id_provinsi']==$prov['id_provinsi'])
                                            {echo $prov['nama_provinsi'];}}?>
                                        </td>  
                                        <td>
                                        <?php 
                                        include "../lib/koneksi.php";
                                        $kueriKurir=mysqli_query($koneksi,"SELECT * FROM tbl_kurir");
                                        while($kur=mysqli_fetch_array($kueriKurir)){
                                          if($bia['id_kurir']==$kur['id_kurir'])
                                            {echo $kur['nama_kurir'];}}?>
                                        </td>
                                        <td>Rp.<?php echo $bia['biaya'];?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $admin_url ;?>adminweb.php?module=edit_biaya&id_biaya_kirim=<?php echo $bia['id_biaya_kirim'];?>" class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                                                <a href="<?php echo $admin_url ;?>module/biaya/aksi_hapus.php?id_biaya_kirim=<?php  echo $bia['id_biaya_kirim'];?>" onClick ="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                            </div>
                                        </td>
                                     </tr>
                                <?php  } ?>
                            </table>
                            <div class="box-footer">
                              <a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_biaya"><button class="btn btn-primary ">Tambah Biaya</button></a>
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