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

                                    $idProvinsi=$_GET['id_provinsi'];
                                    $queryEdit=mysqli_query($koneksi,"SELECT * FROM tbl_provinsi WHERE id_provinsi='$idProvinsi'");

                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idProvinsi=$hasilQuery['id_provinsi'];
                                    $kodeProvinsi=$hasilQuery['kode_provinsi'];
                                    $namaProvinsi=$hasilQuery['nama_provinsi'];

                                    ?>
                                    <form class="form-valide" action="../admin/module/provinsi/aksi_edit.php" method="post">
                                        <input type="hidden" name="id_provinsi" value="<?php echo $idProvinsi; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Kode provinsi <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kodeProvinsi" name="kode_provinsi" placeholder="Kode provinsi" value="<?php echo $kodeProvinsi ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama provinsi <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="namaProvinsi" name="nama_provinsi" placeholder="Nama provinsi" value="<?php echo $namaProvinsi ?>">
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