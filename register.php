<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
# memanggil fail connection
    include ("connection.php");
	$password_hash = hash_hmac("sha512", $_POST['password'], "politekniktuankusyedsirajuddin");

# mengambil data POST
    $nokp = $_POST['nokp'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $notel = $_POST['notel'];
    $gender = $_POST['gender'];
    $race = $_POST['race'];
    $email = $_POST['email'];
    $password_hash;
    $level = $_POST['level'];
    
#pengesahan data
	if (empty ($nokp) || empty ($name) || empty ($address) || empty ($state) || empty ($country) || empty($notel) || empty ($gender) || empty ($race) || empty($email) || empty($password_hash) || empty($level)) {
		die("<script>alert('Data tidak lengkap.');
		window.history.back();</script>");
	}
	
#arahan SQL untuk menyimpan data	
$arahan_sql_simpan = "INSERT INTO tb_login(nokp,name,address,state,country,notel,gender,race,email,password,level)VALUES('$nokp','$name','$address','$state','$country','$notel','$gender','$race','$email','$password_hash','$level')";
//echo "INSERT INTO tb_login(nokp,name,address,state,country,notel,gender,race,email,password,level)VALUES('$nokp','$name','$address','$state','$country','$notel','$gender','$race','$email','$password','$level')";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($condb,$arahan_sql_simpan)) {
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Kemasukan Data Berjaya')</script>";
		redirect("pelanggan_login.php?success=1");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal');
		window.history.back();</script>";
	}
}
?>
