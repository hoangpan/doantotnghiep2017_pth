$(document).ready(function(){
    $window = $(window);
    $ads = $('.ads');    
    $topDefault = parseFloat($ads.css('top'), 10);     
    
    $window.scroll(function(){
        $top = $(this).scrollTop();
        $ads.stop().animate({top: $top + $topDefault}, 1000);   
    });
    
    $widthAds = $ads.outerWidth()*2;    
    function zindex(maxWidth){
        if($window.width() <= maxWidth + $widthAds ){
            $ads.addClass('zindex');    
        }else{
            $ads.removeClass('zindex');
        }
    }
    $widthWrapper = $('#wrapper').outerWidth();
    $window.resize(function(){
        zindex($widthWrapper);    
    });
    
     
});
