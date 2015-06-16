<?php 
get_header();
include get_template_directory().'/get_options.php';
?>
<div id="clum2_wrap" class="container">

<!--
/////////////////
//content area//
///////////////
-->
<div id="clum2_main">
	<!--///////////
	//bread crumbs//
	/////////////-->
<div class="guidewrap">
<h2><?php _e('Search results for','ux'); echo ' "'.esc_html($s), '"'; ?></h2>
</div>
	<ul id="list_wrap" class="list_wrap_col2_c1">
		<?php 
		global $query_string;
		if (get_option('idi_number_search')) {
		$number = get_option('idi_number_search');
		} else {
		$number = 15;
		}
		query_posts($query_string .'&posts_per_page='.$number.'&post_type=any&paged=' . $paged);
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
		<li class="listbox_commn list_box">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php if(get_the_excerpt()){ ?>
		<div class="expert"><?php the_excerpt(); ?></div>
		<?php } ?>
		</li>
		<?php endwhile;  else : ?>
		<p class="nopost"><?php _e('Sorry, No posts.','ux'); ?></p>
		<?php endif;  ?>
		<div class="clear"></div>
	</ul>
		<div class="clear"></div>
		<!--///////////
	//page navi//
	/////////////-->
	<?php if(function_exists('wp_pagenavi')) :  wp_pagenavi();  endif; wp_reset_query(); ?>
</div><!--clum2 main-->
	<!--
/////////////////
//Siderbar//////
///////////////
-->		
	<div id="clum2_sidebar_left">
		<div class="clum2_sidebar_unit">
		<?php if ($sidebar == "") $sidebar = "default";
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) :endif;   ?>
		</div><!--clum2_sidebar_unit-->
	</div><!--clum2_sidebar-->
	
	</div><!--End clum2_wrap-->
<?php
get_footer(); ?>