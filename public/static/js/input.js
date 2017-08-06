$(function(){
//	1,点击输入框,value值消失
//	2,当输入框,失去焦点,判断,如果有值,不显示,如果没有值,恢复原来的值
	
	var color1 = 'black';   //		获取焦点颜色
	var color2 = '#999999'; //		失去焦点颜色

	$('input,textarea').not('input[type="reset"],input[type="submit"],input[type="image"]').each(function(){
//		初始值
		var value = $(this).attr('value');
		$(this).val(value);
		
//		获取焦点
		$('input,textarea').focus(function(){
			
			if($(this).val()===value){
				$(this).val('').css('color',color1)
			}
		})
		
//		失去焦点
		$(this).blur(function(){
			if($(this).val()===''){
				$(this).val(value).css('color',color2)
			}
		})
		
	})	
	
//		重置按钮
		$('input[type="reset"]').click(function(event){
//			event.preventDefault()取消默认事件
			event.preventDefault()
			$('input,textarea').not('input[type="reset"],input[type="submit"],input[type="image"]').each(function(){
				var value = $(this).attr('value')
				$(this).val(value).css('color',color2)
			})
		})
	
})
