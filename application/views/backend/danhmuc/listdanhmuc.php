<script lang="javascript">
    function xoaDM(){
        var xoaDM = confirm("Bạn muốn xóa danh mục này?");
        return xoaDM;
    }
</script>
<h2>quản lý danh mục</h2>
<div id="main">
<form method="post" action="admin/danhmuc/updatedanhmuc">    
	<p id="add-prd">
        <a href="admin/danhmuc/adddanhmuc"><span>thêm danh mục mới</span></a>
        
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="2%">ID</td>
            <td width="20%">Tên Danh Mục</td>            
           
            
            <td width="2%">Sửa</td>
            <td width="2%">Xóa</td>
        </tr>                
        <?php        
            foreach($danhmuc as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id_dm'];?></span></td>
            <td class="l5"><?php echo $rows['ten_dm'];?></td>
      
            
            <td><a href="admin/danhmuc/editdanhmuc/<?php echo $rows['id_dm']; ?>"><span style="color:blue;"><img src="public/images/admin/b_edit.png"/></span></a></td>
            <td><a onclick="return xoaDM();" href="admin/danhmuc/deldanhmuc/<?php echo $rows['id_dm']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
    <p id="pagination"><?php //echo $list; ?></p>
</div>