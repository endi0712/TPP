 <?php 
 include "../../../lib/config.php";
 include "../../../lib/koneksi.php";

 $namaKota = $_POST['namaKota'];
 $namaKot=trim($namaKota);
 if ($namaKota=="") {
 	echo "<script>alert('Data tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_kota';</script>";

 }
 $querySimpan =mysqli_query($koneksi,"INSERT INTO tbl_kota (nama_kota)VALUES('$namaKota')");
 if ($querySimpan) {
 	echo "<script> alert ('DATA KOTA BERHASIL MASUK'); window.location='$admin_url'+'adminweb.php?module=kota';</script>";
 } else { 
 	echo "<script> alert('Data kota gagal dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kota';</script>";
 }
 ?>