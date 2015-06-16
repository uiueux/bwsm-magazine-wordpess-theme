
<?php 

//////////////
//Main Menu//
/////////////

?>
<script type="text/javascript">
			$(function() {
				var $menuli = $('.nav ul.menu').children("li");
				var $current = $(".current-menu-item,.current-menu-parent,.current-menu-ancestor");
				var $menuunit = $(".nav ul.menu li");				
				//add tri when submenu
					$menuli.children("a").each(function(i){
						$(this).siblings("ul.sub-menu").parent().children("a").children("span.subtitle").before("<div class='nav_tri'></div>");
						$(this).siblings("ul.sub-menu").parent(".current-menu-item,.current-menu-parent,.current-menu-ancestor").children("a").children("div.nav_tri").css("background"," url(<?php echo esc_url(get_template_directory_uri()) ; ?>/img/menustri_<?php if( get_option('idi_link') ) { echo esc_url(get_option('idi_link')); }else{ ?>sienna<?php } ?>.png)");
					});
				//add hover block hidden
				$menuunit.prepend("<div class='navhover'></div>");
				//hover on menu
				$menuunit.hover(function(){
					$(this).not("ul ul li").children(".navhover").slideDown(100);
					$(this).children("a").children(".nav_tri").css("background"," url(<?php echo esc_url(get_template_directory_uri()) ; ?>/img/menustri_<?php if( get_option('idi_link') ) { echo esc_url(get_option('idi_link')); }else{ ?>sienna<?php } ?>.png)");
					$(this).children("a").css("color","#<?php if( $idi_link ) { echo esc_attr($idi_link); }else{ ?>c14b2b<?php } ?>");
					$(".nav li li").removeClass("navhover");
					$(this).find('ul:first').delay(150).slideDown(200);
				},function(){	
					$(this).not($current).children("a").children(".nav_tri").css("background"," url(<?php echo get_template_directory_uri() ; ?>/img/menustri_grey.png)");
					$(this).children(".navhover").delay(100).slideUp(100);
					$(this).not($current).children("a").css("color","#afafaf");
					$(this).find('ul:first').slideUp(100);
				})
				$current.children("a").css("color","#<?php if( $idi_link ) { echo esc_attr($idi_link); }else{ ?>c14b2b<?php } ?>");	
			})
</script>