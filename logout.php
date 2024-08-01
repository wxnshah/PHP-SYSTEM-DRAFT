<?php
session_start();

if (!isset($_SESSION['userData'])) {
    header("Location: index.php");
} else if(isset($_SESSION['userData'])!="") {
    header("Location: index.php");
}

if (isset($_GET['logout'])) {
    unset($_SESSION['userData']);
    session_unset();
    session_destroy();
    header("Location: login.php?success=5");
    exit;
}
?>
