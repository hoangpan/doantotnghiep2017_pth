<h2>thêm mới Adsside</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên Adsside</label><br /><input type="text" name="nameAds" /><span><?php if(form_error('nameAds')) echo form_error('nameAds'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesAds" /><span><?php //if(isset($error_image)) echo $error_image; ?></span></td>
        </tr>
        <tr>
        	<td><label>Liên kết</label><br /><input type="text" name="linksAds" /><?php if(isset($error_link)) echo $error_link; ?></td>
        </tr> 
        <tr>
        	<td><label>Trái - Phải</label><br /><input type="checkbox" name="sideAds" value=1 /><?php if(isset($error_side)) echo $error_side; ?>
            <span>
            (Chọn - Hiển thị bên trái |
             Không chọn - Hiển thị bên phải)
            </span>
            </td>            
        </tr>     
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusAds" checked="checked" value=1 />
            <span>
            (Chọn - Hiển thị |
             Không chọn - Không hiển thị)
            </span>
            </td>
        </tr>     
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsAds" rows="5" cols="40"></textarea><span><?php if(form_error('descriptionsAds')) echo form_error('descriptionsAds'); ?></span></td>
        </tr>        
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
