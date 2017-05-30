
$(document).ready(function(){
   $('body').append('<div id="toolTip"></div>');
       var $tooltip=$('#toolTip');      
       $('.prd-item .prd-img-detail').mousemove(function(e){
            var $leftT=e.clientX, $topT=e.clientY;            
            $tooltip.html($(this).parent().next().html()).css({
               left: $leftT+20,
               top: $topT-40,
               display: 'block' 
            });       
       });
       $('.prd-item').mouseout(function(){
            $tooltip.stop().hide();
       });             
});
