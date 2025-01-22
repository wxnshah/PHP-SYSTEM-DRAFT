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
if(isset($_POST['user_ic']) && isset($_POST['password']) && $_POST['user_ic'] != "" && $_POST['password'] != ""){
    $user_ic = $_POST['user_ic'];
    $password = hash_hmac("sha512", $_POST['password'], "majlisperbandaransungaipetani");

    // Prepare and execute a parameterized query
    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE user_ic = ? AND password = ?");
    $stmt->bind_param("ss", $user_ic, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $userData = $result->fetch_assoc();

        // Set session data
        $_SESSION['userData'] = $userData;

        // Assigning id_users to a variable
        $id_users = $_SESSION['userData']['id_users'];
        $user_name = $_SESSION['userData']['user_name'];
        $user_email = $_SESSION['userData']['user_email'];
        $user_ic = $_SESSION['userData']['user_ic'];
        $user_level = $_SESSION['userData']['user_level'];

        // Redirect to index.php after setting session data
        redirect("index.php");
    } else {
        // echo print_r($result);
        // echo "SELECT * FROM tb_users WHERE user_ic = $user_ic AND password = $password";
        redirect("login.php?success=0");
    }
} elseif(isset($_GET['logout']) && $_GET['logout'] == "yes"){
    session_unset();
    session_destroy();
    redirect("login.php");
} else {
    // Check if user is already logged in
    if(isset($_SESSION['userData'])){
        // Assigning id_users to a variable
        $id_users = $_SESSION['userData']['id_users'];
        $user_name = $_SESSION['userData']['user_name'];
        $user_email = $_SESSION['userData']['user_email'];
        $user_ic = $_SESSION['userData']['user_ic'];
        $user_level = $_SESSION['userData']['user_level'];
    }
}

// MySQL database functions
function dbquery($query) {
	global $conn, $mysql_queries_count, $mysql_queries_time; $mysql_queries_count++;

	$query_time = get_microtime();
	$result = @mysqli_query($conn, $query);
	$query_time = substr((get_microtime() - $query_time),0,7);

	$mysql_queries_time[$mysql_queries_count] = array($query_time, $query);

	if (!$result) {
		echo mysqli_connect_error();
		return false;
	} else {
		return $result;
	}
}

function dbcount($column_name, $table_name, $conditions = "", $conn) {
    global $mysql_queries_count, $mysql_queries_time;

    // Increment the query count
    $mysql_queries_count++;

    // Form the condition if provided
    $cond = ($conditions ? " WHERE " . $conditions : "");

    // Start measuring the query time
    $query_time = get_microtime();

    // Perform the query
    $query = "SELECT COUNT(" . $column_name . ") AS count FROM " . $table_name . $cond;
    $result = @mysqli_query($conn, $query);  // Pass $conn as the first argument

    // Calculate the query time
    $query_time = substr((get_microtime() - $query_time), 0, 7);

    // Store query time and the query itself for debugging purposes
    $mysql_queries_time[$mysql_queries_count] = array($query_time, $query);

    // Check if the query was successful
    if (!$result) {
        // If the connection has an error, show it using mysqli_connect_error()
        echo mysqli_connect_error();  // Will only work for connection errors
        return false;
    } else {
        // Fetch the result
        $row = mysqli_fetch_assoc($result);

        // Return the count value
        return $row['count'];
    }
}


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
function getDataFromTable($column_name, $data_id, $column_id, $lt_name) {
	$res = "";
	if($column_name!="" && $data_id!="" && $lt_name!="" && $column_id!="") {
		$query = "SELECT ".$column_name." FROM ".$lt_name." WHERE ".$column_id."='".$data_id."'";
		$rs=dbquery($query);
		$data=dbarray($rs);
		$res = $data[$column_name];
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
