 <?php 
 include "../../../lib/config.php";
 include "../../../lib/koneksi.php";

 $namakurir = $_POST['namakurir'];
 $namakur=trim($namakurir);
 if ($namakurir=="") {
 	echo "<script>alert('Data tidak boleh kosong'); window.location='$admin_url'+'adminweb.php?module=tambah_kurir';</script>";
 }else{
 	$querySimpan =mysqli_query($koneksi,"INSERT INTO tbl_kurir (nama_kurir)VALUES('$namakurir')");
 	if ($querySimpan) {
 		echo "<script> alert ('DATA kurir BERHASIL MASUK'); window.location='$admin_url'+'adminweb.php?module=kurir';</script>";
 	} else { 
 		echo "<script> alert('Data kurir gagal dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kurir';</script>";
 	}
 }
 ?>