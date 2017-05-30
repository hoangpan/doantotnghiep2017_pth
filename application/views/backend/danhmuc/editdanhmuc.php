<h2>sửa thông tin danh mục</h2>

<div id="main">
	<form method="post">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên danh mục</label><br /><input type="text" name="tendm" value="<?php if(isset($_POST['tendm'])) {echo $_POST['tendm'];}else{ echo $dataOld['ten_dm'];} ?>" /><?php if(form_error('tendm')) echo form_error('tendm'); ?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>