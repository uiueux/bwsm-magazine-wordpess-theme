<?php
/*
Template Name: List fullwidth

*/
get_header(); 
include get_template_directory() .'/get_options.php'; 
$home_slide_style = get_post_meta(get_the_ID(), "idi_home_slide_style", true);  //Slide style
$cat_ID = get_post_meta(get_the_ID(), "idi_home_slide_cat", true); //Slide cat
$slogan = get_post_meta(get_the_ID(), "idi_slogan", true);
$quote = get_post_meta(get_the_ID(), "idi_quote", true);
$postnums = get_post_meta(get_the_ID(), "idi_home_promotion_nums", true);//Items show number
$catID = get_post_meta(get_the_ID(), "idi_home_promotion_cat", true);//Items show  cat
$pagination = get_post_meta(get_the_ID(), "idi_pagination", true); 
if( !$pagination ){ $pagination ="none";}
if ( is_front_page() ) { 
	$paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else { 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$guideif = get_post_meta(get_the_ID(), "idi_guideif", true); 
$slideorder = get_post_meta(get_the_ID(), "idi_slide_order", true); 
$slideorderby = get_post_meta(get_the_ID(), "idi_slide_order_by", true); 
$adbottom = get_post_meta(get_the_ID(), "idi_pagead_bottom", true); 
global $post; 
$pageid = $post->ID;
$list_order_by = get_post_meta(get_the_ID(), "idi_list_order_by", true); 
if (!$list_order_by){ $list_order_by ="date"; }
$list_order = get_post_meta(get_the_ID(), "idi_list_order", true); 
if (!$list_order){ $list_order ="DESC"; }
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
///Start slider///
//////////////////
-->
<?php
if ($home_slide_style == "0") { 
/////////////////////////
//Slide Style : Noslide/
///////////////////////
}else{ 
 if ($home_slide_style == "1") {
//////////////////////////////
//Slide Style :Brick Slide //
////////////////////////////
?>
<div class="slidew">
	<div class="slide10u" id="slide10uid">
			<ul class="tabs" id="slide10utab">
	<?php 
		$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => 10,
		'post_status' => null,
		'order' => $slideorder,
		'orderby' => $slideorderby,
		'post_parent' => $post->ID
		);
		$attachments = get_children( $args );
		$arrK = array_keys( $attachments );
		$i = 0;
		foreach ( $attachments as $attachment ) {
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			$color = get_post_meta( $arrK[$i], '_brick_color', true );
			$link = get_post_meta( $arrK[$i], '_link_to', true );
			$i = $i + 1;
	?>
				<li>
				<div class="slide-back" style="background-color:#<?php echo esc_attr($color); ?>">
					<h2><?php echo esc_html($ImageTit); ?></h2><br>
					<?php if($link) { ?><a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($ImageTit); ?>" class="slidemore"><?php if($idi_readmore){ echo balanceTags($idi_readmore); } else { _e('Read more','ux'); } ?></a><?php } ?>
				</div><!--slide-back-->
				<div class="slide-back2" style="background-color:#<?php echo esc_attr($color); ?>">
					<h2><?php echo esc_html($ImageTit); ?></h2><br>
					<?php if($link) { ?><span class="slidemore"><?php if($idi_readmore){ echo balanceTags($idi_readmore); } else { _e('Read more','ux'); } ?></span><?php } ?>
				</div><!--slide-back2-->
				</li>
	<?php } //end each  ?>
			</ul>
			<ul class="bgimg" id="slide10ubgimg">
	<?php $args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => 10,
		'post_status' => null,
		'order' => $slideorder,
		'orderby' => $slideorderby,
		'post_parent' => $post->ID
		);
		$attachments = get_posts( $args );
			foreach ( $attachments as $attachment ) {
				$Img = wp_get_attachment_image_src( $attachment->ID, 'slide' );
	?>
				<li>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;margin-bottom:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;margin-bottom:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;margin-bottom:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;margin-bottom:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-bottom:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>); margin-right:5px;"></div>
				<div style="background-image:url(<?php echo esc_url($Img[0]); ?>);"></div>
				</li>
	<?php	} //end each ?>
			</ul>
			<div class="clear"></div>
			<div id="load">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/loading-w.gif" alt="loading" /><p>loading</p>
			</div><!--load-->
	</div><!--slide10u-->
</div><!--slide w-->
<!-- 
////////////////////////
///Start Mobile Slide///
///////////////////////
-->
<div class="container">		
	<div class="flexslider">
	    <ul class="slides">
		<?php 
		$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => 10,
		'post_status' => null,
		'order' => $slideorder,
		'orderby' => $slideorderby,
		'post_parent' => $post->ID
		);
		$attachments = get_children( $args );
		$arrK = array_keys( $attachments );
		$i = 0;
		foreach ( $attachments as $attachment ) {
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			$link = get_post_meta( $arrK[$i], '_link_to', true );
			$Img = wp_get_attachment_image_src( $attachment->ID, 'slide' );
			$i = $i + 1;
		?>
			<li>
	    		<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($ImageTit); ?>"><img src="<?php echo esc_url($Img[0]); ?>" alt="<?php echo esc_attr($ImageTit); ?>" /></a>
	    		<p class="flex-caption"><span><?php echo esc_html($ImageTit); ?></span></p>
	    	</li>
		<?php } //end each?>	
		</ul>
	</div><!--End flwxslider-->
</div><!--End container-->
<!-- 
////////////////////////
///End Mobile Slide///
///////////////////////
-->
<?php
 } else if ($home_slide_style == "2"){ 
////////////////////////////
//Slide Style : Nivo Slider 
///////////////////////////
$nivo_effect = get_post_meta(get_the_ID(), "idi_nivo_effect", true); 
if ( !$nivo_effect ) $nivo_effect = 'fade';
$nivo_slices = get_post_meta(get_the_ID(), "idi_nivo_slices", true); 
if ( !$nivo_slices ) $nivo_slices = 3;
$nivo_animSpeed = get_post_meta(get_the_ID(), "idi_nivo_animSpeed", true); 
if ( !$nivo_animSpeed ) $nivo_animSpeed = 500;
?>
<div class="slidew">
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({
		effect:'<?php echo esc_attr($nivo_effect); ?>',
		slices:<?php echo esc_attr($nivo_slices);?>,
		animSpeed:<?php echo esc_attr($nivo_animSpeed); ?>, //Slide transition speed
        pauseTime:3000,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:false, //Next & Prev
        directionNavHide:true, //Only show on hover
        controlNav:true, //1,2,3...
        controlNavThumbs:true, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:true, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '-140x45.jpg', //...this in thumb Image src
        keyboardNav:false, //Use left & right arrows
        pauseOnHover:true, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded
	});
});
</script>
<div id="slidewrap"> 
	<div id="slider">
		<?php
		$numbers_nivo = get_post_meta(get_the_ID(), "idi_numbers_nivo", true); 
		if( !$numbers_nivo ) $numbers_nivo = 3;
		$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => $numbers_nivo,
		'post_status' => null,
		'order' => $slideorder,
		'orderby' => $slideorderby,
		'post_parent' => $post->ID
		);
		$attachments = get_children( $args );
		$arrK = array_keys( $attachments );
		$i = 0;
		foreach ( $attachments as $attachment ) {
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			$link = get_post_meta( $arrK[$i], '_link_to', true );
			$large_image_url = wp_get_attachment_image_src( $attachment->ID, 'slide' );
			$thumb_image_url = wp_get_attachment_image_src( $attachment->ID, 'slide-thumb' );
			$i = $i + 1;
		?>
		<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($ImageTit); ?>" ><img src="<?php echo esc_url($large_image_url[0]); ?>" alt="" rel="<?php echo esc_url($thumb_image_url[0]); ?>" /></a>
<?php } //end each ?>
   	</div><!--slider-->
</div><!--slide wrap-->	
</div><!--slide w-->
<!-- 
////////////////////////
///Start Mobile Slide///
///////////////////////
-->
<div class="container">		
	<div class="flexslider">
	    <ul class="slides">
		<?php 
		$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => 10,
		'post_status' => null,
		'order' => $slideorder,
		'orderby' => $slideorderby,
		'post_parent' => $post->ID
		);
		$attachments = get_children( $args );
		$arrK = array_keys( $attachments );
		$i = 0;
		foreach ( $attachments as $attachment ) {
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			$link = get_post_meta( $arrK[$i], '_link_to', true );
			$Img = wp_get_attachment_image_src( $attachment->ID, 'slide' );
			$i = $i + 1;
		?>
			<li>
	    		<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($ImageTit); ?>"><img src="<?php echo esc_url($Img[0]); ?>" alt="<?php echo esc_attr($ImageTit); ?>" /></a>
	    		<p class="flex-caption"><span><?php echo $ImageTit; ?></span></p>
	    	</li>
		<?php } //end each?>	
		</ul>
	</div><!--End flwxslider-->
</div><!--End container-->
<!-- 
////////////////////////
///End Mobile Slide///
///////////////////////
-->
<?php } ?>

 <?php
 } // End Slide style 
?>
<!-- 
////////////////
///AD middle///
///////////////
-->
<?php $adfrontmiddle = get_post_meta(get_the_ID(), "idi_pagead_middle", true); 
if( $adfrontmiddle ) { ?>
	<div class="container"><div class="adinpage_wrap_full"><?php echo balanceTags($adfrontmiddle); ?></div></div>
<?php } ?>
<!-- 
///////////////////
///Quote slogan///
//////////////////
-->
<?php if ($quote) {?><div class="container"><div class="quote_full"><?php echo balanceTags($quote); ?></div></div><?php }else{} ?>
<!-- 
///////////////////
///Items show/////
//////////////////
-->
<?php 
$args = array(
'showposts' => $postnums, 
'paged' => $paged,
'category__in' => $catID,
'post_type'=>array('post','gallery'),
'order'=>$list_order, 
'orderby'=>$list_order_by
);
query_posts($args);	
?>
<div id="content" class="container">
	<ul id="list_wrap" class="list_wrap_full">
<!-- 
////////////////////
///Start AD insert///
////////////////////
-->
<?php
$pagead_insert = get_post_meta(get_the_ID(), "idi_pagead_insert", true);
$AdPosi = get_post_meta(get_the_ID(), "idi_insert_posi", true);
if( !$AdPosi ){ $AdPosi=0; }
if( $pagead_insert ){
?> 
	<script>
		$(function() {
			$('#list_wrap').children('li:eq(<?php echo balanceTags($AdPosi); ?>)').before('<li class="list_box list_ad"><?php echo balanceTags($pagead_insert); ?></li>')
		})
	</script>
<?php 
} //end if pagead_insert 
?>
<!-- 
////////////////////
///End AD insert///
////////////////////
-->
<?php 
//Main loop
	if(have_posts()) : while(have_posts()) : the_post(); 
	$layoutinlist = get_post_meta(get_the_ID(), "idi_layoutinlist", true);
	if(!$layoutinlist){$layoutinlist='ublognoimg';}
	if ($layoutinlist=='One Image Layout A') { ?>
		<li class="list_box listbox_u1imgonly"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") {?>
			<a href="<?php echo esc_url($ImageUrl[0]);?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo balanceTags($Img); ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		</li>
		<?php } //END layout One Image Layout A
		else if ($layoutinlist=='One Image Layout B') { ?>
		<li class="list_box listbox_u1imgonly2">
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo esc_url($ImageUrl[0]);?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo balanceTags($Img); ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		</li>
		<?php
		} //END layout One Image Layout B
		else if($layoutinlist=='3 Images') {?>
		<li class="list_box listbox_u3imgs">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<ul>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 3,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'u3imgs' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<li>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo esc_url($ImageUrl[0]);?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo balanceTags($Img); ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
			</li>
		<?php
			} // end each
		 } // end if
		?>
		</ul><div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo balanceTags($idi_readmore); }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout 3 Images  
		else if($layoutinlist=='5 Images') { ?>
		<li class="list_box listbox_u5imgs">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<ul>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 5,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'u5imgs' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<li>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo esc_url($ImageUrl[0]); ?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
			</li>
		<?php
			} // end each
		 } // end if
		?>
		</ul><div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo balanceTags($idi_readmore); }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout 5Images  
		else if($layoutinlist=='ufullimg') { ?>
		<li class="list_box listbox_ufullimg">
		<div class="fullwrap">
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			//$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
			$Img = the_post_thumbnail( 'ufullimg' );
			//$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageUrl = the_post_thumbnail( 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<div class="back"><div class="backbg"></div>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" rel="prettyPhoto[]"><div class="icozoom"></div></a>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="icomore"></div></a>
			</div><?php echo $Img; ?>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		</div>
		</li>
		<?php } //END layout  fullimg 
		else if($layoutinlist=='u1imgm') { ?>
		<li class="list_box listbox_u1imgm">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo esc_url($ImageUrl[0]);?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo balanceTags($Img); ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
			<div class="expert"><?php the_excerpt(); ?></div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo balanceTags($idi_readmore); }else{ _e('Read more','ux'); } ?></a>
		<?php
			} // end each
		 } // end if
		?>
		</li>
		<?php } //END layout u1imgm 
		else if($layoutinlist=='u1imgb') { ?>
		<li class="list_box listbox_u1imgb">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo balanceTags($idi_readmore); }else{ _e('Read more','ux'); } ?></a>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo esc_url($ImageUrl[0]); ?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo balanceTags($Img); ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		</li>
		<?php } //END layout u1imgb 
		else if($layoutinlist=='ublog1img') { ?>
		<li class="list_box listbox_ublog1img">
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
			$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo esc_url($ImageUrl[0]); ?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo balanceTags($Img); ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo balanceTags($Img); ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p class="date"><?php the_time('d M Y'); ?></p>
		<div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo balanceTags($idi_readmore); }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout ublog1img 
		else if($layoutinlist=='ublognoimg') { ?>
		<li class="list_box listbox_ublog1img">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p class="date"><?php the_time('d M Y'); ?></p>
		<div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo balanceTags($idi_readmore); }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout ublognoimg  
		else if($layoutinlist=='uvideo') { ?>
		<li class="list_box listbox_uvideo">
		<?php 
		$VideoUrl = get_post_meta(get_the_ID(), "idi_video_link", true);
		if (ereg ("youtube", $VideoUrl)) {
		?>
		<div class="video-wrap"><iframe title="YouTube video player" width="100%" height="auto" src="http://www.youtube.com/embed/<?php echo esc_attr(get_youtube_id($VideoUrl)); ?>?wmode=transparent" frameborder="0" wmode="Opaque"></iframe></div>
		<h2 style="padding-top:20px; padding-bottom:5px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		 } else if (ereg ("vimeo", $VideoUrl)){ 
		?>
		<div class="video-wrap"><iframe title="Vimeo video player" src="http://player.vimeo.com/video/<?php echo esc_attr(get_vimeo_id($VideoUrl)); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" height="auto" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
		<h2 style="padding-top:20px; padding-bottom:5px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		 } else if (ereg (".swf", $VideoUrl)){ 
		 ?>
		<div class="video-wrap-swf"><object width="100%" height="auto" codebase="<?php echo esc_attr($VideoUrl); ?>" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
		<param value="opaque" name="wmode">
		<param value="true" name="allowfullscreen">
		<param value="always" name="allowscriptaccess">
		<param value="<?php echo esc_attr($VideoUrl); ?>" name="src">
		<param value="high" name="quality">
		<embed width="100%" height="auto" quality="high" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" src="<?php echo esc_url($VideoUrl); ?>" type="application/x-shockwave-flash">
		</object></div>
		<h2 style="padding-top:20px; padding-bottom:5px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		 } //End ereg VideoUrl(youtube , vimeo or swf) ?>
		</li>
		<?php } //END layout uvideo 
	endwhile; else : ?><p class="nopost"><?php _e('Sorry, No posts.','ux'); ?></p>
	<?php endif; ?>
</ul>
<div class="clear"></div>

<!-- 
//////////////////
///Pagenation ///
/////////////////
-->
<?php 
if( !$pagination ) $pagination ="none";
if ($pagination == "numbers") { ?>
<?php 
if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<?php } else if ($pagination == "infinite") { ?>
<div id="page-nav"><?php next_posts_link('MORE') ?></div>
<script>
jQuery(window).load(function(){
var $container = jQuery('#list_wrap');
//Infinits Scroll 
		$container.infinitescroll({
        navSelector  : '#page-nav',    // selector for the paged navigation 
        nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
        itemSelector : '.list_box',     // selector for all items you'll retrieve
        loading: {
            finishedMsg: '',
            img: ''
          }
        },
        // call Isotope as a callback
        function( newElements ) {
			var newElems = jQuery(newElements).css({ opacity: 0 });
          	newElems.imagesLoaded(function(){
			$container.isotope('appended', newElems);
			//projectThumbInit();
			});
		 //After infi-fresh, need-run-js again:
		 //click img-in-list to prettyphtot
		  	if(navigator.platform != "iPhone" || navigator.platform != 'iPod'){						 
			  jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			   animation_speed: 'fast', /* fast/slow/normal */
			   slideshow: false, /* false OR interval time in ms */
			   autoplay_slideshow: false, /* true/false */
			   opacity: 0.80, /* Value between 0 and 1 */
			   show_title: false, /* true/false */
			   allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			   default_width: 500,
			   default_height: 344,
			   counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			   theme: 'light_square', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			   hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			   wmode: 'opaque', /* Set the flash wmode attribute */
			   autoplay: true, /* Automatically start videos: True/False */
			   modal: false, /* If set to true, only the close button will close the window */
			   overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			   keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			   social_tools:false
			  });
			 } 
		  //jQuery(window).unbind('.infscr');
		//hovoer on img-in-list 
			jQuery("li.list_box a").hover(function(){							   
				jQuery(this).children(".back").fadeIn(200);
			}, function() {
				jQuery(this).children(".back").fadeOut(100);
			});
			jQuery("ul#list_wrap").find("li.listbox_ufullimg").hover(function(){							   
				jQuery(this).find(".back").fadeIn(200);
				jQuery(this).find(".icozoom").animate({ left:"33%"}, 300 );
				jQuery(this).find(".icomore").animate({ right:"33%"}, 300 );
			},function() {
				jQuery(this).find(".back").fadeOut(100);
				jQuery(this).find(".icozoom").animate({ left:"0"}, 200 );
				jQuery(this).find(".icomore").animate({ right:"0"}, 200 );
			});
			// need-run-js over
		});
		//Infinits Scroll end 
});
</script>
<?php } else if ($pagination == "none") {} //End if pagination ?>

</div><!--End content--><div class="clear"></div>

<!--////////
///AD bottom
/////////-->
<?php if( $adbottom ) { ?>
	<div class="container"><div class="adinpage_wrap_full"><?php echo balanceTags($adbottom); ?></div></div>
<?php } ?>
<?php get_footer(); ?>