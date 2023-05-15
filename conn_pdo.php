<?php
/*-------------------------------------------------------+
| dksyn_
+--------------------------------------------------------+
| Author: 
+--------------------------------------------------------*/

if (preg_match("/conn.php/i", $_SERVER['PHP_SELF'])) { die(); }

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

ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

// Log In User
if(isset($_POST['email']) && isset($_POST['pass']) && $_POST['email'] != "" && $_POST['pass'] != ""){
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);
    
    $sql_search = $conn->query("SELECT * FROM tb_users WHERE email = '".$email."' AND password = '".$pass."' ");
    // $sql_search->execute([$email, $pass]);
       
    if($sql_search->rowCount() > 0){
        $fetch_session = $sql_search->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userData'] = $fetch_session;

        if(isset($_SESSION['userData']) != "" && $fetch_session['id_level'] == 1){
            redirect("admin_dashboard/");
        } else {
            redirect("home.php?success=1");
        }
    
    } else {
		// echo "SELECT * FROM tb_users WHERE email = '".$email."' AND password = '".$pass."' ";
        redirect("login.php?success=2"); 
    } 
} elseif(isset($_GET['logout']) && $_GET['logout'] == "yes") {
    session_destroy();
    $_SESSION = array();
}
else {
    if(isset($_SESSION['userData']) != ""){
        $fetch_session = $_SESSION['userData'];

        $sess_id_users = $fetch_session['id_users'];
        $sess_name_users = $fetch_session['name_users'];
        $sess_user_login = $fetch_session['user_login'];
        $sess_email = $fetch_session['email'];
        $sess_phone_num = $fetch_session['phone_num'];
        $sess_address = $fetch_session['address'];
        $sess_id_level = $fetch_session['id_level'];
    }
}

// Get Data (ID To Name) From Other Table
function getDataFromTable($column, $id, $column_id, $dbname) {
	global $conn;

	$res = "";
	if($column!="" && $id!="" && $dbname!="" && $column_id!="") {
		$query = $conn->query("SELECT ".$column." FROM ".$dbname." WHERE ".$column_id."='".$id."'");
		$data = $query->fetch(PDO::FETCH_ASSOC);
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
