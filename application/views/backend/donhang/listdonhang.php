<script lang="javascript">
    function xoaDH(){
        var xoaDH = confirm("Bạn muốn xóa đơn hàng này?");
        return xoaDH;
    }
</script>
<h2>quản lý Đơn hàng</h2>
<div id="main">
<form method="post" >    
	<p id="add-prd">
        
        <span><input type="submit" name="submit" value="Cập nhật" /></span>
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID_DH</td>
            <td width="5%">ID_GD</td>            
            <td width="5%">ID_SP</td>
            <td width="30%">Tên sản phẩm</td>
            <td width="10%">Giá sản phẩm</td>
            <td width="8%">Số lượng</td>
            <td width="10%">Thời gian</td>
            
        
            <td width="5%">Xóa</td>
        </tr>                
        <?php        
            foreach($donhang as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id_dh'];?></span></td>
        	<td><span><?php echo $rows['id_gd'];?></span></td>
        	<td><span><?php echo $rows['id_sp'];?></span></td>
            <td class="l5"><?php echo $rows['ten_sp'];?></td>
            <td class="l5"><?php echo $rows['gia_sp'];?></td>
            <td class="l5"><?php echo $rows['so_luong'];?></td>
            <td class="l5"><?php echo $rows['thoi_gian_dh'];?></td>
           
            
        
            <td><a onclick="return xoaDH();" href="admin/donhang/deldonhang/<?php echo $rows['id_dh']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
    <p id="pagination"><?php //echo $list; ?></p>
</div>