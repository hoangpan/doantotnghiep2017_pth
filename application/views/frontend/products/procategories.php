<div class="prd-block">   
    <h2><?php echo $cat['ten_dm']; ?></h2>
    <div class="pr-list">
    <?php        
        foreach($proCat as $rows){
    ?>
        <div class="prd-item">
            <a class="prd-img-detail" href="fproducts/detail/<?php echo $rows['id_sp']; ?>"><img width="110" height="150" src="public/images/admin/<?php echo $rows['anh_sp']; ?>" /></a>
            <h3><a href="fproducts/detail/<?php echo $rows['id_sp']; ?>"><?php echo $rows['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $rows['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $rows['tinh_trang']; ?></p>
            <p class="price"><span>Giá: <?php echo $rows['gia_sp']; ?> VNĐ</span></p>
        </div>
        
        <div class="prd-info">                        
            <h3><?php echo $rows['ten_sp']; ?></h3>
            <div class="prd-img-toolTip">
                <img alt="ảnh sản phẩm" src="public/images/admin/<?php echo $rows['anh_sp']; ?>" />
            </div>
            <ul>               
                <li><span>Bảo hành: </span><?php echo $rows['bao_hanh']; ?></li><br />
                <li><span>Phụ kiện: </span><?php echo $rows['phu_kien']; ?></li><br />
                <li><span>Tình Trạng: </span><?php echo $rows['tinh_trang']; ?></li><br />
                <li><span>Khuyến mại: </span><?php echo $rows['khuyen_mai']; ?></li><br />  
                <li><span>Trạng thái: </span><?php echo $rows['trang_thai']; ?></li> <br />                                
            </ul>            
        </div>   
    <?php } ?>
    <div class="clear"></div>
    </div>
</div>
<span class="pagination"><?php echo $this->pagination->create_links(); ?></span>

    