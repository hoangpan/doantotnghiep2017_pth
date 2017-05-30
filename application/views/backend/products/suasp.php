<h2>sửa thông tin sản phẩm</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php echo $dataOld['ten_sp']; ?>" /><span class="error_valid"><?php if(form_error('ten_sp')) echo form_error('ten_sp'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /><input type="hidden" name="anh_sp" value="<?php echo $dataOld['anh_sp']; ?>" /><span class="error_valid"><?php if(form_error('anh_sp')) echo form_error('anh_sp'); ?></span></td>
        </tr>
        <tr>        
       	    <td><label>Nhà cung cấp</label><br />
            	<select name="id_dm">
                    <option value="unselect">Lựa chọn nhà cung cấp</option>
                    <?php                        
                        foreach($categories as $category){                            
                    ?>                    
                    <option <?php if($dataOld['id_dm'] == $category['id_dm']) echo 'selected'; ?> value='<?php if($category['id_dm'] != 'unselect') echo $category['id_dm']; else  echo $dataOld['id_dm']; ?>'><?php echo $category['ten_dm']; ?></option>                                        
                    <?php } ?>
                </select> 
                <span class="error_valid"><?php if(form_error('id_dm')) echo form_error('id_dm'); ?></span>		               	
            </td>
        </tr>
        <tr>
        	<td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" value="<?php echo $dataOld['gia_sp']; ?>" /> VNĐ<span class="error_valid"><?php if(form_error('gia_sp')) echo form_error('gia_sp'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Bảo hành</label><br /><input type="text" name="bao_hanh" value="<?php echo $dataOld['bao_hanh']; ?>" /><span class="error_valid"><?php if(form_error('bao_hanh')) echo form_error('bao_hanh'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Đi kèm</label><br /><input type="text" name="phu_kien" value="<?php echo $dataOld['phu_kien']; ?>" /><span class="error_valid"><?php if(form_error('phu_kien')) echo form_error('phu_kien'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="<?php echo $dataOld['tinh_trang']; ?>" /><span class="error_valid"><?php if(form_error('tinh_trang')) echo form_error('tinh_trang'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="<?php echo $dataOld['khuyen_mai']; ?>" /><span class="error_valid"><?php if(form_error('khuyen_mai')) echo form_error('khuyen_mai'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Còn hàng</label><br /><input type="text" name="trang_thai" value="<?php echo $dataOld['trang_thai']; ?>" /><span class="error_valid"><?php if(form_error('trang_thai')) echo form_error('trang_thai'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Sản phẩm đặc biệt</label><br />Có <input type="radio" name="dac_biet" value=1 <?php if(isset($dataOld['dac_biet']) == 1 ) echo 'checked="checked"'; ?> /> Không <input type="radio" name="dac_biet" value=0 <?php if(isset($dataOld['dac_biet']) == 0 ) echo 'checked="checked"'; ?> /></td>
        </tr>
        <tr>
        	<td><label>Thông tin chi tiết sản phẩm</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"><?php if(isset($_POST['chi_tiet_sp'])) echo $_POST['chi_tiet_sp']; else echo $dataOld['chi_tiet_sp']; ?></textarea><span class="error_valid"><?php if(form_error('chi_tiet_sp')) echo form_error('chi_tiet_sp'); ?></span></td>
        </tr>
        <tr>
        	<td><input type="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>