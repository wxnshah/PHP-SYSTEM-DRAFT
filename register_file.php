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
	include("assets/proses/proses_kemaskini.php");
}
?>
