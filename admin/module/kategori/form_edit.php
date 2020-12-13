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

                                    $idKategori=$_GET['id_kategori'];
                                    $queryEdit=mysqli_query($koneksi,"SELECT * FROM tbl_kategori WHERE id_kategori='$idKategori'");

                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idKategori=$hasilQuery['id_kategori'];
                                    $namaKategori=$hasilQuery['nama_kategori'];

                                    ?>
                                    <form class="form-valide" action="../admin/module/kategori/aksi_edit.php" method="post">
                                        <input type="hidden" name="id_kategori" value="<?php echo $idKategori; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kategori <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Nama Kategori" value="<?php echo $namaKategori ?>">
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