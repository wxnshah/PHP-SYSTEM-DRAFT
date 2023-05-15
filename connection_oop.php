<?php
# membuka hubungan antara laman dan pangkalan data.
# menghantar 4 parameter asas iaitu
# "nama host" , "username SQL" , "katalaluan SQL" , "nama pangkalan data"
// $nama_host = "localhost";
// $username_SQL = "root";
// $password_SQL = "";
// $nama_DB = "lj_homestay";
// $condb = mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);

define ("HOST",'localhost');
define ("USER",'root');
define ("PSWD",'');
define ("DBNAME",'booking');

$conn = new mysqli(HOST,USER,PSWD,DBNAME);

//semak connection
if (mysqli_connect_errno())
{
	echo "Connection Error : ".mysqli_connect_error ();
}
else
{
	//echo "Connection Success" ;
}
?>
