<div class="prd-block"> 
    <h2>xác nhận hóa đơn thanh toán</h2>
	<div class="payment">
		<table border="0px" cellpadding="0px" cellspacing="0px" width="100%">
			<tr id="invoice-bar">
				<td width="45%">Tên Sản phẩm</td>
				<td width="20%">Giá</td>
				<td width="15%">Số lượng</td>
				<td width="20%">Thành tiền</td>
			</tr>
            
			<?php			
                foreach($list_cart as $row){				
			?>
			<tr>
				<td class="prd-name"><?php echo $row['name'];?></td>
				<td class="prd-price"><?php echo $row['price'];?> VNĐ</td>
				<td class="prd-number"><?php echo $row['qty'];?></td>
				<td class="prd-total"><?php echo $row['subtotal'];?> VNĐ</td>
			</tr>
            <?php				
			     }
			?>
            
			<tr>
				<td class="prd-name">Tổng giá trị hóa đơn là:</td>
				<td colspan="2"></td>
				<td class="prd-total"><span><?php echo $total_price;?> VNĐ</span></td>
			</tr>
		</table>
	
	</div>	    
        
	<div class="form-payment">
    <?php if(isset($email_error)) echo $email_error; ?>
		<form method="post" action="">
		<ul>
			<li class="info-cus"><label>Tên khách hàng</label><br /><input type="text" name="ten" /> <?php if(form_error('ten')){echo form_error('ten'); }?></li>
			<li class="info-cus"><label>Địa chỉ Email</label><br /><input type="text" name="email" /> <?php if(form_error('email')){echo form_error('email'); }?></li>
			<li class="info-cus"><label>Số Điện thoại</label><br /><input type="text" name="dt" /> <?php if(form_error('dt')){echo form_error('dt'); }?></li>
			<li class="info-cus"><label>Địa chỉ nhận hàng</label><br /><input type="text" name="dc" /> <?php if(form_error('dc')){echo form_error('dc'); }?></li>
			<li><input type="submit" name="submit" value="Xác nhận mua hàng" /> <input type="reset" name="reset" value="Làm lại" /></li>
            <li>
                <a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=hoanghoakhet32@gmail.com&product_name=thehoang-mobile&price=<?php echo $total_price; ?>&return_url=hoanthanh.php&comments=thanh-cong" ><img src="https://www.nganluong.vn/data/images/buttons/11.gif"  border="0" /></a> 
            </li>
		</ul>
		</form>
	</div>
</div>    