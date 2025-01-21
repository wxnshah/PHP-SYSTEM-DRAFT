<?php
require_once('conn.php');
include('headeruser.php');

if(isset($_GET['delete_id'])) {
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<pre>";
	// print_r($_GET);
	// echo "</pre>";
	include('assets/classes/padam_permohonan.class.php');
}

include('sweetalert2.php');
?>
                <main>  
                    <div class="container-fluid px-4">

                    <h1 class="mt-4">Senarai Permohonan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Senarai Permohonan</li>
                    </ol>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa-solid fa-plus"></i>
                            Senarai Permohonan
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-bordered table-responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th width="5%" class="text-center">Gambar</th>
                                        <th>Nama</th>
                                        <th>Jantina</th>
                                        <th>Department</th>
                                        <th>Universiti</th>
                                        <th>Tarikh Mula</th>
                                        <th>Tarikh Tamat</th>
                                        <th>Kemaskini</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                <?php
                                            // $result = dbquery("SELECT * FROM tb_maklumat");
                                            // if(dbrows($result)) {
                                            //     $i=0;
                                            //     while($data=dbarray($result)) {
                                            //     $i++;
                                            //     echo "
                                            //     <tr>
                                            //         <td align='center'>
                                            //             ".$i."
                                            //         </td>
                                            //         <td>";
                                            //         ?>
                                            //         <?php
                                            //             $image_users = $data['image_users'];
                                            //             if($image_users != "" && $image_users != NULL){
                                            //                 echo "<img src='".$image_users."' class='rounded-circle' alt='img' style='width: 50px; height: 50px; object-fit: cover; border-radius: 50%;'>";
                                            //             } else {
                                            //                 echo "<img src='assets/img/user.png' class='rounded-circle' alt='img' style='width: 50px; height: 50px; object-fit: cover; border-radius: 50%;'>";
                                            //             }
                                            //         ?>
                                            //         <?php
                                            //         echo "
                                            //         </td>
                                            //         <td>";
                                            //         ?>
                                            //         <?php
                                            //             $resume_users = $data['resume_users'];
                                            //             if($resume_users != "" && $resume_users != NULL){
                                            //                 echo "
                                            //                 <a href='assets/resume/" . $resume_users . "' target='_blank'>
                                            //                     <p>Resume " . getDataFromTable('user_name', $data['id_users'], 'id_users', 'tb_users') . "</p>
                                            //                 </a>
                                            //                 ";
                                            //             } else {
                                            //                 echo "<p>Tiada Resume</p>";
                                            //             }
                                            //         ?>
                                            //         <?php
                                            //         echo "
                                            //         </td>
                                            //         <td>
                                            //             <p>".getDataFromTable('user_name',$data['id_users'],'id_users','tb_users')."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".getDataFromTable('name_gender',$data['id_gender'],'id_gender','lt_gender')."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['tarikh_lahir']."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['alamat']."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['no_telefon']."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['id_ipta']."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['no_matrik']."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['tarikh_mula']."</p>
                                            //         </td>
                                            //         <td>
                                            //             <p>".$data['tarikh_tamat']."</p>
                                            //         </td>
                                            //         <td align='center' width='1%'>
                                            //             <a href='kemaskini_maklumat_pelajar.php?id_maklumat=".$data['id_maklumat']."'><i class='fas fa-edit fa-2x'></i></a>&nbsp;&nbsp;
                                            //             <a href='".htmlspecialchars($_SERVER['PHP_SELF'])."?delete_id=".$data['id_maklumat']."' onClick=\"return deletebuttonask()\"><i class='fas fa-trash fa-2x'></i></a>
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
