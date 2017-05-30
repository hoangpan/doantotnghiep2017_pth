<h2>sửa thông tin popup</h2>

<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên Popup</label><br /><input type="text" name="namePopup" value="<?php if(isset($_POST['namePopup'])) {echo $_POST['namePopup'];}else{ echo $dataOld['name'];} ?>" /><?php if(form_error('namePopup')) echo form_error('namePopup'); ?></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesPopup" /><input name="imagesPopup" type="hidden" value="<?php echo $dataOld['images']; ?>" /><?php  ?></td>
        </tr>  
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusPopup" checked="checked" value=1 /></td>
        </tr> 
        <tr>
        	<td><label>Liên kết</label><br /><input type="text" name="linksPopup" value="<?php if(isset($_POST['linksPopup'])) {echo $_POST['linksPopup'];}else{ echo $dataOld['links'];} ?>" /></td>
        </tr>                
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsPopup" rows="5" cols="40"><?php if(isset($_POST['descriptionsPopup'])) {echo $_POST['descriptionsPopup'];}else{ echo $dataOld['descriptions'];} ?></textarea><?php if(form_error('namePopup')) echo form_error('namePopup'); ?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>