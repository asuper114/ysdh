/*
 *　@author zhangyanchao
 *	@2012-04-18 
 */

function del(url)
{
	if (confirm("确定删除它吗？"))
	{
		if(typeof(url)=='function')url();
		else
		window.location.href=url.replace('&','&amp;');				
	}
}
function checkFileExt(file,type)
{
	if (type)
	{
		var types=type.split(",");
		for (var j=0;j<types.length;j++)
		{
			var regu = eval("/.*\."+types[j]+"$/i");
			var re = new RegExp(regu);
			 if (file.search(re) != -1) {
				   return true;
			 }
		}
		return false;
	}
	return true;
}

/**
 * Create an accessible, unobtrusive tab interface based on a particular HTML structure.
 *
 * The underlying HTML has to look like this:
 *
 * <select id="parent" name="parent">
 *     <option value="1">Flower</option>
 *     <option value="2">Animal</option>
 * </select>

 * A tab is also bookmarkable via hash in the URL. Use the History/Remote plugin (Tabs will
 * auto-detect its presence) to fix the back (and forward) button.
 *
 * @example $('#parent').selected('2');
 * @param Number  initial An integer specifying the position of the default value 
 */
(function($){
	$.fn.selected=function(v,iftext){
		if(this.is('select'))
		{
			var parent=this[0].id;
			if(iftext){
				$('#'+parent+' option').each(function(){
													  if($(this).text()==v)$(this).attr('selected','selected');
													  })
			}else{	
			$('#'+parent+' option[value="'+v+'"]').attr('selected','selected')
			}
			this.change();
		}
	};
	$.fn.check=function(v){
		this.each(function(){var $this=$(this);
			if($.isArray(v)) 
			{
				if($.inArray($this.val(),v)>-1)$this.attr('checked',true);
			}else{
		 		if($this.val()==v)$this.attr('checked',true);
			}
		})
	};
	$.fn.checkAll=function(){
		$(":checkbox",this).attr('checked',true);
	};
	$.fn.UnCheckAll=function(){
		$(":checkbox",this).attr('checked','');
	};
	$.fn.checkOther=function(){
		$(":checkbox",this).each(function(){ //由于复选框一般选中的是多个,所以可以循环输出
		if(!$(this).attr('checked')) 
		 $(this).attr('checked',true);
		else
		 $(this).attr('checked','');
  		});
	};
	$.fn.bgtext=function(options){
		return this.each(function(){
			var obj=$(this);
			if(obj.is(':text'))
			{
				var bgtext;
				$.bgtextID=$.bgtextID?++$.bgtextID:1;
				var id='_BGTEXT_'+$.bgtextID;
	
				if(typeof(options)=='string')
					bgtext=options;
				else{
					bgtext=options.value||obj.attr('bgtext');
				}
	
					var h=obj.height();
					var w=obj.width();
					var zindex = obj.css('z-index');
					var offset = obj.offset(),pobj=obj.offsetParent(),l=offset.left,t=offset.top;
					if(pobj[0]){var poffset=pobj.offset();l=offset.left-poffset.left;t=offset.top-poffset.top;zindex=pobj.css('z-index')}
					
					if(zindex){zindex = parseInt(zindex);zindex++;}
					else{ zindex=2000;}
					obj.css('z-index',zindex);
	 
					if(!$('#'+id)[0])
					obj.after('<div id="'+id+'">'+bgtext+'</div>'); 
					
					$('#'+id).css($.extend( {}, {color:'#999','font-size':obj.css('font-size'),'line-height':obj.css('line-height'),cursor:"text","text-align":"left",position:"absolute",width:w,height:h,"z-index":zindex,top:t+2,left:l+2}, options));
					$('#'+id)[obj.val()?'hide':'show']().click(function(){obj.focus()});
	
					//$(obj).fadeTo('fast', 30 / 100);
					obj.focus(function(){
										$('#'+id).hide() 	 
																	 })
					 .blur(function(){
									if(obj.val()=='')$('#'+id).show();
																	 })
					 .change(function(){
									if(obj.val()!='')$('#'+id).hide();
																	 });
					
			}
		});
	}
})(jQuery);