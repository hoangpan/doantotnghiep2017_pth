<div id="popup">
    <img id="close-image" src="public/images/common/close.png" />
	<div id="imgPop">
        <?php 
        if(isset($popupImg)){   
        ?>
            <a target="_blank" href="<?php echo $popupImg['links']; ?>"><img id="abc" alt="popupImages" src="public/images/admin/popup/<?php echo $popupImg['images']; ?>" /></a>
        <?php              
            }
        ?>
    </div>
    
</div>