<?php

// Calculate script start/end time
function get_microtime() {
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

// Define script start time
define("START_TIME", get_microtime());
define("IN_FUSION", TRUE);

session_start();

# memanggil fail connection
include("connection.php");

// Establish mySQL database connection
$link = dbconnect($nama_host, $username_SQL , $password_SQL , $nama_DB);
unset($nama_host, $username_SQL , $password_SQL , $nama_DB);

ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

// Log In User
if(isset($_POST['email']) && isset($_POST['pass']) && $_POST['email'] != "" && $_POST['pass'] != ""){
	$katalaluan = hash_hmac("sha512", $_POST['pass'], "politekniktuankusyedsirajuddin");
	$email = filter_var(($_POST['email']), FILTER_SANITIZE_EMAIL);
	
	# arahan SQL untuk mencari data dari jadual penyewa
	$arahan_sql_cari = "SELECT * FROM tb_users WHERE email = '".$email."' AND password = '".$katalaluan."'";
	// echo "SELECT * FROM tb_users WHERE nokp = '".$nokp."' AND password = '".$katalaluan."'";
	
	# melaksanakan proses carian 
	$laksana_arahan = mysqli_query($condb,$arahan_sql_cari);
	
	# jika terdapat 1 baris rekod di temui
		if(mysqli_num_rows($laksana_arahan)) {
			$rekod = mysqli_fetch_assoc($laksana_arahan);
			$_SESSION['userData'] = $rekod;
			redirect("index.php");
		} else {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
			// redirect("login.php?success=0");
		} 
} elseif (isset($_GET['logout']) && $_GET['logout'] == "yes") {
	session_destroy();
	$_SESSION = array();
} else {
	#mengumpukkan kepada pembolehubah session
	if (isset($_SESSION['userData']) != "") {
		$userData = $_SESSION['userData'];

		$id_users = $userData['id_users'];
		$name_users = $userData['name_users'];
		$email_users = $userData['email'];
		$level_users = $userData['level'];
	}
}

// MySQL database functions
function dbquery($query) {
	global $db_connect, $mysql_queries_count, $mysql_queries_time; $mysql_queries_count++;

	$query_time = get_microtime();
	$result = @mysqli_query($db_connect, $query);
	$query_time = substr((get_microtime() - $query_time),0,7);

	$mysql_queries_time[$mysql_queries_count] = array($query_time, $query);

	if (!$result) {
		echo mysqli_connect_error();
		return false;
	} else {
		return $result;
	}
}

function dbcount($field, $table, $conditions = "") {
	global $mysql_queries_count, $mysql_queries_time; $mysql_queries_count++;

	$cond = ($conditions ? " WHERE ".$conditions : "");
	$query_time = get_microtime();
	$result = @mysqli_query("SELECT Count".$field." FROM ".$table.$cond);
	$query_time = substr((get_microtime() - $query_time),0,7);

	$mysql_queries_time[$mysql_queries_count] = array($query_time, "SELECT COUNT".$field." FROM ".$table.$cond);

	if (!$result) {
		echo mysqli_connect_error();
		return false;
	} else {
		$rows = mysqli_result($result, 0);
		return $rows;
	}
}

function dbarray($query) {	
	$result = @mysqli_fetch_assoc($query);
	if (!$result) {
		echo mysqli_connect_error();
		return false;
	} else {
		return $result;
	}
}

function dbconnect($nama_host, $username_SQL , $password_SQL , $nama_DB) {
	global $db_connect;

	$db_connect = @mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);
	if (!$db_connect) {
		die("<strong>Unable to establish connection to MySQL</strong><br />".mysqli_errno()." : ".mysqli_connect_error());
	}
}

// Get Data (ID To Name) From Other Table
function getDataFromTable($column, $id, $column_id, $dbname) {
	$res = "";
	if($column!="" && $id!="" && $dbname!="" && $column_id!="") {
		$query = "SELECT ".$column." FROM ".$dbname." WHERE ".$column_id."='".$id."'";
		$rs=dbquery($query);
		$data=dbarray($rs);
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
