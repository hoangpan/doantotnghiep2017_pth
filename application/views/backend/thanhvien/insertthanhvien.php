<h2>thêm mới slide</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tài khoản</label><br /><input type="text" name="taikhoan" /><span><?php if(form_error('taikhoan')) echo form_error('taikhoan'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Mật khẩu</label><br /><input type="password" name="matkhau" /><span><?php if(form_error('matkhau')) echo form_error('matkhau'); ?></span></td>
        </tr>
        <tr>
        	<td><label>Quyền truy cập</label><br /><input type="text" name="quyentruycap" /><span><?php if(form_error('quyentruycap')) echo form_error('quyentruycap'); ?></span></td>
        </tr>
          
              
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
