<h2>sửa thông tin sản phẩm</h2>

<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên banner</label><br /><input type="text" name="nameBner" value="<?php if(isset($_POST['nameBner'])) {echo $_POST['nameBner'];}else{ echo $dataOld['name'];} ?>" /><?php if(form_error('nameBner')) echo form_error('nameBner'); ?></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesBner" /><input name="imagesBner" type="hidden" value="<?php echo $dataOld['images']; ?>" /><?php  ?></td>
        </tr>  
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusBner" checked="checked" value=1 /></td>
        </tr>               
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsBner" rows="5" cols="40"><?php if(isset($_POST['descriptionsBner'])) {echo $_POST['descriptionsBner'];}else{ echo $dataOld['descriptions'];} ?></textarea><?php if(form_error('nameBner')) echo form_error('nameBner'); ?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>