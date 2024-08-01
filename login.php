<?php
require_once("conn.php");
if ( isset($_SESSION['userData']) != "") {
	header("Location: index.php");
	exit;
}
include('sweetalerts2.php');
?>
	
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="css/v6.6.0/all.css" />
<link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-light.css" />
<link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-regular.css" />
<link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-solid.css" />
<link rel="stylesheet" type="text/css" href="css/v6.6.0/sharp-thin.css" />
<script src="js/jquery-3.6.4.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" type="text/css" href="assets/libs/sweetalert2/sweetalert2.min.css"/>
<!-- End SweetAlert2 -->

<!-- Sweet Alerts js -->
<script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Sweet Alerts js ends -->
