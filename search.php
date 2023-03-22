<?php

$v_tarikhLulus = isset($_POST['tahun']) && $_POST['tahun']!="" ? $_POST['tahun'] : "";
// $v_idStrategi = isset($_POST['id_strategi']) && $_POST['id_strategi']!="" ? $_POST['id_strategi'] : "";
// $v_Tahun = isset($_POST['tahun']) && $_POST['tahun']!="" ? $_POST['tahun'] : "";
// $v_idBahagian = isset($_POST['id_bahagian']) && $_POST['id_bahagian']!="" ? $_POST['id_bahagian'] : "";
// $v_Status = isset($_POST['status']) && $_POST['status']!="" ? $_POST['status'] : "";

$sql = "SELECT a.id_jabatan, a.nama_jabatan,
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 01) as JAN, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 02) as FEB, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 03) as MAR, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 04) as APR,
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 05) as MEI, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 06) as JUN, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 07) as JUL, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 08) as OGOS, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 09) as SEP,
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 10) as OKT, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 11) as NOV, 
(SELECT COUNT(b.id_mohon) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1 AND MONTH(DATE_FORMAT(tarikh_lulus, '%Y-%m-%d')) = 12) as DIS,
(SELECT COUNT(JAN+FEB+MAR+APR+MEI+JUN+JUL+OGOS+SEP+OKT+NOV+DIS) FROM tb_mohon b WHERE a.id_jabatan = b.id_jabatan AND b.id_status = 1) as TOTAL_BULAN,
(SELECT COUNT(b.id_mohon) AS JUM FROM tb_mohon b WHERE b.id_status = 1) as JUM
FROM lt_jabatan a, tb_mohon b WHERE";

//TERAS
if (isset($_POST['tahun'])) {
$sql .= " YEAR(b.tarikh_lulus) = '".$v_tarikhLulus."' ";
//$sql .= "AND ";
}

// //TERAS
// if (isset($_POST['id_strategi']) != "" && $_POST['id_strategi'] != NULL) {
// $sql .= "AND id_strategi = '".$v_idStrategi."' ";
// //$sql .= "AND ";
// }

// //TERAS
// if (isset($_POST['tahun']) != "" && $_POST['tahun'] != NULL) {
// $sql .= "AND tahun = '".$v_Tahun."' ";
// //$sql .= "AND ";
// }

// //TERAS
// if (isset($_POST['id_bahagian']) != "" && $_POST['id_bahagian'] != NULL) {
// $sql .= "AND id_bahagian = '".$v_idBahagian."' ";
// //$sql .= "AND ";
// }

// //TERAS
// if (isset($_POST['status']) != "" && $_POST['status'] != NULL) {
// $sql .= "AND status = '".$v_Status."' ";
// //$sql .= "AND ";
// }

?>
