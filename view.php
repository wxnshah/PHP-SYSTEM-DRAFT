<?php
require_once('conn.php');
include('headeruser.php');

if(isset($_GET['success']) && $_GET['success']=="1") {
	echo "<script>
			setTimeout(function() {
                Swal.fire({
                    position: 'top-end', showConfirmButton: false, titleText: 'Berjaya !', text: 'Data Telah Berjaya Ditambah !', icon: 'success', timerProgressBar: true, timer: 3000
                })
			}, 600);
		</script>";
}
?>
                <main>  
                    <div class="container-fluid px-4">

                    <h1 class="mt-4">Permohonan Baru</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Permohonan Baru</li>
                    </ol>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Permohonan Baru
                        </div>
                        <div class="card-body">
                            <table id="example" class="table dt-responsive w-100">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>No Kad Pengenalan</th>
                                        <th>Kemaskini</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php
                                    // $result = dbquery("SELECT * FROM tb_students");
                                    // if(dbrows($result)) {
                                    //     $i=0;
                                    //     while($data=dbarray($result)) {
                                    //     $i++;	
                                    //     echo "
                                    //     <tr>
                                    //         <td align='center'>
                                    //             ".$i."
                                    //         </td>
                                    //         <td>
                                    //             <p>".$data['user_ic']."</p>
                                    //         </td>
                                    //         <td align='center' width='1%'>
                                    //             <a href='#'><i class='fas fa-edit fa-2x'></i></a>&nbsp;&nbsp;
                                    //             <a href='senarai_pengguna.php?delete_id=".$datax['user_id']."' onclick=\"return deletebuttonask()\"><i class='fas fa-trash fa-2x'></i></a>
                                    //         </td>
                                    //     </tr>";
                                    //     }   
                                    // }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </main>
<?php
include('footer.php');
?>
