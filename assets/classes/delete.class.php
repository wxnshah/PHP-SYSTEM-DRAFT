<?php
$id_students = isset($_GET['delete_id']) && $_GET['delete_id']!="" ? $_GET['delete_id'] : "";

#arahan SQL untuk padam data	

$result = dbquery("SELECT * FROM tb_students WHERE id_students = '".$id_students ."' ");
if(dbrows($result)) {
	while($data = dbarray($result)) {
		unlink($data['image_student']);
	}
}

$arahan_sql_kemaskini = "DELETE FROM tb_students WHERE id_students = '".$id_students."'";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($conn, $arahan_sql_kemaskini))
	{
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Data Berjaya Dipadam')</script>";
		redirect("senarai_permohonan.php?success=3");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal Padam');
		window.history.back();</script>";
	}
?>
