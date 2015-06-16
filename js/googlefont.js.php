<?php
    
    header('Content-Type: text/javascript; charset=UTF-8');
    
    require_once('../../../../wp-load.php');
	
	$custom_fonts_main = get_option('idi_font');
	
	if ($custom_fonts_main) {
    	$custom_fonts .= "'".$custom_fonts_main."', ";
    }
	
/////////////////////////////////////////////
// GOOGLE WEB FONT FUNCTION
/////////////////////////////////////////////

?>
WebFontConfig = {
    google: { families: [<?php echo esc_attr($custom_fonts); ?>'abel'] }
};

(function() {
	document.getElementsByTagName("html")[0].setAttribute("class","wf-loading")
	//  NEEDED to push the wf-loading class to your head
	document.getElementsByTagName("html")[0].setAttribute("className","wf-loading")
	// for IE
	
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	 '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'false';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();