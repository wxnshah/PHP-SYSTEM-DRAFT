<?php
require_once('conn.php');
include('headeruser.php');

$id_students = isset($_GET['id_students']) && $_GET['id_students']!="" ? $_GET['id_students'] : "";

if(isset($_POST['Submit'])) {
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	include("assets/classes/kemaskini_permohonan.class.php");
}

if ($id_students != "") {
	# arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
	$arahan_SQL_cari1= "SELECT * FROM tb_students WHERE id_students = '".$id_students."'";
	
	# melaksanakan arahan memilih
	$laksana_arahan_cari=mysqli_query($conn,$arahan_SQL_cari1);
	
	# pembolehubah rekod mengambil data yang di pilih baris demi baris
	$rekod = mysqli_fetch_assoc($laksana_arahan_cari);
	$id_students = $rekod['id_students'];

	$data_image_student = $rekod['image_student'];
	$data_name_students = $rekod['name_students'];
	$data_id_gender = $rekod['id_gender'];
	$data_id_department = $rekod['id_department'];
	$data_id_university = $rekod['id_university'];
	$data_start_date = $rekod['start_date'];
	$data_end_date = $rekod['end_date'];
	
}

include('sweetalert2.php');

?>
