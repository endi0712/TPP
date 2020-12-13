<?php 
session_start();
session_destroy();
echo "<script>alert('Log Out !!!'); window.location='index.php';</script>";	
?>