<div class="l-sidebar">
    <h2>hãng điện thoại</h2>
    <ul id="main-menu">
        <?php
            foreach($categories as $row){
        ?>
        <li><a href="fproducts/productsCat/<?php echo $row['id_dm']; ?>"><?php echo $row['ten_dm']; ?></a></li>
        <?php } ?>
    </ul>
</div>