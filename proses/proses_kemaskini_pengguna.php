<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
# memanggil fail connection
    include ("connection.php");

# mengambil data POST
    $id_user = $_POST['id_login'];
    $nokp = $_POST['nokp'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $notel = $_POST['notel'];
    $gender = $_POST['gender'];
    $race = $_POST['race'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    
#pengesahan data
	if (empty ($nokp) || empty ($name) || empty ($address) || empty ($state) || empty ($country) || empty($notel) || empty ($gender) || empty ($race) || empty($email) || empty($password) || empty($level)) {
		die("<script>alert('Data tidak lengkap.');
		window.history.back();</script>");
	}
	
#arahan SQL untuk menyimpan data	
$arahan_sql_simpan = "UPDATE tb_login SET nokp = '".$nokp."', name = '".$name."', address = '".$address."', state = '".$state."', country = '".$country."', notel = '".$notel."', gender = '".$gender."', race = '".$race."', email = '".$email."', password = '".$password."', level = '".$level."' WHERE id_login = '".$id_user."'";
//echo "UPDATE tb_login SET nokp = '".$nokp."', name = '".$name."', address = '".$address."', state = '".$state."', country = '".$country."', notel = '".$notel."', gender = '".$gender."', race = '".$race."', email = '".$email."', password = '".$password."', level = '".$level."' WHERE id_login = '".$id_user."'";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($condb,$arahan_sql_simpan)) {
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Kemasukan Data Berjaya')</script>";
		if($level == 1){
			redirect("senarai_pengguna.php?success=3");
		} else {
			redirect("index.php?success=4");
		}
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal');
		window.history.back();</script>";
	}
}
?>
