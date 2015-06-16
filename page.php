<?php
/*
Template Name: Page
*/
get_header(); 
$layout = get_post_meta(get_the_ID(), "idi_layout", true);
if(!$layout) { $layout=1; }
$sidebar = get_post_meta(get_the_ID(), "idi_select_sidebar", true);
if ($sidebar == "") $sidebar = "default";
$guideif = get_post_meta(get_the_ID(), "idi_guideif", true); 
$slogan = get_post_meta(get_the_ID(), "idi_slogan", true);
$quote = get_post_meta(get_the_ID(), "idi_quote", true);
//////////////////////////////
//Layout: 2-cols with sidebar
/////////////////////////////
 
if($layout == "1") { ?>
<div id="clum2_wrap" class="container contentpage">
	<!--/////////////
	//content area//
	//////////////-->
	<div id="clum2_main">

	<!-- 
	//////////////
	///Ad top ///
	/////////////
	-->
	<?php 
	$adfronttop = get_post_meta(get_the_ID(), "idi_pagead_top", true); 
	if( $adfronttop ) { ?>
	<div class="adinpage_wrap_half"><?php echo balanceTags($adfronttop); ?></div>
	<?php } ?>
	<!-- 
	///////////////////
	///Breakcrumbs ///
	//////////////////
	-->
	<?php if( $guideif =="yes") { ?>	
	<div class="guidewrap"><?php get_breadcrumbs();?></div>
	<?php } ?>
	<!-- 
	//////////////
	///slogan///
	//////////// 
	-->
	<?php if($slogan){ ?><div class="slogn_half"><?php echo balanceTags($slogan); ?></div><?php } else{} ?>
	<!-- 
	/////////////////////
	/// Quarter Slogan///
	/////////////////////
	-->
	<?php if ($quote) { ?><div class="quote_half"><?php echo balanceTags($quote);?></div><?php }else{}?>
	
		<div class="singal_main" style="margin-bottom:5px;">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="clum2_box">
				<h1 class="pagetitle"><?php the_title(); ?></h1>
				<div class="entry"><?php the_content(""); ?></div><div class="clear"></div>
				<?php endwhile; else: _e('Sorry, No content in this page','ux');   endif; ?>
			</div><!--clum2_box-->
				<div class="clear"></div>
		</div>		
<!--////////
///AD bottom
/////////-->
<?php
$adbottom = get_post_meta(get_the_ID(), "idi_pagead_bottom", true); 
if( $adbottom ) { ?>
	<div class="adinpage_wrap_half"><?php echo balanceTags($adbottom); ?></div>
<?php } // End if ad bottom?>

			<div class="clear"></div>
	</div><!--clum2 main-->
	<!--/////////////
	//sidebar area//
	//////////////-->
	<div id="clum2_sidebar_left">
		<div class="clum2_sidebar_unit">
		<?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) :
		endif;
		?>
		</div><!--clum2_sidebar_unit-->
	</div><!--clum2_sidebar-->	
	</div><!--End clum2_wrap-->
<?php
 } else if($layout == "2") { 
 
///////////////////////
//Layout:  Fullwidth //
//////////////////////
 ?>
<!-- 
//////////////
///Ad top ///
/////////////
-->
<?php $adtop = get_post_meta(get_the_ID(), "idi_pagead_top", true); 
if( $adtop ) { ?>
<div class="container"><div class="adinpage_wrap_full"><?php echo balanceTags($adtop); ?></div></div>
<?php } ?>
<!-- 
///////////////////
///Breakcrumbs ///
//////////////////
-->
<?php
if( $guideif =="yes") { ?>
<div class="container"><div class="guidewrap"><?php get_breadcrumbs();?></div></div>
<?php } ?>
<!-- 
//////////////
///slogan///
//////////// 
-->
<?php if($slogan){ ?><div class="container"><div class="slogn_full"><?php echo balanceTags($slogan); ?></div></div><?php } else{} ?>
<!-- 
///////////////////
///Quote slogan///
//////////////////
-->
<?php if ($quote) {?><div class="container"><div class="quote_full"><?php echo balanceTags($quote); ?></div></div><?php }else{}?>
<div id="fullwidth_main" class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="singal_main" style="margin-bottom:5px;">
	<div class="clum2_box">
		<h1 class="pagetitle"><?php the_title(); ?></h1>
		<div class="entry"><?php the_content(""); ?></div>
		<div class="clear"></div>
		<?php endwhile; else: _e('Sorry, No content in this page','ux'); 
		 endif; ?>
		</div><!--clum2_box-->
		<div class="clear"></div>
	</div><!--singal main-->
	
<!--////////
///AD bottom
/////////-->
<?php
$adbottom = get_post_meta(get_the_ID(), "idi_pagead_bottom", true); 
 if( $adbottom ) { ?>
	<div class="container"><div class="adinpage_wrap_full"><?php echo balanceTags($adbottom); ?></div></div>
<?php } ?>

</div><!--fullwidth_main-->

<?php 
} //End if layout
get_footer(); 
?>