<script lang="javascript">
    function xoaBL(){
        var xoaBL = confirm("Bạn muốn xóa Comment này?");
        return xoaBL;
    }
</script>
<h2>quản lý Comment</h2>
<div id="main">
<form method="post" action="admin/comment/updatecomment">    
	<p id="add-prd">
        
        
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="20%">Tên</td>   
            <td width="20%">Sản phẩm</td>          
            <td width="20%">Bình luận</td>
            <td width="20%">Điện thoại</td>
            <td width="20%">Thời gian</td>
            
            
            <td width="5%">Xóa</td>
        </tr>                
        <?php        
            foreach($comment as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id_bl'];?></span></td>
            <td class="l5"><?php echo $rows['ten'];?></td>
             <td class="l5"><?php echo $rows['ten_sp'];?></td>
            <td class="l5"><?php echo $rows['binh_luan'];?></td>
            <td class="l5"><?php echo $rows['dien_thoai'];?></td>
            <td class="l5"><?php echo $rows['ngay_gio'];?></td>
           
            
           
            <td><a onclick="return xoaBL();" href="admin/comment/delcomment/<?php echo $rows['id_bl']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
   
</div>