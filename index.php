<?php
require_once('conn.php');
include('headeruser.php');
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if (!empty($_SESSION)){
?>
<?php










} else {
    redirect('login.php');
}
include('footer.php');
?>
