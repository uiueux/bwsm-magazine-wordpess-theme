<?php
/**
 * @package WordPress
 * @subpackage Magazine
 */
include get_template_directory().'/get_options.php';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?></title>
	
	
	 
	<!-- Mobile Specific Metas
	  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<!-- Favicons
	================================================== -->
	<?php if ($idi_favicon) { ?>
	<link rel="shortcut icon" href="<?php echo esc_url($idi_favicon); ?>" />
	<?php } else { ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon.ico">
	<?php } ?>
	
	<?php if ($idi_mobileicon) { ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($idi_mobileicon); ?>" />
	<?php } else { ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/apple-touch-icon-114x114.png">
	<?php } ?>
	
	<?php if ($idi_font_color) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles/color-<?php echo esc_attr($idi_font_color); ?>.css" />
	<?php }else{ ?>
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles/color-sienna.css" />
	<?php } ?>
	<?php if (($idi_skin == "dark")||($idi_skin == "light")) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles/<?php echo esc_attr($idi_skin); ?>.css" />
	<?php }else{ ?>
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles/dark.css" />
	<?php } ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="header">
	<div class="headerbar">
	<div class="container">
		<div class="socialicons">
		<?php if($idi_facebook){?>
				<a href="<?php echo esc_url($idi_facebook); ?>" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_facebook.png" alt="Facebook"></a>
			<?php } if($idi_tweet) {?>	
				<a href="<?php echo esc_url($idi_tweet); ?>" title="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_tweet.png" alt="Twitter"></a>
			<?php } if($idi_linkedin) {?>	
				<a href="<?php echo esc_url($idi_linkedin); ?>" title="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_in.png" alt="LinkedIn"></a>
			<?php } if($idi_flickr) {?>	
				<a href="<?php echo esc_url($idi_flickr); ?>" title="Flickr"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_flickr.png" alt="Flickr"></a>
			<?php } if($idi_youtube) {?>	
				<a href="<?php echo esc_url($idi_youtube); ?>" title="Youtube"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_youtube.png" alt="Youtube"></a>
			<?php } if($idi_vimeo) {?>	
				<a href="<?php echo esc_url($idi_vimeo); ?>" title="Vimeo"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_vimeo.png" alt="Vimeo"></a>
			<?php } if($idi_blogger) {?>	
				<a href="<?php echo esc_url($idi_blogger); ?>" title="Blogger"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_blogger.png" alt="Blogger"></a>
			<?php } if($idi_lastfm) {?>	
				<a href="<?php echo esc_url($idi_lastfm); ?>" title="Last.fm"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_lastfm.png" alt="Last.fm"></a>
			<?php } if($idi_iconmail) {?>	
				<a href="mailto:<?php echo esc_url($idi_iconmail); ?>" title="<?php _e('Email','ux'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_mail.png" alt="<?php _e('Email','ux'); ?>"></a>
			<?php } if($idi_rss) {?>	
				<a href="<?php echo esc_url($idi_rss); ?>" title="Rss"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_rss.png" alt="Rss"></a>
			<?php } ?>	
		</div><!--socialions-->
		<?php if( get_option('idi_searchbar') == 'true' ) { ?>
		<form id="search_header" name="" method="get" class="search-form_header" action="<?php echo esc_url(home_url()); ?>/">	
			<input type="text" onBlur="if (this.value == '') {this.value = '';}" onFocus="if (this.value == '') {this.value = '';}" id="s" name="s" value="" class="textboxsearch_header"> 
			<input type="submit" value="" class="submitsearch_header" name="submitsearch">
		</form>
		<?php } ?>
	</div><!--End container-->	
			
	</div><!--End headerbar-->		 
	<div class="line_main"></div>
		<div class="container">
		<?php if( $idi_textlogo == 'true') { //if textlogo ?>
			<h1 id="logo"><a href="<?php echo esc_url(home_url()); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php } else { 
					if (get_option('idi_logo')) { //if set image logo?>
					<h1 id="logo"><a href="<?php echo esc_url(home_url()); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_option('idi_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
		<?php 		} else {} //end if set image logo
					?>
					<?php
				} //End textlogo?>	
			<div class="navwrap">
				 <?php wp_nav_menu(array('theme_location'=>'ux','menu'=>'navi','container_class' => 'nav', 'container_id' => 'navi')); ?>
			</div><!--End navwrap-->
			<div class="clear"></div>
			</div><!--End container-->
</div><!-- 
////////////////
///End header///
///////////////
-->