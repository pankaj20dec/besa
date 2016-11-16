var $ = jQuery.noConflict(),win_h,win_w;

var Blank ={
	win_prop : function(){
		win_h = $(window).height();
		win_w = $(window).width();
	},
	
	menu_scroll : function(){
		$('.home .nav a').click(function(e){
			var url = $(this).attr("href");
			var indexed = url.indexOf("#");
			var hashTag = url.substr(url.indexOf("#"));
			console.log(hashTag);			
			if(indexed > -1){
				e.preventDefault();
				if(jQuery(hashTag).length){
				var $href = jQuery(hashTag).offset().top;
				jQuery('html,body').animate({
					scrollTop: $href - $('.navbar').height()
				},600)
				}else{
					window.location.href = url;
				}
			}
		});	
	}	
}

  
$(document).ready(function(){
	Blank.win_prop();
	Blank.menu_scroll();
	
			
		
	
});
 


$(window).load(function(){

});

$(window).resize(function(){

});

$(window).scroll(function(){
	var cur_pos = $(this).scrollTop();
	//console.log("cur_pos "+cur_pos);
	$('.home div.scrollpage').each(function(){
		var top = $(this).offset().top - $('.navbar').height();
		var bottom = top + $(this).outerHeight();
	   if (cur_pos >= top && cur_pos <= bottom){
		   $('.home .nav a').removeClass('active');
		   $('.home .nav').find('a[href="'+window.location.href+'#'+$(this).attr('id')+'"]').addClass('active');
	   }
	});
});