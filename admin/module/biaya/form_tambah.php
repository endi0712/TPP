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
                                    <form class="form-valide" action="../admin/module/biaya/aksi_simpan.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kota <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="idKota">
                                                <?php
                                                include "../lib/koneksi.php";
                                                $kueriKota = mysqli_query($koneksi, "select * from tbl_kota");
                                                while ($kot=mysqli_fetch_array($kueriKota)){  
                                                ?>
                                                <option value="<?php echo $kot['id_kota']; ?>"><?php echo $kot['nama_kota']; ?></option><?php } ?>
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
                                                $kueriKurir = mysqli_query($koneksi,"select * from tbl_kurir");
                                                while($kur=mysqli_fetch_array($kueriKurir)){
                                                ?>
                                                <option value="<?php echo $kur['id_kurir']; ?>"><?php echo $kur['nama_kurir']; ?></option>
                                                <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Biaya <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya kirim">
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