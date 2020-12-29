<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idTransaksi = $_GET['id_transaksi'];
$queryEdit = mysqli_query($koneksi,"SELECT * FROM tbl_transaksi WHERE id_transaksi='$idTransaksi'");

$hasilQuery = mysqli_fetch_array($queryEdit);
$idTransaksi=$hasilQuery['id_transaksi'];
$Statust=$hasilQuery['status_transaksi'];
$Statusb=$hasilQuery['status_bayar'];
$Resi = $hasilQuery['resi'];
?>
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
                                      <form class="form-horizontal" action="module/transaksi/aksi_edit.php" method="post" enctype="multipart/form-data">
                                         <input type="hidden" name="id_transaksi" value="<?php echo $idTransaksi; ?>">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Status bayar <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="statust" id="statust" onchange="getSelect()">
                                                    <option value="Belum Bayar" <?php if ($Statust=="Belum Bayar"){echo "selected";} ?>>Belum Bayar</option>
                                                    <option value="Dikemas" <?php if ($Statust=="Dikemas"){echo "selected";} ?>>Dikemas</option>
                                                    <option value="Dikirim" <?php if ($Statust=="Dikirim"){echo "selected";} ?>>Dikirim</option>
                                                    <option value="Selesai" <?php if ($Statust=="Selesai"){echo "selected";} ?>>Selesai</option>
                                                    <option value="Dibatalkan" <?php if ($Statusb=="Dibatalkan"){echo "selected";} ?>>Dibatalkan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Status bayar <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="radio" class="form-check-input" id="statusb" name="statusb" value="Belum" <?php if($Statusb=="Belum"){echo "checked";}?>> 
                                                <label class="form-check-label" for="exampleRadios2">Belum</label>
                                                <hr>
                                                <input type="radio" class="form-check-input" id="statuss" name="statusb" value="Sudah" <?php if($Statusb=="Sudah"){echo "checked";} ?>>
                                                <label class="form-check-label" for="exampleRadios2">Sudah</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Resi <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="resi"  placeholder="Resi"  value="<?php echo $Resi?>" >
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