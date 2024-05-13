<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	
	# mengambil data POST
	$image_student = $_FILES['image_student'];
	$name_students = $_POST['name_students'];
	$id_gender = $_POST['id_gender'];
	$id_department = $_POST['id_department'];
	$id_university = $_POST['id_university'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	$target_dir = "assets/uploads/";
	$name = $_FILES['image_student']['name'];
	$new_name = $target_dir.time()."-".rand(1000, 9999)."-".$name;
	$target_file = $target_dir . basename($new_name);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if(isset($_POST["Submit"])) {
	$check = getimagesize($_FILES["image_student"]["tmp_name"]);
	if($check !== false) {
		// echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		redirect('papar_borang.php?error=4');
		// echo "File is not an image.";
		$uploadOk = 0;
	}
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		// echo $target_file;
		redirect('papar_borang.php?error=5');
		// echo "Sorry, file already exists.";
	$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["image_student"]["size"] > 500000) {
		redirect('papar_borang.php?error=6');
		// echo "Sorry, your file is too large.";
	$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		redirect('papar_borang.php?error=7');
		// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		// echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	if (move_uploaded_file($_FILES["image_student"]["tmp_name"], $target_file)) {
		// echo "The file ". htmlspecialchars( basename( $_FILES["image_student"]["name"])). " has been uploaded.";
	} else {
		redirect('papar_borang.php?error=8');
		// echo "Sorry, there was an error uploading your file.";
	}
	}
		
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
		$arahan_sql_simpan = "INSERT INTO tb_students(image_student,name_students,id_gender,id_department,id_university,start_date,end_date)VALUES('$target_file','$name_students','$id_gender','$id_department','$id_university','$start_date','$end_date')";

		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_simpan))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo "<script>alert('Kemasukan Data Berjaya')</script>";
			redirect("senarai_permohonan.php?success=1");
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
