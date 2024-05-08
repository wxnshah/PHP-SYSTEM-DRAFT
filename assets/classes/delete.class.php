<?php
$id_students = isset($_GET['id_students']) && $_GET['id_students']!="" ? $_GET['id_students'] : "";

#arahan SQL untuk padam data	
$arahan_sql_kemaskini = "DELETE FROM tb_homestay WHERE id_homestay = '".$_GET['delete_id']."'";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($conn, $arahan_sql_kemaskini))
	{
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Data Berjaya Dipadam')</script>";
		redirect("senarai_kemaskini_homestay.php?success=3");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal Padam');
		window.history.back();</script>";
	}
?>
