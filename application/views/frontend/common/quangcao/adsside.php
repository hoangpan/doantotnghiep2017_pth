<div class="ads" id="ads-left">
    <?php foreach($adsleft as $link => $image){ ?>
    <a target="_blank" href="<?php echo $link; ?>"><img class="ads-img" src="public/images/admin/adsside/<?php echo $image; ?>" width="125" /></a>
    <?php } ?>
</div>

<div class="ads" id="ads-right">
    <?php foreach($adsright as $link => $image){ ?>
    <a target="_blank" href="<?php echo $link; ?>"><img class="ads-img" src="public/images/admin/adsside/<?php echo $image; ?>" width="125" /></a>
    <?php } ?>
</div>