<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
get_header();
$homeurl = get_bloginfo ( 'wpurl' );
?>
<div id="fullwidth_main" class="container">
<div class="singal_main">
	<div class="opps">
	<h1 class="u404tit">404</h1>
	<div class="u404con">Oops..<span><?php _e('The page you were looking for is no longer online or has been moved, you can go back','ux'); ?> <a href="<?php  echo esc_url($homeurl); ?>">HomePage</a>.</span></div>
	<div class="clear"></div>
	</div><div class="clear"></div>
</div>	
</div><!--fullwidth_main-->
<?php get_footer(); ?>