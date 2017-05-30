<h2>sửa thông tin slide</h2>

<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên banner</label><br /><input type="text" name="nameSlide" value="<?php if(isset($_POST['nameSlide'])) {echo $_POST['nameSlide'];}else{ echo $dataOld['name'];} ?>" /><?php if(form_error('nameSlide')) echo form_error('nameSlide'); ?></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesSlide" /><input name="imagesSlide" type="hidden" value="<?php echo $dataOld['images']; ?>" /><?php  ?></td>
        </tr>  
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusSlide" checked="checked" value=1 /></td>
        </tr>               
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsSlide" rows="5" cols="40"><?php if(isset($_POST['descriptionsSlide'])) {echo $_POST['descriptionsSlide'];}else{ echo $dataOld['descriptions'];} ?></textarea><?php if(form_error('nameSlide')) echo form_error('nameSlide'); ?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>