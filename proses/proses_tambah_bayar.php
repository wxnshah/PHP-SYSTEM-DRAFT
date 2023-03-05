<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
# memanggil fail connection
    include ("connection.php");

# mengambil data POST
	//$id_login = $_POST['id_login'];
	$id_hs = $_POST['id_homestay'];
    $masuk=$_POST['bookingdate'];
	$keluar=$_POST['bookingend'];
	$payment_amt = $_POST['payment_amt'];
	$payment_date = $_POST['payment_date'];
	$invoice_no = $_POST['invoice_no'];
	$status = $_POST['status'];

}
	
# Arahan SQL untuk menyimpan data ke dalam jadual tempahan
$arahan_SQL_simpan="INSERT INTO tb_transaction(id_login,id_homestay,bookingdate,bookingend,payment_amt,payment_date,invoice_no,status)VALUES('".$id_log."','".$id_hs."','".$masuk."','".$keluar."','".$payment_amt."','".$payment_date."','".$invoice_no."','".$status."')";
//echo "insert into tb_transaction(id_login,id_homestay,bookingdate,bookingend,payment_amt,payment_date,invoice_no,status)values('".$_SESSION['id_login']."','".$id_hs."','".$masuk."','".$keluar."','".$payment_amt."','".$payment_date."','".$invoice_no."','".$status."')";

# melaksanakan proses menyimpan data dalam syarat IF
if(mysqli_query($condb,$arahan_SQL_simpan))
{
    /*echo "<script>alert('Pembelian Berjaya');
    window.location.href='tempahan_resit.php?id=".$id_hs."';</script>";*/
	redirect("tempahan_resit.php?id=".$id_hs."");
}
else
{
    # jika proses meyimpan gagal. Kembali ke laman sebelumnya.
    echo "<script>alert('Pembelian gagal');
    </script>";
}
?>
