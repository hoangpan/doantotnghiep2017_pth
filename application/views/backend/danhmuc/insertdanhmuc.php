<h2>thêm mới danh mục</h2>
<div id="main">
	<form method="post">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên danh mục</label><br /><input type="text" name="tendm" /><span><?php if(form_error('tendm')) echo form_error('tendm'); ?></span></td>
        </tr>       
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
