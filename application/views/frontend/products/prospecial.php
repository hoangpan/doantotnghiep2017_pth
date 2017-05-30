<div class="prd-block">
    <h2>sản phẩm đặc biệt</h2>
    <div class="pr-list">
    <?php
        $i=0;
        foreach($proSpecial as $row){
    ?>
        <div class="prd-item">
            <a class="prd-img-detail" href="fproducts/detail/<?php echo $row['id_sp']; ?>"><img width="110" height="150" src="public/images/admin/<?php echo $row['anh_sp']; ?>" /></a>
            <h3><a href="fproducts/detail/<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row['trang_thai']; ?></p>
            <p class="price"><span>Giá: <?php echo $row['gia_sp']; ?> VNĐ</span></p>
        </div> 
        
        <div class="prd-info">                        
            <h3><?php echo $row['ten_sp']; ?></h3>
            <div class="prd-img-toolTip">
                <img alt="ảnh sản phẩm" src="public/images/admin/<?php echo $row['anh_sp']; ?>" />
            </div>
            <ul>               
                <li><span>Bảo hành: </span><?php echo $row['bao_hanh']; ?></li><br />
                <li><span>Phụ kiện: </span><?php echo $row['phu_kien']; ?></li><br />
                <li><span>Tình Trạng: </span><?php echo $row['tinh_trang']; ?></li><br />
                <li><span>Khuyến mại: </span><?php echo $row['khuyen_mai']; ?></li><br />  
                <li><span>Trạng thái: </span><?php echo $row['trang_thai']; ?></li> <br />                              
            </ul>            
        </div>                    
    <?php 
        $i++;
        if($i%3==0){
            echo '<div class="clear"></div>';
        }
    } ?>        
    </div>
</div>