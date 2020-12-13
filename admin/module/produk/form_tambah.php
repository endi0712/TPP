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
                                    <form class="form-valide" action="../admin/module/produk/aksi_simpan.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama kategori <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="idKategori">
                                                    <?php
                                                    include "../lib/koneksi.php";
                                                    $kueriKategori = mysqli_query($koneksi, "select * from tbl_kategori");
                                                    while ($kat=mysqli_fetch_array($kueriKategori)){  
                                                    ?>
                                                    <option value="<?php echo $kat['id_kategori']; ?>"><?php echo $kat['nama_kategori']; ?></option><?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Nama produk <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="namaProduk" name="namaProduk" placeholder="Nama Produk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Deskripsi <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="deskripsiProduk" name="deskripsiProduk" placeholder="Deskripsi Produk">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Gambar <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" id="gambar" name="gambar">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Harga <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="hargaProduk" name="hargaProduk" placeholder="Harga Produk">
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