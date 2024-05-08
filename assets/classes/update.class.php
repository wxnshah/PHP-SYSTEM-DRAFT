<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
# mengambil data POST
	$id_hs = $_POST['id_homestay'];
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
	if (empty ($hs_name) || empty ($hs_address) || empty($hs_state) || empty ($hs_type) || empty ($hs_room) || empty($hs_toilet) || empty ($hs_aircond) ||
	empty ($hs_capacity) || empty($hs_price))
	{
		echo "<script>
			setTimeout(function() {
				Swal.fire({
					position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Data Tidak Lengkap !', icon: 'error', timerProgressBar: true, timer: 3000
				})
			}, 600);
		</script>";
	} else {
		#arahan SQL untuk menyimpan data	
		$arahan_sql_kemaskini = "UPDATE tb_homestay SET hs_name = '".$hs_name."', hs_address = '".$hs_address."', hs_state = '".$hs_state."', hs_type = '".$hs_type."', hs_room = '".$hs_room."', hs_toilet = '".$hs_toilet."', hs_aircond = '".$hs_aircond."', hs_capacity = '".$hs_capacity."', hs_price = '".$hs_price."' WHERE id_homestay = '".$id_hs."'";
			
		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_kemaskini))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo"<script>alert('Kemaskini Data Berjaya')</script>";
			redirect("senarai_kemaskini_homestay.php?success=2");
		}
		else
		{	
			#jika proses menyimpan gagal,papar laman sebelumnya
			echo "<script>
				setTimeout(function() {
					Swal.fire({
						position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Gagal !', icon: 'error', timerProgressBar: true, timer: 3000
					})
				}, 600);
			</script>";
			redirect("kemaskini_permohonan.php");
		}
	}	
}
?>
