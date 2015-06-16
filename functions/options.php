<?php
/* Options */
error_reporting(0);
$themename = "Magazine";
$shortname = "idi";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
	array(	"name" =>  __('Header','ux'),
			"type" => "section"),
			
	array(	"type" => "open"),
	
	array( "name" =>  __('Enable Plain Text Logo','ux'),  
		"desc" => "Check this to enable a plain text logo rather than an image.",  
		"id" => $shortname."_textlogo",  
		"type" => "checkbox",  
		"std" => ""), 
	
	array(	"name" =>  __('Custom Logo','ux'),  
			"desc" => "Specify the image address of your online logo. ",
			"id" => $shortname."_logo",
			"std" => "",
			"type" => "text"),
	
	array( "name" =>  __('Enable search bar','ux'),  
		"desc" => "",  
		"id" => $shortname."_searchbar",  
		"type" => "checkbox",  
		"std" => ""),	
			
	array(	"name" => "Facebook URL",
			"desc" =>  __('Optional, for Facebook icon','ux'),
			"id" => $shortname."_facebook",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Twitter URL",
			"desc" => "",
			"id" => $shortname."_tweet",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "LinkedIn URL",
			"desc" => "",
			"id" => $shortname."_linkedin",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Flickr URL",
			"desc" => "",
			"id" => $shortname."_flickr",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Youtube URL",
			"desc" => "",
			"id" => $shortname."_youtube",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Vimeo URL",
			"desc" => "",
			"id" => $shortname."_vimeo",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Blogger URL",
			"desc" => "",
			"id" => $shortname."_blogger",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Last.fm URL",
			"desc" => "",
			"id" => $shortname."_lastfm",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Email adderss",
			"desc" =>  __('For email icon','ux'),
			"id" => $shortname."_iconmail",
			"std" => "",
			"type" => "text"),	

	array(	"name" => "Rss URL",
			"desc" => "",
			"id" => $shortname."_rss",
			"std" => "",
			"type" => "text"),				
	
	array(	"type" => "close"),	

	array(	"name" => __('General','ux'),
			"type" => "section"),
			
	array(	"type" => "open"),
	
	array(	"name" =>  __('Custom Favicon','ux'),  
			"desc" => __('16px x 16px Ico/Png/Gif image that will represent your website\'s favicon.','ux'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "text"),
			
	array(	"name" =>  __('Custom Mobile Bookmark Icon','ux'),  
			"desc" => "This icon is used by Android (v2.1+) and iPhones to display home screen bookmarks. Recommended image size 129 x 129, saved in PNG format",
			"id" => $shortname."_mobileicon",
			"std" => "",
			"type" => "text"),			
			
	array( "name" => __('Skin','ux'),  
		"desc" => "",   
		"id" => $shortname."_skin",  
		"type" => "select", 
		"options" => array("Please Select","dark", "light"),  
		"std" => "dark"), 	
		
	array(	"name" => __('Color scheme','ux'),
			"desc" => "",
			"id" => $shortname."_font_color",
			"type" => "selectcolor",
			"std" => "sienna"), 
	
	array(	"name" => __('Background color','ux'),
			"desc" => __('Enter color code','ux'),
			"id" => $shortname."_colorbg",
			"std" => "",
			"type" => "colorbox"),
	
	array( "name" => __('Background Pattern','ux'),  
		"desc" => "",  
		"id" => $shortname."_pattern",  
		"type" => "selectpattern",   
		"std" => ""), 
	
	array(	"name" => __('Enable Custom Background Pattern','ux'),
			"desc" => "",
			"id" => $shortname."_customif",
			"std" => "",
			"type" => "checkbox"),	
	
	array(	"name" => __(' Custom Background Pattern Image url','ux'),
			"desc" => __('Optional, Png/Jpg/Gif format','ux'),
			"id" => $shortname."_custombg",
			"std" => "",
			"type" => "text"),	
		
	array( "name" => __('Background Pattern repeat or not','ux'),  
		"desc" => __('Optional','ux'),  
		"id" => $shortname."_repeat",  
		"type" => "select",  
		"options" => array("","repeat", "no-repeat","repeat-x","repeat-y"),  
		"std" => ""), 
		
	array( "name" => __('Background Pattern fixed or not','ux'),  
		"desc" => __('Optional','ux'),   
		"id" => $shortname."_fix",  
		"type" => "select",  
		"options" => array("","fixed", "scroll"),  
		"std" => ""), 
	
	array(	"name" => __('Heading Font','ux'),
			"desc" => "",
			"id" => $shortname."_font",
			"type" => "select",
			"options" => array("Abel", "Righteous", "Signika", "Ribeye", "Niconne", "Iceland", "Knewave", "Smokum", "Arapey", "Redressed", "Petrona", "Cookie", "Snippet", "Prata", "Smythe", "Meddon", "Aclonica", "Julee", "Satisfy", "Voltaire", "Sancreek", "Montez", "Quicksand", "Rosario", "Limelight", "Metrophobic", "Rationale", "Marvel", "Questrial", "Vidaloka", "Candal", "Yellowtail", "Lora", "Salsa", "Kenia", "Actor", "Rokkitt", "Lekton", "Federant", "Numans", "Podkova", "Lato", "Andika", "Damion"),	
			"std" => ""), 
			
	array( "name" =>  __('Enable Lightbox','ux'),  
		"desc" => "Check this to enable the Lightbox in waterfall list.",  
		"id" => $shortname."_lightbox",  
		"type" => "checkbox",  
		"std" => ""), 
	
	array(	"name" => __('Readmore button','ux'),
			"desc" => "",
			"id" => $shortname."_readmore",
			"std" => __('Read more','ux'),
			"type" => "text"),
	
	array(	"name" => __('Article number of each archive page','ux'),
			"desc" => __('default 15','ux'),
			"id" => $shortname."_number_index",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => __('Article number of each search result page','ux'),
			"desc" => __('default 15','ux'),
			"id" => $shortname."_number_search",
			"std" => "",
			"type" => "text"),
	
	array(	"name" => __('Comment Form Title','ux'),
			"desc" => "",
			"id" => $shortname."_respondtit",
			"std" => __('LEAVE A REPLY','ux'),
			"type" => "text"),
	
	array(	"name" => __('Comment Form button','ux'),
			"desc" => "",
			"id" => $shortname."_respondsend",
			"std" => __('Submit','ux'),
			"type" => "text"),
	
	array(	"name" => "Custom CSS code",
			"desc" => __('You could customize the css code what you want. e.g. body{background-color:#000}','ux'),
			"id" => $shortname."_customcss",
			"std" => "",
			"type" => "textarea"),				
	
	array(	"type" => "close"),
			
	array(	"name" => __('Footer','ux'),
			"type" => "section"),
			
	array(	"type" => "open"),
	
	array(	"name" => __('Copyright','ux'),
			"desc" => __('e.g. Copyright 2015 Powered by WordPress. Magazine Theme by Bwsm','ux'),
			"id" => $shortname."_copyright",
			"std" => "",
			"type" => "textarea"),
	
	array( "name" => __('Contact infomation','ux'),  
		"desc" => __('Show the contact information and form in footer','ux'), 
		"id" => $shortname."_contactinfo",  
		"type" => "select",  
		"options" => array("not show","click to show", "show by default"),  
		"std" => "not show"), 						
			
	array(	"name" => __('Address Title','ux'),
			"desc" => __('e.g. Our Address','ux'),
			"id" => $shortname."_addresstitle",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => __('Address Details','ux'),
			"desc" => "",
			"id" => $shortname."_addressdetails",
			"std" => "123 Room, Buliding, 321 Street, USA, NY &lt;br /&gt;Phone: (000) 765-4321 &lt;br /&gt;Fax: (000) 765-4321&lt;br /&gt;&lt;br /&gt;Email: &lt;a href=&quot;mailto:uiueux@gmail.com&quot;&gt;uiueux@gmail.com&lt;/a&gt;&lt;br /&gt;Website: &lt;a href=&quot;http://www.uiueux.com/&quot;&gt;www.uiueux.com&lt;/a&gt;",
			"type" => "textarea"),
	
	array( "name" => "Email",  
		"desc" => __('Please enter a email address which you want receive message from the contact form','ux'), 
		"id" => $shortname."_mailto",  
		"type" => "text",  
		"std" => ""), 

	array(	"name" => __('Contact form Title','ux'),
			"desc" => __('e.g. Leave a Message','ux'),
			"id" => $shortname."_contactTitle",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => __('Contact form Button','ux'),
			"desc" => "",
			"id" => $shortname."_contactButton",
			"std" => __('Send','ux'),
			"type" => "text"),
			
	array(	"name" => __('Enable Random Verify Number','ux'),
			"desc" => "",
			"id" => $shortname."_verify",
			"std" => "",
			"type" => "checkbox"),			
			
	array(	"name" => __('Facebook URL','ux'),
			"desc" => __('Optional, for Facebook icon','ux'),
			"id" => $shortname."_foot_facebook",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Twitter URL",
			"desc" => "",
			"id" => $shortname."_foot_tweet",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "LinkedIn URL",
			"desc" => "",
			"id" => $shortname."_foot_linkedin",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Flickr URL",
			"desc" => "",
			"id" => $shortname."_foot_flickr",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Youtube URL",
			"desc" => "",
			"id" => $shortname."_foot_youtube",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Vimeo URL",
			"desc" => "",
			"id" => $shortname."_foot_vimeo",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Blogger URL",
			"desc" => "",
			"id" => $shortname."_foot_blogger",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "Last.fm URL",
			"desc" => "",
			"id" => $shortname."_foot_lastfm",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => __('Email adderss','UX'),
			"desc" => __('For email icon','UX'),
			"id" => $shortname."_foot_iconmail",
			"std" => "",
			"type" => "text"),	

	array(	"name" => "Rss URL",
			"desc" => "",
			"id" => $shortname."_foot_rss",
			"std" => "",
			"type" => "text"),							
						
	array(	"type" => "close"),
	
	array(	"name" =>  __('Advertising in post','ux'),
			"type" => "section"),
			
	array(	"type" => "open"),
	
	array( "name" =>  __('Top of post','ux'),  
		"desc" => "<img src=".get_template_directory_uri()."/functions/images/adposttop.png><br>". __('Please enter the AD code.','ux')."<br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot;&gt;&lt;/a&gt;",  
		"id" => $shortname."_adposttop",  
		"type" => "textarea",  
		"std" => ""), 
	
	array( "name" =>  __('After content','ux'),  
		"desc" => "<img src=".get_template_directory_uri()."/functions/images/adpostcontent.png><br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot;&gt;&lt;/a&gt;",  
		"id" => $shortname."_adpostcontent",  
		"type" => "textarea",  
		"std" => ""), 
	
	array( "name" =>  __('Bottom of post','ux'),  
		"desc" => "<img src=".get_template_directory_uri()."/functions/images/adpostbottom.png><br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot;&gt;&lt;/a&gt;",  
		"id" => $shortname."_adpostbottom",  
		"type" => "textarea",  
		"std" => ""), 
			
	array(	"type" => "close")	
);

function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	$the_value = stripslashes($_REQUEST[$value['id']]);
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $the_value  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=options.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=options.php&reset=true");
die;
 
}
}
 
add_theme_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_template_directory_uri();
wp_register_script('customfields', (get_template_directory_uri() .'/functions/custom_fields.js'), false);
wp_enqueue_script('customfields');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_style("customfieldscss", $file_dir."/functions/custom_fields.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");
wp_enqueue_script( 'my-theme-options', get_template_directory_uri() . '/jscolor/jscolor.js');
wp_enqueue_script('rm_script');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');
}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.esc_html($themename).' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.esc_html($themename).' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo esc_html($themename); ?> Settings</h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo esc_html($themename); ?> theme, you can use the menu below.</p>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_html($value['name']); ?></label>
 	<input name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="<?php echo esc_attr($value['type']); ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(stripslashes(get_option( $value['id']))  ); } else { echo esc_attr($value['std']); } ?>" />
 <small><?php echo esc_html($value['desc']); ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name'];  ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'selectcolor':
?>

<div class="rm_input rm_select">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_attr($value['name']); ?></label>
	
<select name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>">
	<option value="" >Please select</option>
	<option <?php if (get_option( $value['id'] ) == 'grey') { echo 'selected="selected"'; } ?> style="background-color:#999999">grey</option>
	<option <?php if (get_option( $value['id'] ) == 'mediumpurple') { echo 'selected="selected"'; } ?> style="background-color:#b932ff">mediumpurple</option>
	<option <?php if (get_option( $value['id'] ) == 'green') { echo 'selected="selected"'; } ?> style="background-color:#009b50">green</option>
	<option <?php if (get_option( $value['id'] ) == 'sienna') { echo 'selected="selected"'; } ?> style="background-color:#c82b01">sienna</option>
	<option <?php if (get_option( $value['id'] ) == 'blue') { echo 'selected="selected"'; } ?> style="background-color:#0063dd">blue</option>
	<option <?php if (get_option( $value['id'] ) == 'stateblue') { echo 'selected="selected"'; } ?> style="background-color:#7132ff">stateblue</option>
	<option <?php if (get_option( $value['id'] ) == 'peru') { echo 'selected="selected"'; } ?> style="background-color:#dd6800">peru</option>
	<option <?php if (get_option( $value['id'] ) == 'dodgerblue') { echo 'selected="selected"'; } ?> style="background-color:#108dc8">dodgerblue</option>
	<option <?php if (get_option( $value['id'] ) == 'deeppink') { echo 'selected="selected"'; } ?> style="background-color:#f025ab">deeppink</option>
	<option <?php if (get_option( $value['id'] ) == 'orange') { echo 'selected="selected"'; } ?> style="background-color:#ff3600">orange</option>
</select>

	<small><?php echo esc_attr($value['desc']); ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case 'selectpattern':
?>

<div class="rm_input rm_select">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_attr($value['name']); ?></label>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_01.png) no-repeat;left:210px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_dot_a') { echo 'checked="checked"'; } ?> value="pattern_dot_a" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_02.png) no-repeat;left:250px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_dot_b') { echo 'checked="checked"'; } ?> value="pattern_dot_b" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_03.png) no-repeat;left:290px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_dot_c') { echo 'checked="checked"'; } ?> value="pattern_dot_c" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_04.png) no-repeat;left:330px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_dot_d') { echo 'checked="checked"'; } ?> value="pattern_dot_d" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_05.png) no-repeat;left:370px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_dot_e') { echo 'checked="checked"'; } ?> value="pattern_dot_e" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_06.png) no-repeat;left:410px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_dot_f') { echo 'checked="checked"'; } ?> value="pattern_dot_f" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_07.png) no-repeat;left:450px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_bg_a') { echo 'checked="checked"'; } ?> value="pattern_bg_a" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="background:url(<?php echo esc_url( get_template_directory_uri() ) ; ?>/img/demo/panel_patter_08.png) no-repeat;left:490px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'pattern_bg_b') { echo 'checked="checked"'; } ?> value="pattern_bg_b" name="<?php echo esc_attr($value['id']); ?>"  /></div>
	<div class="pattern" style="left:530px;"><input type="radio" <?php if (get_option( $value['id'] ) == 'nopattern') { echo 'checked="checked"'; } ?> value="nopattern" name="<?php esc_attr($value['id']); ?>"  /></div>
	<small><?php echo esc_attr($value['desc']); ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_attr($value['name']); ?></label>
	
<select name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo esc_attr($option); ?></option><?php } ?>
</select>

	<small><?php echo esc_attr($value['desc']); ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_attr($value['name']); ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" value="true" <?php echo esc_attr($checked); ?> /> <?php _e('Yes','');?>

	<small><?php echo esc_attr($value['desc']); ?></small><div class="clearfix"></div>
 </div>
 <?php
break;
 
case "colorbox":
?>

<div class="rm_input rm_text">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_attr($value['name']); ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="text" id="<?php echo esc_attr($value['id']); ?>"  class="color" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(stripslashes(get_option( $value['id'])  )); } else { echo esc_attr($value['std']); } ?>" name="<?php echo esc_attr($value['id']); ?>" />

	<small><?php echo esc_attr($value['desc']); ?></small><div class="clearfix"></div>
 </div>
  <?php
break;
 
case "upload":
/**/
?>

<div class="rm_input rm_text">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo esc_attr($value['name']); ?></label>
	<input id="<?php echo esc_attr($value['id']); ?>" type="text" size="36" name="<?php echo esc_attr($value['id']); ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(stripslashes(get_option( $value['id'])  )); } else { echo esc_attr($value['std']); } ?>" style="width:230px;" />
	<input id="<?php echo esc_attr($value['id']); ?>_button" type="button" value="Browse" />
<?php
if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
}
?>

<script>
jQuery(document).ready(function() {
jQuery('#<?php echo esc_attr($value['id']); ?>_button').click(function() {
 formfield = jQuery('#<?php echo esc_attr($value['id']); ?>').attr('name');
 tbframe_interval = setInterval(function() {jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use This Image');}, 2000);
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});

window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#' + formfield).val(imgurl);
 tb_remove();
}
});
</script>
<small><?php echo esc_attr($value['desc']); ?></small><div class="clearfix"></div>
 </div>
	<?php
break;

case "section":

$i++;

?>
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php echo esc_url(get_template_directory_uri()); ?>/functions/images/trans.png" class="inactive" alt="""><?php echo esc_attr($value['name']); ?></h3><span class="submit"><input name="save<?php echo esc_attr($i); ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<div style="font-size:9px; margin-bottom:10px;">Icons: <a href="http://www.woothemes.com/2009/09/woofunction/">WooFunction</a></div>
 </div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>