<?php
 
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	$idProduk = $_POST['id_produk'];
	$idKategori = $_POST['idKategori'];
	$namaProduk = $_POST['namaProduk'];
	$deskripsi= $_POST['deskripsiProduk'];
	$hargaProduk = $_POST['hargaProduk'];
	 
	 

	$path = "../../upload/".$nama_file;

	if ($nama_file!='') 
	{

		if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") 
		{
			if ($ukuran_file <= 1000000) 
			{
				if (move_uploaded_file($tmp_file, $path)) 
				{
					$queryEdit = mysqli_query($koneksi,"UPDATE tbl_produk SET id_kategori  ='$idKategori', nama_produk = '$namaProduk', deskripsi = '$deskripsiProduk', gambar = '$nama_file', harga = '$hargaProduk'  WHERE id_produk = '$idProduk' "); 	
					
	 				if($queryEdit){ 		 
					echo "<script>alert('Data Produk Berhasil Diubah'); window.location= '$admin_url'+'adminweb.php?module=produk';</script>";
					}else{
					echo "<script>alert('Data Produk Gagal Diubah'); window.location= '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
					}

				}else{
					echo "<script>alert ('Data Gambar Produk Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
				}
								
			}else{
				echo "<script>alert('Data Gambar Produk Gagal dimasukkan, Ukuran melebihi 1Mb'); window.location= '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
			}

		}else{
			echo "<script>alert('Data Gambar Produk Gagal dimasukkan, Format tidak didukung'); window.location= '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk;</script>";
		} 

	}else{
		$queryEdit = mysqli_query($koneksi,"UPDATE tbl_produk SET id_kategori  ='$idKategori', nama_produk = '$namaProduk', deskripsi = '$deskripsi', harga = '$hargaProduk' WHERE id_produk = '$idProduk' "); 
			if($queryEdit){ 		 
					echo "<script>alert('Data Produk Berhasil Diubah'); window.location= '$admin_url'+'adminweb.php?module=produk';</script>";
			}else{
					echo "<script>alert('Data Produk Gagal Diubah'); window.location='$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk;</script>";
			}
	}
 
?>
