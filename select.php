<select class="form-control select2" name="id_department" required autofocus>
	<option value="">Pilih Jabatan</option>
	<?php
	    $rs = dbquery("SELECT * FROM lt_department");
	    while($data=dbarray($rs)){
		$id_department = $data['id_department'];
		$name_department = $data['name_department'];
	
		echo "<option value='".$id_department."'>".$name_department."</option>";
		// echo "<option value='".$id_department."' ".($id_department==$data_dept?"selected='selected'" :"").">".$name_department."</option>";
	    }
	?>
</select>
