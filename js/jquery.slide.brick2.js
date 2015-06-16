/*
 * jQuery Brick Slide v1.0
 * http://www.uiueux.com 
 * Author : fape
   email:fanpengbj@gmail.com
 * Copyright 2011, BWSM team
 * 
 */
	//BGimg Fadein time
	var fadeIn_time=2000;
	//Flash fadeout time
	var fadeOut_time=1000;
	//Interval time
	var interval_time=1000;
	//Remove bgimg2 time
	var bgimg_remove=10000;
	var _count = 0;
	var current = 1;
	var timer;
jQuery(function() {
	var $slide6utab =jQuery('#slide6utab');
	var $slide6ubgimg =jQuery('#slide6ubgimg');
	var i = 1;
	$slide6utab.children('li').each(function() {
		jQuery(this).attr('ref', i);
		i++
	});
	i = 1;
	$slide6ubgimg.children('li').each(function() {
		jQuery(this).attr('ref', i);
		i++
	});
	$slide6utab.children('.slide-back').fadeOut(0);
	$slide6utab.children('.slide-back2').fadeOut(0);jQuery('#slide6ubgimg li div').attr('load', 0);
	loadBg();jQuery('#slide6ubgimg li div').ready(function() {jQuery('#slide6ubgimg li div').attr('load', 1)
	});
	$slide6utab.children('li').hover(function() {
		jQuery(this).children('.slide-back').fadeIn(200);
		clearInterval(timer)
	},
	function() {
		jQuery(this).children('.slide-back').fadeOut(0);
		timer = setInterval('_timer()', 5000)
	});jQuery('.slide6u .tabs li').click(function() {
		var active = jQuery(this).attr('ref');
		jQuery(this).siblings().children('.slide-back').removeClass('active');
		jQuery(this).children('.slide-back').addClass('active');
		var $bg2 =jQuery('.bgimg').clone();
		$bg2.attr({
			'class': 'bgimg2'
		});jQuery('.slide6u').append($bg2);jQuery('.bgimg li').fadeOut(0);jQuery('.bgimg li[ref=' + jQuery(this).attr('ref') + '] div').each(function() {
			jQuery(this).animate({
				opacity: '0'
			},
			0)
		}).parent('li').fadeIn(0);
		randomFadeOut();
		if (jQuery('.bgimg li[ref=' + jQuery(this).attr('ref') + '] img').attr('load') == '0') {
			clearInterval(timer);jQuery('#load').fadeIn(200)
		} else {jQuery('.bgimg li[ref=' + jQuery(this).attr('ref') + ']').fadeIn(0);jQuery('#load').fadeOut(200)
		}
		current = parseInt(jQuery(this).attr('ref')) + 1
	});
	_count =jQuery('.slide6u .tabs li').length;
	_timer();
	timer = setInterval('_timer()', 5000);
	timer2 = setInterval(function() {jQuery('.bgimg2').remove()
	},
	bgimg_remove)
});
function _timer() {
	if (current > _count) current = 1;jQuery('#load').fadeOut(200);jQuery('.tabs li').children('.slide-back').removeClass('active');jQuery('.tabs li[ref=' + current + ']').children('.slide-back').addClass('active');jQuery('.bgimg li').siblings().fadeOut(300);
	var $bg2 =jQuery('.bgimg').clone();
	$bg2.attr({
		'class': 'bgimg2'
	});jQuery('.slide6u').append($bg2);jQuery('.bgimg li').fadeOut(0);jQuery('.bgimg li[ref=' + current + '] div').each(function() {
		jQuery(this).animate({
			opacity: '0'
		},
		0)
	}).parent('li').fadeIn(0);
	randomFadeOut();
	current++
}
function randomFadeOut() {
	var randomTime;
	var active =jQuery('.active').parent('li').attr('ref');jQuery('.bgimg li[ref=' + active + '] div').each(function() {
		var $c_div = jQuery(this);
		setTimeout(function() {
			$c_div.animate({
				opacity: '1'
			},
			0);
			var top = $c_div.position().top;
			var left = $c_div.position().left;
			var $whiteDiv = jQuery("<div class='flash' style='float:none; display:block; left:" + left + "px;top:" + top + "px;position:absolute;'></div>");
			$c_div.parent('li').append($whiteDiv);
			$whiteDiv.animate({
				'opacity': '0'
			},
			Math.random() * fadeOut_time,
			function() {
				$whiteDiv.remove()
			})
		},
		Math.random() * interval_time)
	})
}
function loadBg() {
	var randomTime;
	var left;
	var top;jQuery('.bgimg li div').each(function() {
		var ref = jQuery(this).parent('li').attr('ref');
		var image = jQuery(this).attr('style');
		var i = jQuery(this).index() + 1;
		left = -(i - 1) % 3 * 205;
		if (i < 4) {
			top = 0
		} else {
			top = -205
		}
		image = image + "; background-position:" + left + "px " + top + "px";
		jQuery(this).attr({
			'style': '' + image + ''
		});
		randomTime = Math.random() * fadeIn_time;
		jQuery(this).fadeIn(randomTime)
	})
}