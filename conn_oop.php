<?php
/*-------------------------------------------------------+
| dksyn_
+--------------------------------------------------------+
| Author: dksyn_
+--------------------------------------------------------*/
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
//$conn = new mysqli(HOST,USER,PSWD,DBNAME);
// $link = mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);
// unset($nama_host, $username_SQL , $password_SQL , $nama_DB);

ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

// Log In User
if(isset($_POST['idpengguna_login']) && isset($_POST['kata_login']) && $_POST['idpengguna_login'] != "" && $_POST['kata_login'] != ""){
	$idpengguna = $_POST['idpengguna_login'];
	$kataEncript = $_POST['kata_login'];
    $kata = hash_hmac("sha512", $kataEncript, "elinenantiletakhashdekatsini");
	// $kata = password_hash($kataEncript,PASSWORD_BCRYPT);
	
	# arahan SQL untuk mencari data dari tb_users
	$sql = $conn->query("SELECT * FROM tb_users WHERE id_pengguna = '".$idpengguna."' AND kata = '".$kata."'");

	// $arahan_sql_cari = "SELECT * FROM tb_users WHERE email = '".$email."' AND password = '".$katalaluan."'";
	//echo "SELECT * FROM tb_users WHERE id_pengguna = '".$idpengguna."' AND kata = '".$kata."'";
		
	# jika terdapat 1 baris rekod di temui
		if($sql) {
			$rekod = $sql->fetch_object();
			// echo "<pre>";
            // print_r($rekod);
            // echo "</pre>";
			$_SESSION['userData'] = $rekod;
			redirect("index.php");
		} else {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
			redirect("login.php?success=0");
		} 
} elseif (isset($_GET['logout']) && $_GET['logout'] == "yes") {
	session_destroy();
	$_SESSION = array();
} else {
	#mengumpukkan kepada pembolehubah session
	if (isset($_SESSION['userData']) != "") {
		$userData = $_SESSION['userData'];

		$id_users = $userData->id_users;
		$id_pengguna_users = $userData->id_pengguna;
		$name_users = $userData->name_users;
		$nickname_users = $userData->nickname;
		$phonenum_users = $userData->phonenum;
		$level_users = $userData->level;
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

// function dbcount($field, $table, $conditions = "") {
// 	global $mysql_queries_count, $mysql_queries_time; $mysql_queries_count++;

// 	$cond = ($conditions ? " WHERE ".$conditions : "");
// 	$query_time = get_microtime();
// 	$result = @mysqli_query("SELECT Count".$field." FROM ".$table.$cond);
// 	$query_time = substr((get_microtime() - $query_time),0,7);

// 	$mysql_queries_time[$mysql_queries_count] = array($query_time, "SELECT COUNT".$field." FROM ".$table.$cond);

// 	if (!$result) {
// 		echo mysqli_connect_error();
// 		return false;
// 	} else {
// 		$rows = mysqli_result($result, 0);
// 		return $rows;
// 	}
// }

function dbrows($query) {
	$result = @mysqli_num_rows($query);
	return $result;
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

// function dbconnect($nama_host, $username_SQL , $password_SQL , $nama_DB) {
// 	global $db_connect;

// 	$db_connect = @mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);
// 	if (!$db_connect) {
// 		die("<strong>Unable to establish connection to MySQL</strong><br />".$db_connect -> connect_error." : ".mysqli_connect_error());
// 	}
// }

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
