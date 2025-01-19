<?php
if(isset($_GET['success']) && $_GET['success']=="0") {
	echo "<script>
			setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'No Kad Pengenalan atau Kata Laluan Salah !', icon: 'error', timerProgressBar: true, timer: 3000
                })
			}, 600);
		</script>";
}
if(isset($_GET['success']) && $_GET['success']=="1") {
	echo "<script>
			setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Berjaya !', text: 'Data Telah Berjaya Ditambah !', icon: 'success', timerProgressBar: true, timer: 3000
                })
			}, 600);
		</script>";
}
if(isset($_GET['success']) && $_GET['success']=="2") {
	echo "<script>
			setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Berjaya !', text: 'Data Telah Berjaya Dikemaskini !', icon: 'success', timerProgressBar: true, timer: 3000
                })
			}, 600);
		</script>";
}
if(isset($_GET['success']) && $_GET['success']=="3") {
	echo "<script>
			setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Berjaya !', text: 'Data Telah Berjaya Dipadam !', icon: 'success', timerProgressBar: true, timer: 3000
                })
			}, 600);
		</script>";
}
if(isset($_GET['error']) && $_GET['error']=="4") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Fail dimasukkan bukan format image !', icon: 'error', timerProgressBar: true, timer: 3000
                })
            }, 600);
        </script>";
}
if(isset($_GET['error']) && $_GET['error']=="5") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Fail telah wujud !', icon: 'error', timerProgressBar: true, timer: 3000
                })
            }, 600);
        </script>";
}
if(isset($_GET['error']) && $_GET['error']=="6") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Fail dimasukkan terlalu besar !', icon: 'error', timerProgressBar: true, timer: 3000
                })
            }, 600);
        </script>";
}
if(isset($_GET['error']) && $_GET['error']=="7") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Format fail hanya benarkan JPG, JPEG, PNG & GIF !', icon: 'error', timerProgressBar: true, timer: 3000
                })
            }, 600);
        </script>";
}
if(isset($_GET['error']) && $_GET['error']=="8") {
	echo "<script>
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Gagal !', text: 'Fail gagal dimasukkan !', icon: 'error', timerProgressBar: true, timer: 3000
                })
            }, 600);
        </script>";
}
?>
