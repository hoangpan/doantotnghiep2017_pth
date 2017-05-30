<!DOCTYPE HTML>
<html>
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bán Hàng Trực Tuyến</title>
    <link rel="stylesheet" type="text/css" href="public/css/frontend/trangchu.css" />
    <link rel="stylesheet" type="text/css" href="public/css/frontend/slideshow.css" />
    <link rel="stylesheet" type="text/css" href="public/css/frontend/backtotop.css" />
    <link rel="stylesheet" type="text/css" href="public/css/frontend/popup.css" />
    <link rel="stylesheet" type="text/css" href="public/css/frontend/adsside.css" />
    <?php if(isset($css)) echo '<link rel="stylesheet" type="text/css" href="public/css/frontend/'.$css.'" />'; ?>

<script type="text/javascript" src="public/js/jquery-1.2.6.min.js"></script>
<script src="public/js/timkiem.js" ></script>
<script src="public/js/slide.js" ></script>
<script src="public/js/backtotop.js" ></script>
<script src="public/js/popup.js" ></script>
<script src="public/js/adsside.js" ></script>
<script src="public/js/tooltip.js" ></script>
 
</head>
<body>
<!-- add 2 ben -->
        <?php $this->load->view('frontend/common/quangcao/adsside.php'); ?>
<!-- Wrapper -->
<div id="wrapper">    
        
	<!-- Header -->
    <div id="header">
    	<div id="search-bar">
        	<?php $this->load->view('frontend/common/timkiem/timkiem.php');?>
            <?php $this->load->view('frontend/common/giohang/giohangcuaban.php');?>
        </div>
        <div id="main-bar">
        	<div id="logo"><a href="fproducts"><img src="public/images/common/logo2.jpg" /></a></div>
            <div id="banner"></div>
        </div>
        <div id="navbar">
        	<?php $this->load->view('frontend/common/menungang/menungang.php');?>
        </div>
    </div>
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
        <!-- popup -->
        <?php   
            if(isset($popupCondition) && $popupCondition == 'show') {                             
                $this->load->view('frontend/common/popup/popup');
            }                      
        ?>  
    	<!-- Left Column -->
    	<div id="l-col">
        	<?php $this->load->view('frontend/common/tuvan/tuvan.php');?>
            <?php $this->load->view('frontend/common/sanpham/danhmucsp.php');?>
            <?php $this->load->view('frontend/common/quangcao/quangcao.php');?>
            <?php $this->load->view('frontend/common/thongke/thongke.php');?>
            <!-- <div class="l-sidebar"></div> -->
        </div>
        <!-- End Left Column -->
        
        <!-- Right Column -->
        <div id="r-col">
        	<?php $this->load->view('frontend/common/slideshow/slideshow.php');?>
            
            <div id="main">
            	<?php if(isset($_content)) $this->load->view($_content); ?>
                <?php if(isset($_content2)) $this->load->view($_content2); ?>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
      <script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; 
      ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=5472d5363999c7e192ec82cb0176813c&data=eyJzc29faWQiOjEwNDAwNDMsImhhc2giOiI4ZWQxYTlhYzhmMDdlYjEzNjYxMjA0OGYyMWU5ODY3NSJ9&pname='+pname;
      var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script> 
    <!-- End Body -->
  
    <!-- Footer -->
    <div id="footer">
    	<div id="footer-info">
        	<h4>Cửa hàng công nghệ mobile trực tuyến</h4>
            <p><span>Địa chỉ:</span> Tầng 5, Tòa nhà VTC, Tam Trinh - Hoàng Mai - Hà Nội | <span>Phone</span> (04) 3537 6697</p>
            <p><span>Trụ sở 2:</span> Số 25/Phòng 03 KTX B5b - Bách Khoa - Hà Nội | <span>Hotline</span> 0968 511 155</p>
            <p>COPYRIGHT © 2017 CỪA HÀNG CÔNG NGHỆ MOBILE TRỰC TUYẾN</p>
        </div>
    </div>
    <!-- End Footer -->
</div>
<!-- End Wrapper -->

<!-- back-to-top -->
<div id="goTop">
	<img src="public/images/common/backtop.jpg" alt="Back to top" />
</div>

</body>
</html>
