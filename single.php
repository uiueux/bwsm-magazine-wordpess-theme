<?php
/**
 * @package WordPress
 * @subpackage idi
  */
include get_template_directory().'/get_options.php'; 
get_header();
$video_link = get_post_meta(get_the_ID(), "idi_video_link", true);
$layout = get_post_meta(get_the_ID(), "idi_layout", true);
$noshowad = get_post_meta(get_the_ID(), "idi_showadif", true);
if(!$layout) { $layout=1; }
$guideif = get_post_meta(get_the_ID(), "idi_guideif", true); 

//////////////////////////////
//Layout: 2-cols with sidebar
/////////////////////////////
?>
<?php
if($layout == '1') {
?>
<div id="clum2_wrap" class="container contentpage">

	<div id="clum2_main">
<!-- 
///////////////////
///Breakcrumbs ///
//////////////////
-->
	<?php if( $guideif =="yes") { ?>	
	<div class="guidewrap"><?php get_breadcrumbs();?></div>
	<?php } ?>	
		<?php
		//////////
		//Ad top//
		/////////
		 if( $idi_adposttop != '' && $noshowad == false ) { ?>
		<div class="adinpage_wrap_half"><?php echo balanceTags($idi_adposttop); ?></div><?php } 
		///////////////
		//content area
		///////////////
		?>
		<div class="singal_main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="clum2_box" <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1 class="pagetitle"><?php the_title(); ?></h1>
				<div class="entry"><?php the_content(); ?><div class="clear"></div>
					<?php wp_link_pages(array('before' => __('<p class="singlepageno"><strong>Pages:</strong> ','ux'), 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div><!--entry-->
				<?php
				/////////////
				//Ad middle//
				////////////
				 if( $idi_adpostcontent != '' && $noshowad == false ) { ?>
				<div class="adinpost_middle"><?php echo balanceTags($idi_adpostcontent); ?></div>
				<?php }
				////////////
				//Meta area
				////////////
				 ?>
				<p class="clum2_box_meta"><?php _e('Posted by', 'ux'); ?> <?php the_author(); ?> <?php _e('in', 'ux'); ?> : <?php the_category(' '); ?>, <?php if (comments_open()) { ?><?php comments_popup_link(); ?><?php } ?></p>
			</div><!--clum2_box-->
			<div class="clear"></div>
			<div class="linebg"></div>
			<?php
			////////////////
			//comments area
			////////////////
			 if (comments_open()) comments_template(); endwhile; else: ?><p><?php _e('Sorry, no comments.','ux'); ?></p><?php endif; ?>
		</div><!--End singal_main-->
			<?php 
			////////////
			//Ad bottom
			////////////
			if( $idi_adpostbottom  != '' && $noshowad == false ) { ?>
			<div class="adinpost_bottom"><?php echo balanceTags($idi_adpostbottom); ?></div>
			<?php } ?>
			<!--End AD-->
		<div class="clear"></div>
	</div><!--End clum2_main-->
	
	<?php 
	///////////////
	//sidebar area
	//////////////
	get_sidebar(); ?>
</div><!--End clum2_wrap-->


<?php } else if ($layout =="2") {


//////////////////////
//Layout: Fullwidth
/////////////////////


?>
<!-- 
///////////////////
///Breakcrumbs ///
//////////////////
-->
<?php
if( $guideif =="yes") { ?>
<div class="container"><div class="guidewrap"><?php get_breadcrumbs();?></div></div>
<?php } ?>

<div id="fullwidth_main" class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	///////////////
	//content area
	///////////////
?>
	<div class="singal_main">
		<div class="clum2_box" <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="pagetitle"><?php the_title(); ?></h1>
			<div class="entry">
			<?php the_content(); ?>
			<div class="clear"></div>
			<?php wp_link_pages(array('before' => __('<p class="singlepageno"><strong>Pages:</strong> ','ux'), 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div><!--entry-->
			<p class="clum2_box_meta"><?php _e('Posted by', 'ux'); ?> <?php the_author(); ?> <?php _e('in', 'ux'); ?> : <?php the_category(' '); ?>, <?php if (comments_open()) { ?><?php comments_popup_link(); ?><?php } ?></p>
		</div><!--clum2_box--><div class="clear"></div>
		<div class="linebg"></div>
		<?php
		//////////////////
		//comments area//
		////////////////
		 if (comments_open()) comments_template();
		endwhile; else: ?><p><?php _e('Sorry, no comments.','ux'); ?></p><?php endif; ?>
		<div class="clear"></div>
	</div><!--End singla main-->
</div><!--End fullwidth_main-->
<?php 
} //End if layout ?>
<script>
jQuery(document).ready(function() {
	// #################################
	// Youtbe z-index bug
	// #################################						
	jQuery('iframe').each(function(){
		var url = jQuery(this).attr("src")
		jQuery(this).attr("src",url+"?wmode=transparent")
	});	
})	
</script>	
<?php
get_footer(); ?>