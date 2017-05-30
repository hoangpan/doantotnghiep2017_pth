<h2>thêm mới banner</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên banner</label><br /><input type="text" name="nameBner" /><span><?php if(form_error('nameBner')) echo form_error('nameBner'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesBner" /><span><?php //if(isset($error_image)) echo $error_image; ?></span></td>
        </tr>    
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusBner" checked="checked" value=1 /></td>
        </tr>     
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsBner" rows="5" cols="40"></textarea><span><?php if(form_error('descriptionsBner')) echo form_error('descriptionsBner'); ?></span></td>
        </tr>        
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
