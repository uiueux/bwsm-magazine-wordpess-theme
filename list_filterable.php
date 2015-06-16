<?php
/*
Template Name: List with sidebar filterable
*/
$sidebar = get_post_meta(get_the_ID(), "idi_select_sidebar", true);
get_header();
include get_template_directory().'/get_options.php'; 
$home_slide_style = get_post_meta(get_the_ID(), "idi_home_slide_style", true); //Slide style
$cat_ID = get_post_meta(get_the_ID(), "idi_home_slide_cat", true); //Slide cat
$slogan = get_post_meta(get_the_ID(), "idi_slogan", true);
$quote = get_post_meta(get_the_ID(), "idi_quote", true);
$catID = get_post_meta(get_the_ID(), "idi_home_promotion_cat", true); // Items show  cat
$col = get_post_meta(get_the_ID(), "idi_col", true); //Item show column
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$pagination = get_post_meta(get_the_ID(), "idi_pagination", true);
$slideorder = get_post_meta(get_the_ID(), "idi_slide_order", true); 
$slideorderby = get_post_meta(get_the_ID(), "idi_slide_order_by", true); 
$guideif = get_post_meta(get_the_ID(), "idi_guideif", true); 
$adbottom = get_post_meta(get_the_ID(), "idi_pagead_bottom", true); 
$list_order_by = get_post_meta(get_the_ID(), "idi_list_order_by", true); 
if (!$list_order_by){ $list_order_by ="date"; }
$list_order = get_post_meta(get_the_ID(), "idi_list_order", true); 
if (!$list_order){ $list_order ="DESC"; }
?>
<div id="clum2_wrap" class="container">		

<!-- 
//////////////
///Main area /
/////////////
-->
	<div id="clum2_main">
<!-- 
//////////////
///Ad top ///
/////////////
-->
<?php 
$adfronttop = get_post_meta(get_the_ID(), "idi_pagead_top", true); 
if( $adfronttop ) { ?>
	<div class="adinpage_wrap_half"><?php echo $adfronttop; ?></div>
<?php } ?>	
<!-- 
///////////////////
///Breakcrumbs ///
//////////////////
-->
	<div class="guidewrap clearfix">
		<ul id="filterable">
			<li class="current"><a data-filter="*" href="#">All</a></li>	
				<?php
					
					$categories = get_categories("title_li=&child_of=$catID&order=ASC&orderby=slug");
					foreach ($categories as $category)
					{
						$cat_name = $category->cat_name;
						$cat_nicename = $category->category_nicename;
				?>
			<li><a href="#" data-filter=".<?php echo $cat_nicename?>"><?php echo $cat_name?></a></li>       
				<?php } ?>
		</ul>
			<?php
			if( $guideif =="yes") { 
				 get_breadcrumbs();
			}
			?>
	</div>
<!-- 
//////////////
///slogan///
//////////// 
-->
<?php if($slogan){ ?><div class="slogn_half"><?php echo $slogan; ?></div><?php } else{} ?>
<!-- 
///////////////////
///Start slider///
//////////////////
-->
<?php if ($home_slide_style == "0") { 
/////////////////////////
//Slide Style : Noslide/
///////////////////////
 } else {
 if ($home_slide_style == "1") { 
//////////////////////////////
//Slide Style :Brick Slide //
////////////////////////////
 ?>	
	<div class="slide6u" id="slide6uid">
		<ul class="tabs" id="slide6utab">
	<?php 
		$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => 6,
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
				<div class="slide-back" style="background-color:#<?php echo $color; ?>">
					<h2><?php echo $ImageTit; ?></h2><br>
					<?php if($link) { ?><a href="<?php echo $link ; ?>" title="<?php echo $ImageTit; ?>" class="slidemore"><?php if($idi_readmore){ echo $idi_readmore; } else { _e('Read more','ux'); } ?></a><?php } ?>
				</div><!--slide-back-->
				<div class="slide-back2" style="background-color:#<?php echo $color; ?>">
					<h2><?php echo $ImageTit; ?></h2><br>
					<?php if($link) { ?><span class="slidemore"><?php if($idi_readmore){ echo $idi_readmore; } else { _e('Read more','ux'); } ?></span><?php } ?>
				</div><!--slide-back2-->
			</li>
	<?php } //end each  ?>
		</ul>
		<ul class="bgimg" id="slide6ubgimg">
	<?php $args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts' => 6,
		'post_status' => null,
		'order' => $slideorder,
		'orderby' => $slideorderby,
		'post_parent' => $post->ID
		);
		$attachments = get_posts( $args );
			foreach ( $attachments as $attachment ) {
				$src = wp_get_attachment_image_src( $attachment->ID, 'slidehalf' );
	?>			
				<li>
					<div style="background-image:url(<?php echo $src[0]; ?>); margin-right:5px;margin-bottom:5px;"></div>
					<div style="background-image:url(<?php echo $src[0]; ?>); margin-right:5px;margin-bottom:5px;"></div>
					<div style="background-image:url(<?php echo $src[0]; ?>); margin-bottom:5px;"></div>
					<div style="background-image:url(<?php echo $src[0]; ?>); margin-right:5px;"></div>
					<div style="background-image:url(<?php echo $src[0]; ?>); margin-right:5px;"></div>
					<div style="background-image:url(<?php echo $src[0]; ?>);"></div>
				</li>
	<?php	} //end each ?>
			</ul>
			<div class="clear"></div>
			<div id="load">
				<img src="<?php echo get_template_directory_uri(); ?>/img/loading-w.gif" alt="loading" /><p>loading</p>
			</div><!--load-->
	</div><!--slide6u-->
<!-- 
////////////////////////
///Start Mobile Slide///
///////////////////////
-->	
	<div class="flexslider slidehalf-mobile">
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
	    		<a href="<?php echo $link; ?>" title="<?php echo $ImageTit; ?>"><img src="<?php echo $Img[0]; ?>" alt="<?php echo $ImageTit; ?>" /></a>
	    		<p class="flex-caption"><span><?php echo $ImageTit; ?></span></p>
	    	</li>
		<?php } //end each?>	
		</ul>
	</div><!--End flwxslider-->
<!-- 
////////////////////////
///End Mobile Slide///
///////////////////////
-->	
<?php  } else if($home_slide_style == "2"){ 
//////////////////////////////
//Slide Style :Nivo Slider //
////////////////////////////
$nivo_effect = get_post_meta(get_the_ID(), "idi_nivo_effect", true); 
if ( !$nivo_effect ) $nivo_effect = 'fade';
$nivo_slices = get_post_meta(get_the_ID(), "idi_nivo_slices", true); 
if ( !$nivo_slices ) $nivo_slices = 3;
$nivo_animSpeed = get_post_meta(get_the_ID(), "idi_nivo_animSpeed", true); 
if ( !$nivo_animSpeed ) $nivo_animSpeed = 500;
?>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('#slidehalf #slider').nivoSlider({
		effect:'<?php echo $nivo_effect; ?>',
		slices:<?php echo $nivo_slices;?>,
		animSpeed:<?php echo $nivo_animSpeed; ?>, //Slide transition speed
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
<div id="slidehalf"> 
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
			$large_image_url = wp_get_attachment_image_src( $attachment->ID, 'slidehalf' );
			$thumb_image_url = wp_get_attachment_image_src( $attachment->ID, 'slide-thumb' );
			$i = $i + 1;
		?>
		<a href="<?php echo $link; ?>" title="<?php echo $ImageTit; ?>" ><img src="<?php echo $large_image_url[0];?>" alt="" rel="<?php echo $thumb_image_url[0];?>" /></a>
<?php } //end each ?>
   	</div><!-- slider -->
</div><!-- slidehalf -->	
<!-- 
////////////////////////
///Start Mobile Slide///
///////////////////////
-->	
	<div class="flexslider slidehalf-mobile">
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
	    		<a href="<?php echo $link; ?>" title="<?php echo $ImageTit; ?>"><img src="<?php echo $Img[0]; ?>" alt="<?php echo $ImageTit; ?>" /></a>
	    		<p class="flex-caption"><span><?php echo $ImageTit; ?></span></p>
	    	</li>
		<?php } //end each?>	
		</ul>
	</div><!--End flwxslider-->
<!-- 
////////////////////////
///End Mobile Slide///
///////////////////////
-->
<?php } ?>
 <?php
 } // End Slide style 
?>
<!-- ////////////
////AD middle //
/////////////-->
<?php
$adfrontmiddle = get_post_meta(get_the_ID(), "idi_pagead_middle", true); 
if( $adfrontmiddle ) {
?>
	<div class="adinpage_wrap_half"><?php echo $adfrontmiddle; ?></div>
<?php		
}
?>
<!-- 
///////////////////////
/// Quarter Slogan////
/////////////////////
-->
<?php if ($quote) { ?><div class="quote_half"><?php echo $quote;?></div><?php }else{}?>
<!-- 
///////////////////
///Items show/////
//////////////////
-->
<ul id="list_wrap"<?php if($col == "") $col="3"; if($col == "2") {?> class="list_wrap_col2_c1"<?php }else if($col == "3"){}?>>
	<?php
			
			//MAIN LOOP
			$args = array(
				'posts_per_page'=> -1,
				'cat' => $catID,
				'post_type'=>array('post','gallery'),
				'order'=>$list_order, 
				'orderby'=>$list_order_by
			);
			//$my_query = new WP_Query("posts_per_page=-1&cat=$catID&order=".$list_order."&orderby=".$list_order_by."&post_type=any");
			$my_query = new WP_Query($args);
			
			while ($my_query->have_posts()) : $my_query->the_post(); 
			
			//Get the sub-category
			$terms = get_the_terms( $post->ID, 'category' );  
  
                if ( $terms && ! is_wp_error( $terms ) ) :  
                    $links = array();  
  
                    foreach ( $terms as $term )  
                    {  
                        $links[] = $term->slug;  
                    }  
                    $links = str_replace(' ', '-', $links);  
                    $subcat_nicename = join( " ", $links );  
                else :  
                    $subcat_nicename = '';  
                endif;  
			
	$layoutinlist = get_post_meta(get_the_ID(), "idi_layoutinlist", true);
	if(!$layoutinlist){$layoutinlist='ublognoimg';}
	if ($layoutinlist=='One Image Layout A') { ?>
		<li class="list_box listbox_u1imgonly <?php echo $subcat_nicename; ?>"><h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		</li>
		<?php } //END layout One Image Layout A
		else if ($layoutinlist=='One Image Layout B') { ?>
		<li class="list_box listbox_u1imgonly2 <?php echo $subcat_nicename; ?>">
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		</li>
		<?php } //END layout One Image Layout B
		else if($layoutinlist=='3 Images') {?>
		<li class="list_box listbox_u3imgs <?php echo $subcat_nicename; ?>">
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
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'u3imgs1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'u3imgs' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<li>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
			</li>
		<?php
			} // end each
		 } // end if
		?>
		</ul><div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo $idi_readmore; }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout 3 Images  
		else if($layoutinlist=='5 Images') { ?>
		<li class="list_box listbox_u5imgs <?php echo $subcat_nicename; ?>">
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
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'u5imgs1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'u5imgs' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' ) ;
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<li>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
			</li>
		<?php
			} // end each
		 } // end if
		?>
		</ul><div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo $idi_readmore; }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout 5Images  
		else if($layoutinlist=='ufullimg') { ?>
		<li class="list_box listbox_ufullimg <?php echo $subcat_nicename; ?>">
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<div class="back"><div class="backbg"></div>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" rel="prettyPhoto[]"><div class="icozoom"></div></a>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="icomore"></div></a>
			</div><?php echo $Img; ?>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		</li>
		<?php } //END layout  fullimg 
		else if($layoutinlist=='u1imgm') { ?>
		<li class="list_box listbox_u1imgm <?php echo $subcat_nicename; ?>">
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
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
			<div class="expert"><?php the_excerpt(); ?></div>
		<?php
			} // end each
		 } // end if
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo $idi_readmore; }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout u1imgm 
		else if($layoutinlist=='u1imgb') { ?>
		<li class="list_box listbox_u1imgb <?php echo $subcat_nicename; ?>">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo $idi_readmore; }else{ _e('Read more','ux'); } ?></a>
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		</li>
		<?php } //END layout u1imgb 
		else if($layoutinlist=='ublog1img') { ?>
		<li class="list_box listbox_ublog1img <?php echo $subcat_nicename; ?>">
		<?php $args = array(
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_status' => null,
		'post_parent' => $post->ID
		 );
		$attachments = get_posts( $args );
		if ( $attachments ) {
			foreach ( $attachments as $attachment ) {
				if($col == "2"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg1c' );
				}else if($col == "3"){
				$Img = wp_get_attachment_image( $attachment->ID, 'ufullimg' );
				}
			$ImageUrl = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$ImageTit = apply_filters('the_title', $attachment->post_title);
			?>
			<?php if($idi_lightbox == "true") { ?>
			<a href="<?php echo $ImageUrl[0];?>" title="<?php the_title(); ?>" class="imgwrap" rel="prettyPhoto[]"><div class="back"><div class="backbg"></div><div class="icoimage"></div></div><?php echo $Img; ?></a>
			<?php }else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $Img; ?></a>
			<?php } ?>
		<?php
			} // end each
		 } // end if
		?>
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p class="date"><?php the_time('d M Y'); ?></p>
		<div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo $idi_readmore; }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout ublog1img 
		else if($layoutinlist=='ublognoimg') { ?>
		<li class="list_box listbox_ublog1img <?php echo $subcat_nicename; ?>">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p class="date"><?php the_time('d M Y'); ?></p>
		<div class="expert"><?php the_excerpt(); ?></div>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="readmore"><?php if($idi_readmore) { echo $idi_readmore; }else{ _e('Read more','ux'); } ?></a>
		</li>
		<?php } //END layout ublognoimg  
		else if($layoutinlist=='uvideo') { ?>
		<li class="list_box listbox_uvideo <?php echo $subcat_nicename; ?>">
		<?php 
		$VideoUrl = get_post_meta(get_the_ID(), "idi_video_link", true);
		if (ereg ("youtube", $VideoUrl)) {
		?>
		<div class="video-wrap"><iframe title="YouTube video player" width="100%" height="auto" src="http://www.youtube.com/embed/<?php echo get_youtube_id($VideoUrl);?>?wmode=transparent" frameborder="0" wmode="Opaque"></iframe></div>
		<h2 style="padding-top:20px; padding-bottom:5px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		 <?php
		 } else if (ereg ("vimeo", $VideoUrl)){ 
		 ?>
		<div class="video-wrap"><iframe title="Vimeo video player" src="http://player.vimeo.com/video/<?php echo get_vimeo_id($VideoUrl); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" height="auto" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
		<h2 style="padding-top:20px; padding-bottom:5px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		 <?php
		 } else if (ereg (".swf", $VideoUrl)){ 
		?>
		<div class="video-wrap-swf"><object width="100%" height="auto" codebase="<?php echo $VideoUrl; ?>" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
		<param value="opaque" name="wmode">
		<param value="true" name="allowfullscreen">
		<param value="always" name="allowscriptaccess">
		<param value="<?php echo $VideoUrl; ?>" name="src">
		<param value="high" name="quality">
		<embed width="100%" height="auto" quality="high" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" src="<?php echo $VideoUrl; ?>" type="application/x-shockwave-flash">
		</object></div>
		<h2 style="padding-top:20px; padding-bottom:5px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		 } //End ereg VideoUrl(youtube , vimeo or swf) ?>
		</li>
		<?php } //END layout uvideo 
endwhile; //} End each ?>
	</ul><div class="clear"></div>
<!-- 
///////////////////
///End Items show//
//////////////////
-->
<!--////////
///AD bottom
/////////-->
<?php
if( $adbottom ) { ?>
	<div class="adinpage_wrap_half"><?php echo $adbottom; ?></div>
<?php } // End if ad bottom?>
			</div><!--clum2 main-->
	<!--/////////////
	//sidebar area//
	//////////////-->
	<div id="clum2_sidebar_left">
		<div class="clum2_sidebar_unit">
		<?php 
		if ($sidebar == "") $sidebar = "default";
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) :
		endif;   ?>
		</div><!--clum2_sidebar_unit-->
	</div><!--clum2_sidebar-->
		
	</div><!--End clum2_wrap-->
<?php get_footer(); ?>