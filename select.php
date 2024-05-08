
<select class="form-control select2" name="user_dept" required autofocus>
	<option value="">Pilih Jabatan</option>
	<?php
		$arahan_sql_cari = "SELECT nokp FROM tb_users";
	 	# melaksanakan proses carian 
	 	$laksana_arahan = mysqli_query($conn,$arahan_sql_cari);
		while($data=dbarray($laksana_arahan)){
		$id_jabatan = $data['id_jabatan'];
		$nama_jabatan = $data['nama_jabatan'];

			echo "<option value='".$id_jabatan."' ".($id_jabatan==$us_dept?"selected='selected'" :"").">".$nama_jabatan."</option>";
		}
	?>
</select>
