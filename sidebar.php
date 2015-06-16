<?php 
$sidebar = get_post_meta(get_the_ID(), "idi_select_sidebar", true);
?>
<div id="clum2_sidebar_left">
	<div class="clum2_sidebar_unit">
	<?php 
	if ($sidebar == "") $sidebar = "default";
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) :
endif;   ?>
	</div><!--clum2_sidebar_unit-->
</div><!--clum2_sidebar-->