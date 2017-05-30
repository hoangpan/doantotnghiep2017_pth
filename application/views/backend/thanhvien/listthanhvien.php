<script lang="javascript">
    function xoaTV(){
        var xoaTV = confirm("Bạn muốn xóa Thành viên này?");
        return xoaTV;
    }
</script>
<h2>quản lý Thành Viên</h2>
<div id="main">
<form method="post" action="admin/thanhvien/updatethanhvien">    
	<p id="add-prd">
        <a href="admin/thanhvien/addthanhvien"><span>thêm thành viên mới</span></a>
      
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="20%">Tài khoản</td>            
            <td width="20%">Mật khẩu</td>
            <td width="20%">Quyền truy cập</td>
            
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>                
        <?php        
            foreach($thanhvien as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id_thanhvien'];?></span></td>
            <td class="l5"><?php echo $rows['tai_khoan'];?></td>
            <td class="l5"><?php echo $rows['mat_khau'];?></td>
            <td class="l5"><?php echo $rows['quyen_truy_cap'];?></td>
           
            
            <td><a href="admin/thanhvien/editthanhvien/<?php echo $rows['id_thanhvien']; ?>"><span style="color:blue;"><img src="public/images/admin/b_edit.png"/></span></a></td>
            <td><a onclick="return xoaTV();" href="admin/thanhvien/delthanhvien/<?php echo $rows['id_thanhvien']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
    <p id="pagination"><?php //echo $list; ?></p>
</div>