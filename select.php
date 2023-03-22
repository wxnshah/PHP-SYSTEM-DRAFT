<select class="form-control" data-toggle="select2" name="user_dept" required autofocus>
	<option value="">Pilih Jabatan</option>
	<?php
		$rs = dbquery("SELECT * FROM ".$table_name);
		while($data=dbarray($rs)){
		$id_jabatan = $data['id_jabatan'];
		$nama_jabatan = $data['nama_jabatan'];

			echo "<option value='".$id_jabatan."' ".($id_jabatan==$us_dept?"selected='selected'" :"").">".$nama_jabatan."</option>";
		}
	?>
</select>
