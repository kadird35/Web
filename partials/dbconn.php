<?php
ob_start();
session_start(); 
date_default_timezone_set('Europe/Istanbul');

?>
<?php
$sunucu="localhost";
$username="root";
$password="";
$database="caridb";

$baglan=mysqli_connect($sunucu,$username,$password,$database);
mysqli_set_charset($baglan, "utf8");


if (mysqli_connect_errno()) {
	echo "Bağlantı Sağlanamadı :  " . mysqli_connect_error();
	exit;
  }

  ?>
