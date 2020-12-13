<?php 
// untuk memasukkan file koneksi.php
include "../lib/koneksi.php";
// menangkap variable POST dari Form Login/index.php
$username = $_POST['username'];
$pass = $_POST['password'];
// pastikan username dan password adalah huruf dan angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)) {
	echo "<center>Login Gagal !!! <br>
	Username atau Password Anda tidak benar.<br>
	Atau account anda sedang diblokir.<br>
	</center>";
	echo "<a href=index.php><b>Ulangi Lagi</b></a>";
}else{
	$login = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username='$username' AND password='$pass' ");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

	//Apabila username dan password ditemukan
	if ($ketemu > 0) {
		session_start();

		$_SESSION['namauser'] = $r['username'];
		$_SESSION['password'] = $r['password'];
		$_SESSION['level'] = $r['level'];

		header('location:adminweb.php?module=home');
	}else{
		echo "<center>Login Gagal !!! <br>
		Username atau Password Anda tidak benar.<br>
		Atau account anda sedang diblokir.<br>
		</center>";
		echo "<a href=index.php><b>Ulangi Lagi</b></a>";
	}
}
?>