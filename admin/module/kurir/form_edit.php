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

                                    $idkurir=$_GET['id_kurir'];
                                    $queryEdit=mysqli_query($koneksi,"SELECT * FROM tbl_kurir WHERE id_kurir='$idkurir'");

                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idkurir=$hasilQuery['id_kurir'];
                                    $namakurir=$hasilQuery['nama_kurir'];

                                    ?>
                                    <form class="form-valide" action="../admin/module/kurir/aksi_edit.php" method="post">
                                        <input type="hidden" name="id_kurir" value="<?php echo $idkurir; ?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kurir <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="namakurir" name="nama_kurir" placeholder="Nama kurir" value="<?php echo $namakurir ?>">
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