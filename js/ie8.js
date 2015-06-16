// hack css IE 
	// #################################
	// CSS 3 HACK
	// #################################
	jQuery(document).ready(function() {	
		jQuery('.slide10u li:lt(4)').css("margin-right","5px");
		jQuery('.slide10u li').eq(5).css("margin-right","5px");
		jQuery('.slide10u li').eq(6).css("margin-right","5px");
		jQuery('.slide10u li').eq(7).css("margin-right","5px");
		jQuery('.slide10u li').eq(8).css("margin-right","5px");
		jQuery('.slide10u li:gt(4)').css("margin-bottom","0");
		jQuery('.slide6u li:lt(2)').css("margin-right","5px");
		jQuery('.slide6u li').eq(3).css("margin-right","5px");
		jQuery('.slide6u li').eq(4).css("margin-right","5px");
		jQuery('.nav>ul>li:last-child ul').css("right","0");
		jQuery('.nav>ul>li:last-child ul').css("left","auto");
		jQuery('.nav>ul>li:last-child ul').find("ul").css("left","-140px");
		jQuery('li.listbox_u3imgs li:nth-child(2)').find("img").css("width","104px");
		jQuery('#list_wrap_col2_c1 li.listbox_u3imgs li:nth-child(2)').find("img").css("width","209px");
	});	