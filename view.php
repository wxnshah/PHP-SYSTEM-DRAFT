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
                            <table id="example" class="table table-bordered" width="100%">
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
                                //         <td class='text-center'>";
                                //             if($data['image_student'] == "" || $data['image_student'] == NULL){
                                //                 echo "<img src='assets/img/user.png' class='rounded' width='40%'>";
                                //             } else{
                                //                 echo "<img src='".$data['image_student']."' class='rounded' width='40%'>";
                                //             }
                                //         echo "
                                //         </td>
                                //         <td>
                                //             <p>".$data['name_students']."</p>
                                //         </td>
                                //         <td>
                                //             <p>".getDataFromTable('name_gender',$data['id_gender'],'id_gender','lt_gender')."</p>
                                //         </td>
                                //         <td>
                                //             <p>".$data['id_department']."</p>
                                //         </td>
                                //         <td>
                                //             <p>".$data['id_university']."</p>
                                //         </td>
                                //         <td>
                                //             <p>".$data['start_date']."</p>
                                //         </td>
                                //         <td>
                                //             <p>".$data['end_date']."</p>
                                //         </td>
                                //         <td align='center' width='1%'>
                                //             <a href='kemaskini_permohonan.php?id_students=".$data['id_students']."'><i class='fas fa-edit fa-2x'></i></a>&nbsp;&nbsp;
                                //             <a href='senarai_permohonan.php?delete_id=".$data['id_students']."' onClick=\"return deletebuttonask()\"><i class='fas fa-trash fa-2x'></i></a>
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
