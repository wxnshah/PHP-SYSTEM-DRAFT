<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	
# mengambil data POST
    $hs_name = $_POST['hs_name'];
    $hs_address = $_POST['hs_address'];
    $hs_state = $_POST['hs_state'];
    $hs_type = $_POST['hs_type'];
    $hs_room = $_POST['hs_room'];
    $hs_toilet = $_POST['hs_toilet'];
    $hs_aircond = $_POST['hs_aircond'];
    $hs_capacity = $_POST['hs_capacity'];
    $hs_price = $_POST['hs_price'];
    
#pengesahan data
	if (empty ($hs_name) || empty ($hs_address) || empty ($hs_state) || empty ($hs_type) || empty ($hs_room) || empty($hs_toilet) || empty ($hs_aircond) ||
	empty ($hs_capacity) || empty($hs_price))
	{
		die("<script>alert('Data tidak lengkap.');
		window.history.back();</script>");
	}
	
#arahan SQL untuk menyimpan data	
$arahan_sql_simpan = "INSERT INTO tb_homestay(hs_name,hs_address,hs_state,hs_type,hs_room,hs_toilet,hs_aircond,hs_capacity,hs_price)VALUES('$hs_name','$hs_address','$hs_state','$hs_type','$hs_room','$hs_toilet','$hs_aircond','$hs_capacity','$hs_price')";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($condb,$arahan_sql_simpan))
	{
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Kemasukan Data Berjaya')</script>";
		redirect("senarai_kemaskini_homestay.php?success=1");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('gagal');
		window.history.back();</script>";
	}
}
?>
