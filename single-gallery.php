<?php
/**
 * @package WordPress
 * @subpackage idi
  */
 
get_header();

$video_link = get_post_meta(get_the_ID(), "idi_video_link", true);
$guideif = get_post_meta(get_the_ID(), "idi_guideif", true); 

//////////////////////////////
//Layout: 2-cols with sidebar
/////////////////////////////
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
		
		<div class="singal_main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="clum2_box" <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<div class="entry">
							<ul class="post_gallery">
							<?php /* */$args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'post_parent' => $post->ID
							 );
							$attachments = get_posts( $args );
							if ( $attachments ) {
								foreach ( $attachments as $attachment ) {
								$Img = wp_get_attachment_image( $attachment->ID, 'gallery' );
								$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' ) ;
								$ImageDes = apply_filters('the_content', $attachment->post_content);
								?>
								<li><a href="<?php echo esc_url($ImageUrl[0]); ?>" title="<?php the_title(); ?>"  rel="prettyPhoto[]"><?php echo balanceTags($Img); ?></a>
								<?php if($ImageDes) { ?>
									<div class="des"><?php echo balanceTags($ImageDes); ?></div>
								<?php } ?>	
								</li>
							<?php
								} // end each
							 } // end if 
							 
							?>
							</ul>
						</div><!--entry-->
						<p class="clum2_box_meta"><?php _e('Posted by', 'ux'); ?>  <?php the_author(); ?> <?php _e('in', 'ux'); ?>  : <?php the_category(' '); ?></p>
					</div><!--clum2_box-->
					<?php endwhile; endif; ?>
			<div class="clear"></div>
			</div><!--singla main-->
		</div><!--clum2 main-->
			<?php get_sidebar(); ?>
			<div class="clear"></div>
	</div><!--End clum2_wrap-->
<?php get_footer(); ?>