<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{

	# mengambil data POST
	$image_users = $_FILES['image_users'];
	$resume_users = $_FILES['resume_users'];
	$id_users = $_POST['id_users'];
	$id_gender = $_POST['id_gender'];
	$tarikh_lahir = $_POST['tarikh_lahir'];
	$alamat = $_POST['alamat'];
	$no_telefon = $_POST['no_telefon'];
	$id_ipta = $_POST['id_ipta'];
	$no_matrik = $_POST['no_matrik'];
	$tarikh_mula = $_POST['tarikh_mula'];
	$tarikh_tamat = $_POST['tarikh_tamat'];

	if (isset($_POST['Submit'])) {

		// IMAGE UPLOAD
		if (isset($_FILES['image_users']) && $_FILES['image_users']['name'] != "") {
			$target_dir_image = "assets/uploads/";
			$image = $_FILES['image_users'];
			$image_name = $image['name'];
			$new_image_name = time() . "-" . rand(1000, 9999) . "-" . $image_name;
			$target_image_file = $target_dir_image . basename($new_image_name);
			$imageUploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_image_file, PATHINFO_EXTENSION));
	
			// Check if image file is a valid image
			$check = getimagesize($image["tmp_name"]);
			if ($check === false) {
				redirect('tambah_maklumat_pelajar.php?error=4');
				$imageUploadOk = 0;
			}
	
			// Check if file already exists
			if (file_exists($target_image_file)) {
				redirect('tambah_maklumat_pelajar.php?error=5');
				$imageUploadOk = 0;
			}
	
			// Check file size
			if ($image["size"] > 500000) {
				redirect('tambah_maklumat_pelajar.php?error=6');
				$imageUploadOk = 0;
			}
	
			// Allow certain file formats
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
				redirect('tambah_maklumat_pelajar.php?error=7');
				$imageUploadOk = 0;
			}
	
			// Upload image if no errors
			if ($imageUploadOk == 1) {
				if (!move_uploaded_file($image["tmp_name"], $target_image_file)) {
					redirect('tambah_maklumat_pelajar.php?error=8');
				}
			}
		} else {
			// No image uploaded, set image_users as NULL
			$new_image_name = NULL;
		}
	
		// RESUME UPLOAD
		if (isset($_FILES['resume_users']) && $_FILES['resume_users']['name'] != "") {
			$target_dir_resume = "assets/resume/";
			$resume = $_FILES['resume_users'];
			$resume_name = $resume['name'];
			$new_resume_name = time() . "-" . rand(1000, 9999) . "-" . $resume_name;
			$target_resume_file = $target_dir_resume . basename($new_resume_name);
			$resumeUploadOk = 1;
			$fileType = strtolower(pathinfo($target_resume_file, PATHINFO_EXTENSION));
	
			// Check if file is a valid document type (PDF, DOC, DOCX)
			if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
				redirect('tambah_maklumat_pelajar.php?error=7');
				$resumeUploadOk = 0;
			}
	
			// Check if file already exists
			if (file_exists($target_resume_file)) {
				redirect('tambah_maklumat_pelajar.php?error=5');
				$resumeUploadOk = 0;
			}
	
			// Check file size (max size 2MB for document)
			if ($resume["size"] > 2000000) {  // 2MB
				redirect('tambah_maklumat_pelajar.php?error=6');
				$resumeUploadOk = 0;
			}
	
			// Upload resume if no errors
			if ($resumeUploadOk == 1) {
				if (!move_uploaded_file($resume["tmp_name"], $target_resume_file)) {
					redirect('tambah_maklumat_pelajar.php?error=8');
				}
			}
		} else {
			// No resume uploaded, set resume_users as NULL
			$new_resume_name = NULL;
		}
	}    
    
	#pengesahan data
	if (empty ($id_users) || empty ($id_gender) || empty ($tarikh_lahir) || empty ($alamat) || empty ($no_telefon) || empty ($id_ipta) || empty ($no_matrik) || empty ($tarikh_mula) || empty ($tarikh_tamat)) 
    {
		echo "<script>
			setTimeout(function() {
				Swal.fire({
					position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Data Tidak Lengkap !', icon: 'error', timerProgressBar: true, timer: 3000
				})
			}, 600);
		</script>";

	} else {
		# SQL to insert data
        // Note: If image_users or resume_users is NULL, it will be treated as NULL in the query
        $arahan_sql_simpan = "INSERT INTO tb_maklumat(id_users, image_users, resume_users, id_gender, tarikh_lahir, alamat, no_telefon, id_ipta, no_matrik, tarikh_mula, tarikh_tamat)
        VALUES('$id_users', " . ($new_image_name ? "'$new_image_name'" : "NULL") . ", " . ($new_resume_name ? "'$new_resume_name'" : "NULL") . ", '$id_gender', '$tarikh_lahir', '$alamat', '$no_telefon', '$id_ipta', '$no_matrik', '$tarikh_mula', '$tarikh_tamat')";

		#melaksanakan proses menyimpan data dalam syarat if
		if(mysqli_query($conn,$arahan_sql_simpan))
		{
			#jika proses menyimpan berjaya,papar info dan buka laman add.php
			//echo "<script>alert('Kemasukan Data Berjaya')</script>";
			redirect("senarai_maklumat_pelajar.php?success=1");
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
			redirect("tambah_maklumat_pelajar.php");
		}
	}

}
?>
