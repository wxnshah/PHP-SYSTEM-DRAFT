<!--Memanggil fail header-->
<?php
require_once("conn_login.php");
if ( isset($_SESSION['userData']) != "") {
	header("Location: index.php");
	exit;
}
?>
