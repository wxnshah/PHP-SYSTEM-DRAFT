<?php
$id_maklumat = isset($_GET['delete_id']) && $_GET['delete_id']!="" ? $_GET['delete_id'] : "";

#arahan SQL untuk padam data	

// $result = dbquery("SELECT * FROM tb_maklumat WHERE id_maklumat = '".$id_maklumat ."' ");
// if(dbrows($result)) {
// 	while($data = dbarray($result)) {
// 		unlink('assets/uploads/'.$data['image_users']);
// 		unlink('assets/resume/'.$data['resume_users']);
// 	}
// }

$arahan_sql_kemaskini = "DELETE FROM tb_maklumat WHERE id_maklumat = '".$id_maklumat."'";
	
#melaksanakan proses menyimpan data dalam syarat if
	if(mysqli_query($conn, $arahan_sql_kemaskini))
	{
		#jika proses menyimpan berjaya,papar info dan buka laman add.php
		//echo "<script>alert('Data Berjaya Dipadam')</script>";
		redirect("senarai_maklumat_pelajar.php?success=3");
	}
	else
	{	
		#jika proses menyimpan gagal,papar laman sebelumnya
		echo"<script>alert('Gagal Padam');
		window.history.back();</script>";
	}
?>
