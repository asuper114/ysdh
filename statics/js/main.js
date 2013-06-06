$(function(){
	$(document).scroll(function(){
		var top = $(this).scrollTop();
		if(top > 550){
			$('.contact_overly').css({
				position:'fixed',
				top:10
			})
		}else{
			$('.contact_overly').css({
				position:'absolute',
				top:560
			})
		}
	});
});