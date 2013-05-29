<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="footer">
	<div>2356789</div>
</div>
<script type="text/javascript">
		$(function(){
			$('.nav a:last').addClass('last');
			$('.teacher .item :last').addClass('last');
			$('.wrap .project :last').addClass('mt20');
		});
		
	</script>
	
<script type="text/javascript">
	$(function(){
		$('.tab a').click(function(){
			if($(this).attr('rel') == 'notice'){
				$('.notice').show();
				$('.news').hide();
				$(this).addClass('active');
				$(this).next().removeClass('active')
			}else{
				$('.notice').hide();
				$('.news').show();
				$(this).addClass('active');
				$(this).prev().removeClass('active')
			}
			$(this).blur();
			return false;
		});


		$('#slides2').slidesjs({
			width: 940,
			height: 328,
			navigation: false,
			start: 3,
			play: {
				auto: true
			}
		});
	});
</script>
<script type="text/javascript">
$(function(){
	$(".picbig").each(function(i){
		var cur = $(this).find('.img-wrap').eq(0);
		var w = cur.width();
		var h = cur.height();
	   $(this).find('.img-wrap img').LoadImage(true, w, h,'<?php echo IMG_PATH;?>msg_img/loading.gif');
	});
})
</script>
</body>
</html>