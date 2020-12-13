 <?php 
 include "../../../lib/config.php";
 include "../../../lib/koneksi.php";

 $namaKategori = $_POST['namaKategori'];
 $namakat =trim($namaKategori);
 if ($namaKategori=="") {
 	echo "<script> alert ('DATA KATEGORI TIDAK BOLEH KOSONG'); window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
 }else{

 	$querySimpan =mysqli_query($koneksi,"INSERT INTO tbl_kategori (nama_kategori)VALUES('$namaKategori')");
 	if ($querySimpan) {
 		echo "<script> alert ('DATA KATEGORI BERHASIL MASUK'); window.location='$admin_url'+'adminweb.php?module=kategori';</script>";
 	} else { 
 		echo "<script> alert('Data kategori gagal dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kategori';</script>";
 	}
 }
 ?>