<?php
require_once("conn.php");
include("headeruser.php");

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
//     redirect('login.php');
// }
include ("footer.php");
?>
