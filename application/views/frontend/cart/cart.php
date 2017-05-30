<div class="prd-block">    
<h2>giỏ hàng của bạn</h2>    
<div class="cart">
<form id="giohang" method="post" action="<?php echo base_url(); ?>fcart/editcart">
    <?php
    if(!empty($list_cart)){
        $i = 1;
        foreach($list_cart as $row){
            
    ?>
	<table width="100%">			
        <tr>
        <?php 
            if ($this->cart->has_options($row['rowid']) == TRUE){
                foreach($this->cart->product_options($row['rowid']) as $option_name => $option_value){                               ?>
			<td class="cart-item-img" width="25%" rowspan="4"><img width="80" height="144" src="public/images/admin/<?php echo $option_value; ?>" /></td>
        <?php 
                } 
            }
        ?>
			<td width="25%">Sản phẩm:</td>
			<td class="cart-item-title" width="50%"><?php echo $row['name']; ?></td>
		</tr>
		<tr>
			<td>Giá:</td>
			<td><span><?php echo $row['price']; ?> VNĐ</span></td>
		</tr>
		<tr>
			<td>Số lượng: </td>
			<td>
            <input type="hidden" name="<?php echo 'id'.$i; ?>" value="<?php echo $row['rowid']; ?>" />
            <input  type="text"  name="<?php echo 'sl'.$i; ?>"  value="<?php echo $row['qty']; ?>"  />  (Bỏ  mặt  hàng  này)  <a 
    href="fcart/delAproduct/<?php echo $row['rowid']; ?>">X</a></td>
		</tr>
		<tr>
			<td>Tổng tiền:</td>
			<td><span><?php echo $row['subtotal']; ?> VNĐ</span></td>
		</tr>            
	</table>
    <?php 
    $i++;
    } ?>
</form>
    
	<p>Tổng giá trị giỏ hàng là: <span><?php echo $total_price; ?> VNĐ</span></p>
	<p class="update-cart"><button onclick="document.getElementById('giohang').submit();"><span>cập nhật giỏ hàng</span></button></p>
    
	<p>
        <a href="fproducts">Bổ sung sản phẩm</a> <span>•</span> 
        <a href="fcart/deletecart">Xóa hết sản phẩm</a> <span>•</span> 
        <a href="fcart/paymentcart">Dừng mua và Thanh toán</a>
    </p>   
</div> 
<?php
}else {
    echo  '
    <script>
        alert("Hiện  không  có  Sản  phẩm  nào  trong  Giỏ  hàng  của bạn!");
    </script>';
}
?> 
</div>