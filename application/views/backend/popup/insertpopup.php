<h2>thêm mới popup</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên Popup</label><br /><input type="text" name="namePopup" /><span><?php if(form_error('namePopup')) echo form_error('namePopup'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesPopup" /></td>
        </tr>    
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusPopup" checked="checked" value=1 /></td>
        </tr>   
        <tr>
        	<td><label>Liên kết</label><br /><input type="text" name="linksPopup"  /></td>
        </tr>           
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsPopup" rows="5" cols="40"></textarea><span><?php if(form_error('descriptionsPopup')) echo form_error('descriptionsPopup'); ?></span></td>
        </tr>        
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
