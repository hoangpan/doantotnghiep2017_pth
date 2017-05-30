<div class="prd-block">
    <div class="prd-only">
		<div class="prd-img"><img width="50%" src="public/images/admin/<?php echo $product['anh_sp']; ?>" /></div>	
		<div class="prd-intro">
			<h3><?php echo $product['ten_sp']; ?></h3>
			<p>Giá sản phẩm: <span><?php echo $product['gia_sp']; ?> VNĐ</span></p>
			<table>
				<tr>
					<td width="30%"><span>Bảo hành:</span></td>
					<td>• <?php echo $product['bao_hanh']; ?></td>
				</tr>
				<tr>
					<td><span>Đi kèm:</span></td>
					<td>• <?php echo $product['phu_kien']; ?></td>
				</tr>
				<tr>
					<td><span>Tình trạng:</span></td>
					<td>• <?php echo $product['tinh_trang']; ?></td>
				</tr>
				<tr>
					<td><span>Khuyến Mại:</span></td>
					<td>• <?php echo $product['khuyen_mai']; ?></td>
				</tr>
				<tr>
					<td><span>Còn hàng:</span></td>
					<td>• <?php echo $product['trang_thai']; ?></td>
				</tr>
			</table>
			<p class="add-cart"><a href="fcart/addcart/<?php echo $product['id_sp']; ?>"><span>đặt mua</span></a></p>
            <p id="but-fb">
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                
                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            </p>
		</div>
		
		<div class="clear"></div>
		
		<div class="prd-details">
		<p><?php echo $product['chi_tiet_sp']; ?></p>
		</div>
	</div>
	
	<div class="prd-comment">
	<video width="320" height="180" controls autoplay loop>
       <source src="public/video/quangcao.mp4" type="video/mp4">
        Trình duyệt không hổ trợ tính năng này.
    </video>
	<h3>Bình luận sản phẩm</h3>
	<form method="post">
		<ul>
			<li class="required">Tên <br /><input type="text" name="ten" /> <span><?php if(form_error('ten')) echo form_error('ten'); ?></span></li>
			<li class="required">Số điện thoại <br /><input type="text" name="dien_thoai" /> <span><?php if(form_error('dien_thoai')) echo form_error('dien_thoai'); ?></span></li>
			<li class="required">Nội dung <br /><textarea name="binh_luan"></textarea> <span><?php if(form_error('binh_luan')) echo form_error('binh_luan'); ?></span></li>
			<li><input type="submit" name="submit" value="Bình luận" /></li>
		</ul>
	</form>
	</div>
	
	<div class="comment-list">
    <?php 
        foreach($comment as $row){
    ?>
		<ul>
			<li class="com-title"><?php echo $row['ten']; ?><br /><span><?php echo $row['ngay_gio']; ?></span></li>
			<li class="com-details"><?php echo $row['binh_luan']; ?></li>
		</ul>
	<?php } ?>
	</div>
	
	<div class="com-pagination"></div>
</div>    