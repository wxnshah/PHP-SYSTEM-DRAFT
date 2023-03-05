<?php
# membuka hubungan antara laman dan pangkalan data.
# menghantar 4 parameter asas iaitu
# "nama host" , "username SQL" , "katalaluan SQL" , "nama pangkalan data"
$nama_host = "localhost";
$username_SQL = "root";
$password_SQL = "";
$nama_DB = "cthomestay";
$condb = mysqli_connect($nama_host, $username_SQL , $password_SQL , $nama_DB);

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
