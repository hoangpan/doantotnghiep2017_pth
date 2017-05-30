<script lang="javascript">
    function xoaSP(){
        var xoaSP = confirm("Bạn muốn xóa adsside này?");
        return xoaSP;
    }
</script>
<h2>quản lý adsside</h2>
<div id="main">
<form method="post" action="admin/adsside/updateadsside">    
	<p id="add-prd">
        <a href="admin/adsside/addadsside"><span>thêm adsside mới</span></a>
        <span><input type="submit" name="submit" value="Cập nhật" /></span>
    </p>        
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="15%">Tên adsside</td>            
            <td width="20%">Mô tả</td>
            <td width="20%">Ảnh mô tả</td>
            <td width="20%">Liên kết</td>
            <td width="5%">Trái - Phải</td>
            <td width="5%">Hiển thị</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>               
        <?php        
            foreach($adsside as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id'];?></span></td>
            <td class="l5" ><a style="color:blue;" href="admin/adsside/editadsside/<?php echo $rows['id']; ?>"><?php echo $rows['name'];?></a></td>            
            <td class="l5"><?php echo $rows['descriptions'];?></td>
            <td><span class="thumb"><img width="100" height="150px" src="public/images/admin/adsside/<?php echo $rows['images'];?>" /></span></td>
            <td class="l5"><input name="linksAdsside[<?php echo $rows['id']; ?>]" value="<?php echo $rows['links'];?>" /></td>
            <td><span><input type="checkbox" name="sideAdsside[]" value="<?php echo $rows['id']; ?>" <?php if($rows['side'] == 1){ echo "checked='checked'"; } ?> /></span></td>
            <td><span><input type="checkbox" name="showAdsside[]" value="<?php echo $rows['id']; ?>" <?php if($rows['status'] == 1){ echo "checked='checked'"; } ?> /></span></td>
            <td><a href="admin/adsside/editadsside/<?php echo $rows['id']; ?>"><span style="color:blue;"><img src="public/images/admin/b_edit.png"/></span></a></td>
            <td><a onclick="return xoaSP();" href="admin/adsside/deladsside/<?php echo $rows['id']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>       
        <?php } ?> 
        </form>
    </table>
    <p id="pagination"><?php //echo $list; ?></p>
</div>