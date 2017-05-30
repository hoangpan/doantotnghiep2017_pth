<div id="cart">
    <p>Bạn đang có <span><?php 
        if(isset($cartItem)) echo $cartItem; else echo '0';
     ?></span> sản phẩm</p>
    <p><a href="fcart/index">Chi tiết giỏ hàng</a></p>
</div>