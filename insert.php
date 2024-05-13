<?php
require_once("conn_login.php");
include("header.php");

if(isset($_POST['Submit'])) {
	/*echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";*/
	include("assets/proses/proses_tambah.php");
}
include('sweetalert2.php');
// if (isset($_SESSION['userData']) != "" && $level == 1){
?>



<?php
// } else {
// 	header("Location: index.php");
// 	exit(); // Quit the script.
// 	include("footer.php");
// }
include ("footer.php");
?>
