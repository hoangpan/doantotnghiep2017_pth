<script lang="javascript">
    function xoaSP(){
        var xoaSP = confirm("Bạn muốn xóa sản phẩm này?");
        return xoaSP;
    }
</script>

<h2>quản lý sản phẩm</h2>
<div id="main">
	<p id="add-prd"><a href="admin/products/addproduct"><span>thêm sản phẩm mới</span></a></p>
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="40%">Tên sản phẩm</td>
            <td width="15%">Giá</td>
            <td width="20%">Nhà cung cấp</td>
            <td width="10%">Ảnh mô tả</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
        <?php
            //while($rows = mysql_fetch_array($query)){
            foreach($products as $rows){
        ?>
        <tr>
        	<td><span><?php echo $rows['id_sp'];?></span></td>
            <td class="l5" ><a style="color:blue;" href="admin/products/editproduct/<?php echo $rows['id_sp']; ?>"><?php echo $rows['ten_sp'];?></a></td>
            <td class="l5"><span class="price"><?php echo $rows['gia_sp'];?> VNĐ</span></td>
            <td class="l5"><?php echo $rows['ten_dm'];?></td>
            <td><span class="thumb"><img width="60" src="public/images/admin/<?php echo $rows['anh_sp'];?>" /></span></td>
            <td><a href="admin/products/editproduct/<?php echo $rows['id_sp']; ?>"><span style="color:blue;"><img src="public/images/admin/b_edit.png"/></span></a></td>
            <td><a onclick="return xoaSP();" href="admin/products/delproduct/<?php echo $rows['id_sp']; ?>"><span style="color:blue;"><img src="public/images/admin/b_drop.png"/></span></a></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
</div>