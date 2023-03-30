<?php
    require_once("conn_login.php");
    include("header.php");
    
    $id_pelajar = isset($_GET['id']) && $_GET['id']!="" ? $_GET['id'] : "";

    include("assets/proses/proses_padam.php");

?>
