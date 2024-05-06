<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{

	# mengambil data POST
	$user_name = $_POST['user_name'];
	$user_ic = $_POST['user_ic'];
	$user_email = $_POST['user_email'];
    $password = hash_hmac("sha512", $_POST['password'], "majlisperbandaransungaipetani");
    
	#pengesahan data
	if (empty ($user_name) || empty ($user_ic) || empty ($user_email) || empty ($password)) {
		die("<script>alert('Data tidak lengkap.');
		window.history.back();</script>");
	}

	#check data if exists
	$result = dbquery("SELECT user_ic FROM tb_users WHERE user_ic = '".$user_ic."'");
	// echo "SELECT user_ic FROM tb_users WHERE user_ic = '".$user_ic."'";
	
	if (!$result || dbrows($result) != 0){
		// Rows exist
		echo "<script>alert('Data Telah Didaftarkan !')</script>";
		// redirect("register.php");
	} else {
		#arahan SQL untuk menyimpan data	
		$arahan_sql_simpan = "INSERT INTO tb_users(user_name,user_ic,user_email,password)VALUES('$user_name','$user_ic','$user_email','$password')";
		// echo "INSERT INTO tb_users(user_name,user_ic,user_email,password)VALUES('$user_name','$user_ic','$user_email','$password')";
		
		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_simpan)) {
			#jika proses menyimpan berjaya,papar info dan buka laman login.php
			//echo "<script>alert('Kemasukan Data Berjaya')</script>";
			// redirect("login.php?success=1");
		}
		else
		{	
			#jika proses menyimpan gagal,papar laman sebelumnya
			echo"<script>alert('Gagal');";
			// window.history.back();</script>";
		}

	}

}
?>
