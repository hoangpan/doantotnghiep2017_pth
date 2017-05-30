<script lang="javascript">
    function xoaKH(){
        var xoaKH = confirm("Bạn muốn xóa khách hàng này?");
        return xoaKH;
    }
</script>
<h2>quản lý khách hàng</h2>
<div id="main">
<form method="post" action="">    
	<p id="add-prd">
         <span><input type="submit" name="submit" value="Cập nhật" /></span> 
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="20%">Tên Khách Hàng</td>            
            <td width="20%">Email</td>            
            <td width="20%">Điện thoại</td>            
            <td width="20%">Địa chỉ</td>            
           
            
           
            <td width="5%">Xóa</td>
        </tr>                
        <?php        
            foreach($khachhang as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id_kh'];?></span></td>
            <td class="l5"><?php echo $rows['ten_kh'];?></td>
            <td class="l5"><?php echo $rows['email'];?></td>
            <td class="l5"><?php echo $rows['dien_thoai'];?></td>
            <td class="l5"><?php echo $rows['dia_chi'];?></td>
      
        
            <td><a onclick="return xoaKH();" href="admin/khachhang/delkhachhang/<?php echo $rows['id_kh']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
    <p id="pagination"><?php //echo $list; ?></p>
</div>