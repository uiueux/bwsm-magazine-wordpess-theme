<?php 

header("Content-type: text/css; charset: UTF-8");
	
require_once('../../../../wp-load.php');


	// Background color image
	//================================================== 
	
	if( get_option('idi_colorbg') ) { ?>
	body{background-color:#<?php echo esc_attr(get_option('idi_colorbg')); ?>;}
	<?php } ?>
	
	<?php if( get_option('idi_customif') == 'true' ) { ?>
	<?php if( get_option('idi_pattern') ) { ?>
	body{background-image:url(<?php echo esc_attr(get_option('idi_custombg')); ?>);  }
	<?php 
	} //idi_pattern
	} else {
	if( get_option('idi_pattern') ) { 
		if( get_option('idi_pattern') == 'pattern_bg_a' || get_option('idi_pattern') == 'pattern_bg_b' ) {
	?>
	body{background-image:url(<?php echo get_template_directory_uri() ; ?>/img/<?php echo esc_attr(get_option('idi_pattern')); ?>.jpg); }
	<?php
		} else if( get_option('idi_pattern') == 'nopattern'){} else { ?>
	body{background-image:url(<?php echo get_template_directory_uri() ; ?>/img/<?php echo esc_attr(get_option('idi_pattern')); ?>.png); }
	<?php 
		}
	}//idi_pattern
	} //idi_customif ?>
	<?php if( get_option('idi_repeat') ) { ?>
	
	body{background-repeat:<?php echo esc_attr(get_option('idi_repeat')); ?>; <?php if($idi_repeat=='no-repeat') { ?>background-position:center top;<?php } else {}?>}
	
	<?php } ?>
	<?php if( get_option('idi_fix') ) { ?>
	
	body{background-attachment:<?php echo esc_attr(get_option('idi_fix')); ?>;}
	
	<?php } 
	
	// Heading Font
	//================================================== 
	
	
	if(  get_option('idi_font') && get_option('idi_font') != 'abel' ) {
		$idi_font = get_option('idi_font');
		echo '.guidewrap, h1, h2, h3, h4, h5,#logo{font-family:'.esc_attr($idi_font).',sans-serif;}';
	} 
	
	// Theme option/custom css open for user
	//==================================================
	
	if( get_option('idi_customcss') ){ 
	
 	echo balanceTags(get_option('idi_customcss'));
	
	} ?>