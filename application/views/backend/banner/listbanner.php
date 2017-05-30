<script lang="javascript">
    function xoaSP(){
        var xoaSP = confirm("Bạn muốn xóa Banner này?");
        return xoaSP;
    }
</script>
<h2>quản lý Banner</h2>
<div id="main">
<form method="post" action="admin/banner/updatebanner">    
	<p id="add-prd">
        <a href="admin/banner/addbanner"><span>thêm banner mới</span></a>
        <span><input type="submit" name="submit" value="Cập nhật" /></span>
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="30%">Tên Banner</td>            
            <td width="30%">Mô tả</td>
            <td width="20%">Ảnh mô tả</td>
            <td width="5%">Hiển thị</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>                
        <?php        
            foreach($banner as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id'];?></span></td>
            <td class="l5" ><a style="color:blue;" href="admin/banner/editbanner/<?php echo $rows['id']; ?>"><?php echo $rows['name'];?></a></td>            
            <td class="l5"><?php echo $rows['descriptions'];?></td>
            <td><span class="thumb"><img width="60" src="public/images/admin/banner/<?php echo $rows['images'];?>" /></span></td>
            <td><span><input type="checkbox" name="showBanner[]" value="<?php echo $rows['id']; ?>" <?php if($rows['status'] == 1){ echo "checked='checked'"; } ?> /></span></td>
            <td><a href="admin/banner/editbanner/<?php echo $rows['id']; ?>"><span style="color:blue;"><img src="public/images/admin/b_edit.png"/></span></a></td>
            <td><a onclick="return xoaSP();" href="admin/banner/delbanner/<?php echo $rows['id']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
    <p id="pagination"><?php //echo $list; ?></p>
</div>