<?php
require_once("conn_login.php");
include("header.php");

$id_hs = isset($_GET['id']) && $_GET['id']!="" ? $_GET['id'] : "";

if(isset($_POST['Submit'])) {
	/*echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	include("assets/proses/proses_kemaskini.php");
}

if ($id_hs != "") {
	# arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
	$arahan_SQL_cari1= "SELECT * FROM tb_homestay WHERE id_homestay = '".$id_hs."'";
	
	# melaksanakan arahan memilih
	$laksana_arahan_cari=mysqli_query($condb,$arahan_SQL_cari1);
	
	# pembolehubah rekod mengambil data yang di pilih baris demi baris
	$rekod = mysqli_fetch_assoc($laksana_arahan_cari);
	$id_hs = $rekod['id_homestay'];
	$hs_name = $rekod['hs_name'];
	$hs_address = $rekod['hs_address'];
	$hs_state = $rekod['hs_state'];
	
}

?>
