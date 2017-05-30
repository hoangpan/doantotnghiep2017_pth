<div class="slide-container">
	<div class="slide-stage">
    <?php foreach($slide as $rows){  ?>        
		<div class="slide-image"><img src="public/images/admin/slide/<?php echo $rows['images']; ?>" /></a></div>		        
    <?php } ?>    		
	</div>
    
	<div class="slide-pager">
		<ul class="pager-container"></ul>
		<div class="slide-control-prev">«</div>
		<div class="slide-control-next">»</div>
	</div>
</div>