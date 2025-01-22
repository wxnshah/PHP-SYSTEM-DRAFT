<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	# mengambil data POST
	$id_maklumat = $_POST['id_maklumat'];
	
	$image_users = $_FILES['image_users'];
	$resume_users = $_FILES['resume_users'];
	$data_id_gender = $_POST['id_gender'];
	$data_tarikh_lahir = $_POST['tarikh_lahir'];
	$data_alamat = $_POST['alamat'];
	$data_no_telefon = $_POST['no_telefon'];
	$data_id_ipta = $_POST['id_ipta'];
	$data_no_matrik = $_POST['no_matrik'];
	$data_id_course = $_POST['id_course'];
	$data_tarikh_mula = $_POST['tarikh_mula'];
	$data_tarikh_tamat = $_POST['tarikh_tamat'];

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
	

	# Pengesahan data
if (empty($data_id_gender) || empty($data_tarikh_lahir) || empty($data_alamat) || empty($data_no_telefon) || empty($data_id_ipta) || empty($data_no_matrik) || empty($data_id_course) || empty($data_tarikh_mula) || empty($data_tarikh_tamat)) {
    echo "<script>
        setTimeout(function() {
            Swal.fire({
                position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Data Tidak Lengkap !', icon: 'error', timerProgressBar: true, timer: 3000
            })
        }, 600);
    </script>";
} else {
    // Retrieve the current image and resume filenames from the database using your dbquery
    $result = dbquery("SELECT * FROM tb_maklumat WHERE id_maklumat = '".$id_maklumat."'");

    if (dbrows($result)) {
        $data = dbarray($result);

        // Unlink the old image if it exists
        if (isset($_FILES['image_users']) && $_FILES['image_users']['name'] != "") {
            $old_image_path = "assets/uploads/" . $data['image_users'];
            if (file_exists($old_image_path)) {
                unlink($old_image_path); // Delete old image
            }
        }

        // Unlink the old resume if it exists
        if (isset($_FILES['resume_users']) && $_FILES['resume_users']['name'] != "") {
            $old_resume_path = "assets/resume/" . $data['resume_users'];
            if (file_exists($old_resume_path)) {
                unlink($old_resume_path); // Delete old resume
            }
        }
    }

    // Update SQL with new image and resume names
    $arahan_sql_kemaskini = "UPDATE tb_maklumat SET 
		id_gender = '".$data_id_gender."',
		tarikh_lahir = '".$data_tarikh_lahir."',
		alamat = '".$data_alamat."',
		no_telefon = '".$data_no_telefon."',
		id_ipta = '".$data_id_ipta."',
		no_matrik = '".$data_no_matrik."',
		id_course = '".$data_id_course."',
		tarikh_mula = '".$data_tarikh_mula."',
		tarikh_tamat = '".$data_tarikh_tamat."'";

		// Add image and resume update if they are provided
		if (isset($_FILES['image_users']) && $_FILES['image_users']['name'] != "") {
			$arahan_sql_kemaskini .= ", image_users = '".$new_image_name."'";
		}

		if (isset($_FILES['resume_users']) && $_FILES['resume_users']['name'] != "") {
			$arahan_sql_kemaskini .= ", resume_users = '".$new_resume_name."'";
		}

		$arahan_sql_kemaskini .= " WHERE id_maklumat = '".$id_maklumat."'";

		// Execute the query
		if (mysqli_query($conn, $arahan_sql_kemaskini)) {
			// If the update is successful, redirect with success message
			redirect("senarai_maklumat_pelajar.php?success=2");
		} else {
			// If the update fails, display an error message
			echo "<script>
				setTimeout(function() {
					Swal.fire({
						position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Gagal !', icon: 'error', timerProgressBar: true, timer: 3000
					})
				}, 600);
			</script>";
			redirect("kemaskini_maklumat_pelajar.php");
		}
	}

}
?>
