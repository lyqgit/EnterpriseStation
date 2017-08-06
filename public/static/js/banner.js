$(function(){
	var oUl = $('.banner ul');
	var oLi = $('.banner ul li');
	var oTab = $('.banner ol li');
	var i = 0;
	var timer = setInterval(turn,3000);
	function pic(){
		oLi.removeAttr('id');
		oLi.eq(i).attr('id','show');
	}
	
	function turn(){
		if(i<oLi.length-1){
			i++;
		}else{
			i = 0;
		}
		pic();
		
		oTab.removeAttr('id');
		oTab.eq(i).attr('id','on');
		
	}
	
	oTab.click(function(){
		clearInterval(timer);
		
		oTab.removeAttr('id');
		$(this).attr('id','on');
		
		var j = $(this).index();
		oLi.removeAttr('id');
		oLi.eq(j).attr('id','show');
	});
	
	oUl.mousemove(function(){
		clearInterval(timer);
	});
	oUl.mouseout(function(){
		timer = setInterval(turn,2000);
	});
});
