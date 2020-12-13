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

                                    $idProduk = $_GET['id_produk'];
                                    $queryEdit = mysqli_query($koneksi,"SELECT * FROM tbl_produk WHERE id_produk='$idProduk'");

                                    $hasilQuery = mysqli_fetch_array($queryEdit);
                                    $idProduk=$hasilQuery['id_produk'];
                                    $idKategori = $hasilQuery['id_kategori'];
                                    $namaProduk = $hasilQuery['nama_produk'];
                                    $deskripsi = $hasilQuery['deskripsi'];
                                    $gambarProduk = $hasilQuery['gambar'];
                                    $hargaProduk = $hasilQuery['harga'];
                                    ?>
                                    <form class="form-valide" action="../admin/module/produk/aksi_edit.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_produk" value="<?php echo $idProduk; ?>"> 
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kategori <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="idKategori">
                                                    <?php
                                                    include "../lib/koneksi.php";
                                                    $kueriKategori = mysqli_query($koneksi, "SELECT * from tbl_kategori");
                                                    while ($kat=mysqli_fetch_array($kueriKategori)){  
                                                    ?>
                                                    <option value="<?php echo $kat['id_kategori']; ?>" <?php if ($idKategori == $kat['id_kategori']) {echo 'selected';}?>><?php echo $kat['nama_kategori']; ?></option><?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama produk <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Nama Produk" value="<?php echo $namaProduk; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Deskripsi <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="deskripsiProduk" name="deskripsiProduk" placeholder="Deskripsi Produk" value="<?php echo $deskripsi; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Gambar <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img height="100" width="150" src="upload/<?php echo $gambarProduk; ?>">
                                                <input type="file" id="gambar" name="gambar">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Harga <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="hargaProduk" name="hargaProduk" placeholder="Harga Produk" value="<?php echo $hargaProduk; ?>">
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