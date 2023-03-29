<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

# memanggil fail connection
include("connection.php");	

// Log In User
if(isset($_POST['nokp']) && isset($_POST['katalaluanpelanggan']) && $_POST['nokp'] != "" && $_POST['katalaluanpelanggan'] != ""){
	$katalaluan = hash_hmac("sha512", $_POST['katalaluanpelanggan'], "politekniktuankusyedsirajuddin");
	//$login_ic = filter_var($_POST['login_ic'], FILTER_SANITIZE_NUMBER_INT | FILTER_SANITIZE_MAGIC_QUOTES);
	$nokp = filter_var(cleanurl($_POST['nokp']), FILTER_SANITIZE_NUMBER_INT);
	
	# arahan SQL untuk mencari data dari jadual penyewa
	$arahan_sql_cari = "SELECT * FROM tb_login WHERE nokp = '".$nokp."' AND password = '".$katalaluan."'";
	
	# melaksanakan proses carian 
	$laksana_arahan = mysqli_query($condb,$arahan_sql_cari);
	
	# jika terdapat 1 baris rekod di temui
		if(mysqli_num_rows($laksana_arahan)) {
			$rekod = mysqli_fetch_assoc($laksana_arahan);
			$_SESSION['userData'] = $rekod;
			redirect("index.php");
		} else {
			redirect("pelanggan_login.php?success=0");
		} 
} elseif (isset($_GET['logout']) && $_GET['logout'] == "yes") {
	session_destroy();
	$_SESSION = array();
} else {
	#mengumpukkan kepada pembolehubah session
	if (isset($_SESSION['userData']) != "") {
		$userData = $_SESSION['userData'];
		$id_log = $userData['id_login'];
		$no_kp = $userData['nokp'];
		$name = $userData['name'];
		$us_email = $userData['email'];
		$us_password = $userData['password'];
		$level = $userData['level'];
	}
}

// Get name/description from other ID 
function getDataFromTable($column, $id, $column_id, $dbname) {
	$res = "";
	if($column!="" && $id!="" && $dbname!="" && $column_id!="") {
		$arahan_sql_cari = "SELECT ".$column." FROM ".$dbname." WHERE ".$column_id."='".$id."'";
		$laksana_arahan = mysqli_query($arahan_sql_cari);
		$data=mysqli_fetch_array($laksana_arahan);
		//$rs=dbquery($query);
		//$data=dbarray($rs);
		$res = $data[$column];
	}
	return $res;
}

// Redirect browser using header or script function
function redirect($location, $script = false) {
	if (!$script) {
		header("Location: ".str_replace("&amp;", "&", $location));
		exit;
	} else {
		echo "<script type='text/javascript'>document.location.href='".str_replace("&amp;", "&", $location)."'</script>\n";
		exit;
	}
}
?>
