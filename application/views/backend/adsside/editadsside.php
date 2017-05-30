<h2>sửa thông tin Adsside</h2>

<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên Adsside</label><br /><input type="text" name="nameAds" value="<?php if(isset($_POST['nameAds'])) {echo $_POST['nameAds'];}else{ echo $dataOld['name'];} ?>" /><?php if(form_error('nameAds')) echo form_error('nameAds'); ?></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="imagesAds" /><input name="imagesAds" type="hidden" value="<?php echo $dataOld['images']; ?>" /><?php  ?></td>
        </tr>  
        <tr>
        	<td><label>Liên kết</label><br /><input type="text" name="linksAds" value="<?php if(isset($_POST['LinksAds'])) {echo $_POST['LinksAds'];}else{ echo $dataOld['links'];} ?>" /><?php if(form_error('LinksAds')) echo form_error('LinksAds'); ?></td>
        </tr> 
        <tr>
        	<td><label>Trái - Phải</label><br /><input type="checkbox" name="sideAds" value=1 <?php if($dataOld['side'] == 1) echo 'checked'; ?> />
            <span>
            (Chọn - Hiển thị bên trái |
             Không chọn - Hiển thị bên phải)
            </span>
            </td>            
        </tr>     
        <tr>
        	<td><label>Trạng thái</label><br /><input type="checkbox" name="statusAds" value=1 <?php if($dataOld['status'] == 1) echo 'checked'; ?> />
            <span>
            (Chọn - Hiển thị |
             Không chọn - Không hiển thị)
            </span>
            </td>
        </tr>              
        <tr>
        	<td><label>Mô tả</label><br /><textarea name="descriptionsAds" rows="5" cols="40"><?php if(isset($_POST['descriptionsAds'])) {echo $_POST['descriptionsAds'];}else{ echo $dataOld['descriptions'];} ?></textarea><?php if(form_error('descriptionsAds')) echo form_error('descriptionsAds'); ?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>