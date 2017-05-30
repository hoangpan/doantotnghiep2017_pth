$(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) $('#goTop').fadeIn();
        else $('#goTop').fadeOut();
    });
    
    $('#goTop').click(function () {
        $('body,html').animate({scrollTop: 0}, 3000);
    });
});