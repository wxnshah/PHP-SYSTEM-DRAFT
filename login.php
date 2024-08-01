<!--Memanggil fail header-->
<?php
require_once("conn_login.php");
if ( isset($_SESSION['userData']) != "") {
	header("Location: index.php");
	exit;
}
?>
	
<!-- SweetAlert2 -->
<link rel="stylesheet" type="text/css" href="assets/libs/sweetalert2/sweetalert2.min.css"/>
<!-- End SweetAlert2 -->

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Sweet Alerts js ends -->
