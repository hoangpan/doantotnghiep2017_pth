<!DOCTYPE HTML>
<html>
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="public/css/backend/dangnhap.css" />
</head>
<body>
    <form method="post">
    <div id="form-login">
    	<h2><?php //if(isset($error)) echo '<span>'.$error.'</span>'; else echo 'dang nh?p h? th?ng qu?n tr?'; ?>Đăng nhập hệ thống</h2>
        <ul>
            <li><label>tài khoản</label><input type="text" name="tk" /><span class="error_valid"><?php if(form_error('tk')) echo form_error('tk'); ?></span></li>
            <li><label>mật khẩu</label><input type="password" name="mk" /><span class="error_valid"><?php if(form_error('mk')) echo form_error('mk'); ?></span></li>
            <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
            <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
        </ul>
    </div>
    </form>
</body>
</html>
