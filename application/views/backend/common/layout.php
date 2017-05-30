
<!DOCTYPE HTML>
<html>
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8" />
    <title>Trang chủ quản trị</title>
    <link rel="stylesheet" type="text/css" href="public/css/backend/quantri.css" />
    <?php if(isset($css)){ echo '<link rel="stylesheet" type="text/css" href="public/css/backend/'.$css.'" />'; } ?>
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="navbar">
        	<ul>
            	<li id="admin-home"><a href="admin/cpanel">quản trị</a></li>
                <li><a href="admin/thanhvien">thành viên</a></li>
                <li><a href="admin/danhmuc">Danh mục</a></li>
                <li><a href="admin/products">sản phẩm</a></li>
                <li><a href="admin/donhang">Đơn hàng</a></li>
                <li><a href="admin/khachhang">Khách Hàng</a></li>
                <li><a href="admin/comment">Bình luận</a></li>
                <li><a href="admin/banner">banner</a></li>
                <li><a href="admin/slide">slide</a></li>
                <li><a href="admin/popup">popup</a></li>
                <!-- <li><a href="admin/adsside">adsside</a></li> -->
                <li><a target="_blank" href="fproducts">xem website</a></li>
            </ul>
            <div id="user-info">
            	<p>Xin chào <span><?php echo $username->tai_khoan; ?></span> đã đăng nhập hệ thống!</p>
                <p><a href="admin/user/userLogout">Đăng xuất</a></p>
            </div>
        </div>
        <div id="banner">
        	<div id="logo"><a href="admin/cpanel"><img src="public/images/common/logo2.jpg" /></a></div>
        </div>
    </div>
    <div id="body">
        <?php if(isset($_content)) $this->load->view($_content); ?>
    </div>
     <div id="footer">
    	<div id="footer-info">
        	<h4>Cửa hàng công nghệ mobile trực tuyến</h4>
            <p><span>Địa chỉ:</span> Tầng 5, Tòa nhà VTC, Tam trinh - Hoàng Mai - Hà Nội | <span>Phone</span> (04) 3537 6697</p>
            <p><span>Trụ sở 2:</span> Số 25/Phòng 03 KTX B5b - Bách Khoa - Hà Nội | <span>Hotline</span> 0968 511 155</p>
            <p>COPYRIGHT © 2017 CỬA HÀNG CÔNG NGHỆ MOBILE TRỰC TUYẾN</p>
        </div>
    </div>
</div>
</body>
</html>
