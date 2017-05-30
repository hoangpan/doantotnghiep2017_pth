$(document).ready(function (){
	$(window).load(function (){
		$('#popup').fadeIn();
	});
					
	$('#close-image').click(function (){
		$('#popup').fadeOut(2000);
	});
});