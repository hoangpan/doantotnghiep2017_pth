<div class="prd-block">
    <h2>kết quả tìm được với từ khóa <span class="skeyword">"<?php echo $stext; ?>"</span></h2>
    <div class="pr-list">
    <?php
        $i = 1;
        foreach($proSearch as $row){
    ?>        
        <div class="prd-item">
            <a href="fproducts/detail/<?php echo $row['id_sp']; ?>"><img width="80" height="144" src="public/images/admin/<?php echo $row['anh_sp']; ?>" /></a>
            <h3><a href="fproducts/detail/<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh']; ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang']; ?></p>
            <p class="price"><span>Giá: <?php echo $row['gia_sp']; ?> VNĐ</span></p>
        </div>
        
        <div class="prd-info">                        
            <h3><?php echo $row['ten_sp']; ?></h3>
            <ul>               
                <li><span>Bảo hành: </span><?php echo $row['bao_hanh']; ?></li><br />
                <li><span>Phụ kiện: </span><?php echo $row['phu_kien']; ?></li><br />
                <li><span>Tình Trạng: </span><?php echo $row['tinh_trang']; ?></li><br />
                <li><span>Khuyến mại: </span><?php echo $row['khuyen_mai']; ?></li><br />  
                <li><span>Trạng thái: </span><?php echo $row['trang_thai']; ?></li> <br />
                <li><span>Chi tiết: </span><?php echo $row['chi_tiet_sp']; ?></li><br />                 
            </ul>            
        </div>    
       <?php 
            }
       ?> 
            <div class="clear"></div>        
               
    </div>
</div>
<span class="pagination"><?php echo $this->pagination->create_links(); ?></span>
