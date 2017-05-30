<h2>sửa thông tin thành viên</h2>

<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tài khoản</label><br /><input type="text" name="taikhoan" value="<?php if(isset($_POST['taikhoan'])) {echo $_POST['taikhoan'];}else{ echo $dataOld['tai_khoan'];} ?>" /><?php if(form_error('taikhoan')) echo form_error('taikhoan'); ?></td>
        </tr>
       <tr>
        	<td><label>Mật khẩu</label><br /><input type="password" name="matkhau" value="<?php if(isset($_POST['taikhoan'])) {echo $_POST['matkhau'];}else{ echo $dataOld['mat_khau'];} ?>" /><?php if(form_error('matkhau')) echo form_error('matkhau'); ?></td>
        </tr>
        <tr>
        	<td><label>Quyền truy cập</label><br /><input type="text" name="quyentruycap" value="<?php if(isset($_POST['quyentruycap'])) {echo $_POST['quyentruycap'];}else{ echo $dataOld['quyen_truy_cap'];} ?>" /><?php if(form_error('quyentruycap')) echo form_error('quyentruycap'); ?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>