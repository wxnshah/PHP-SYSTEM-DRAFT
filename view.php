<?php
require_once("conn_login.php");
include("header.php");

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/

if(isset($_SESSION['userData']) != ""){
?>

	<?php
	# arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
	$arahan_SQL_cari = "SELECT * FROM tb_homestay";

	# melaksanakan arahan memilih
	$laksana_arahan_cari = mysqli_query($condb,$arahan_SQL_cari);
	if(mysqli_rows($laksana_arahan_cari)) {
		# pembolehubah rekod mengambil data yang di pilih baris demi baris
		$i = 0;
		while ($rekod = mysqli_fetch_array($laksana_arahan_cari))
		{
			$i++;
			# mengumpukan data yang diambil kepada tatasusunan
			$data_get = array(
				'id_homestay'=>$rekod['id_homestay'],
				'hs_image'=>$rekod['hs_image'],
				'hs_name'=>$rekod['hs_name'],
				'hs_address'=>$rekod['hs_address'],
				'hs_state'=>$rekod['hs_state'],
				'hs_type'=>$rekod['hs_type'],
				'hs_capacity'=>$rekod['hs_capacity'],
				'hs_price'=>$rekod['hs_price']

			);
			echo "
			<div class='col-lg-3 col-md-6 mb-4'>
				<div class='card h-100'>
				<img class='card-img-top' style='max-height:230px;' src='".$rekod['hs_image']."' alt=''>
					<div class='card-body'>
						<h4 class='card-title'>".$rekod['hs_name']."</h4>
						<p class='card-text'>".$rekod['hs_address']."</p>
						<p class='card-text'>RM ".$rekod['hs_price']."</p>
					</div>
					<div class='card-footer'>
						<a href='tempahan.php?id=".$rekod['id_homestay']."' class='btn btn-primary'>Tempah Sekarang !</a>
					</div>
				</div>
			</div>
			";
		}
	} else {
		echo "Tiada Data Ditemukan";
	}
	?>

<?php
} else {
	header("Location: pelanggan_login.php");
	exit(); // Quit the script.
	include("footer.php");
}
include ("footer.php");
?>
