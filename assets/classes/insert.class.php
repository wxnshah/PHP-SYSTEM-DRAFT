<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	
	# mengambil data POST
	$name_students = $_POST['name_students'];
	$id_gender = $_POST['id_gender'];
	$id_department = $_POST['id_department'];
	$id_university = $_POST['id_university'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
		
	#pengesahan data
	if (empty ($name_students) || empty ($id_gender) || empty ($id_department) || empty ($id_university) || empty ($start_date) || empty($end_date))
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
		$arahan_sql_simpan = "INSERT INTO tb_students(name_students,id_gender,id_department,id_university,start_date,end_date)VALUES('$name_students','$id_gender','$id_department','$id_university','$start_date','$end_date')";

		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_simpan))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo "<script>alert('Kemasukan Data Berjaya')</script>";
			redirect("papar_borang.php?success=1");
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
			redirect("papar_borang.php");
		}
	}
	
}
?>
