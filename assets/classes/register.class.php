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
	$result = $conn->prepare("SELECT user_ic FROM tb_users WHERE user_ic = '".$user_ic."'");
	$stmt->execute();
	$exists = (bool) $stmt->get_result()->fetch_row();

	if ($exists) {
		redirect("register.php?error=1");
	} else {
		#arahan SQL untuk menyimpan data	
		$arahan_sql_simpan = "INSERT INTO tb_users(user_name,user_ic,user_email,password)VALUES('$user_name','$user_ic','$user_email','$password')";
		// echo "INSERT INTO tb_users(user_name,user_ic,user_email,password)VALUES('$user_name','$user_ic','$user_email','$password')";

		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_simpan)) {
			#jika proses menyimpan berjaya,papar info dan buka laman login.php
			redirect("login.php?success=1");
		}
		else
		{	
			#jika proses menyimpan gagal,papar laman sebelumnya
			echo"<script>alert('Gagal');
			window.history.back();</script>";
		}
	}

}
?>
