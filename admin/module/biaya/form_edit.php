        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <?php
                                    include "../lib/config.php";
                                    include "../lib/koneksi.php";

                                    $idBiaya= $_GET['id_biaya_kirim'];
                                    $queryEdit = mysqli_query($koneksi,"SELECT * FROM tbl_biaya_kirim WHERE id_biaya_kirim='$idBiaya'");

                                    $hasilQuery = mysqli_fetch_array($queryEdit);
                                    $idBiaya=$hasilQuery['id_biaya_kirim'];
                                    $idkota = $hasilQuery['id_kota'];
                                    $idkurir = $hasilQuery['id_kurir'];
                                    $biaya = $hasilQuery['biaya'];
                                    ?>
                                    <form class="form-valide" action="../admin/module/biaya/aksi_edit.php" method="post">
                                        <input type="hidden" name="id_biaya_kirim" value="<?php echo $idBiaya; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kota <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="idKota">
                                                <?php
                                                include "../lib/koneksi.php";
                                                $kueriKota = mysqli_query($koneksi, "SELECT * from tbl_kota");
                                                while ($kot=mysqli_fetch_array($kueriKota)){  
                                                ?>
                                                <option value="<?php echo $kot['id_kota']; ?>" <?php if ($idkota == $kot['id_kota']) {echo 'selected';}?>><?php echo $kot['nama_kota']; ?></option><?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama provinsi <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="idProvinsi">
                                                <?php
                                                include "../lib/koneksi.php";
                                                $kueriProvinsi = mysqli_query($koneksi,"select * from tbl_provinsi");
                                                while($prov=mysqli_fetch_array($kueriProvinsi)){
                                                ?>
                                                <option value="<?php echo $prov['id_provinsi']; ?>"><?php echo $prov['nama_provinsi']; ?></option>
                                                <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kurir <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="idKurir">
                                                <?php
                                                include "../lib/koneksi.php";
                                                $kuerikurir = mysqli_query($koneksi,"SELECT * from tbl_kurir");
                                                while($kur=mysqli_fetch_array($kuerikurir)){
                                                ?>
                                                <option value="<?php echo $kur['id_kurir']; ?>" <?php if ($idkurir == $kur['id_kurir']) {echo 'selected';}?>><?php echo $kur['nama_kurir']; ?></option>
                                                <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Biaya <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya kirim" value="<?php echo $biaya; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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