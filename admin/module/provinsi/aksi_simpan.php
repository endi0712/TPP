 <?php 
 include "../../../lib/config.php";
 include "../../../lib/koneksi.php";

 $kodeProvinsi = $_POST['kode_provinsi'];
 $namaProvinsi = $_POST['nama_provinsi'];
 $namaProvinsi=trim($namaProvinsi);
 if ($namaProvinsi=="") {
 	echo "<script>alert('Data tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_provinsi';</script>";
 }else{
 	$querySimpan =mysqli_query($koneksi,"INSERT INTO tbl_provinsi (kode_provinsi,nama_provinsi)VALUES('$kodeProvinsi','$namaProvinsi')");
 	if ($querySimpan) {
 		echo "<script> alert ('DATA provinsi BERHASIL MASUK'); window.location='$admin_url'+'adminweb.php?module=provinsi';</script>";
 	} else { 
 		echo "<script> alert('Data provinsi gagal dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_provinsi';</script>";
 	}
 }
 ?>