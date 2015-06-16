<?php
include("functions/options.php");
define('UX_LOCAL_URL', get_template_directory_uri());
define('UX_LOCAL_PATH', get_template_directory());
get_the_tags();
 ?>
<?php  if ( ! isset( $content_width ) )
$content_width = 600;
/**Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );
if ( ! function_exists( 'twentyten_setup' ) ):
function twentyten_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 585, 200, true );
	add_image_size('ufullimg', 310, 9999, false );
	add_image_size('u3imgs', 103, 103, true );
	add_image_size('u5imgs', 62, 62, true );
	add_image_size('ufullimg1c', 625, 9999, false );
	add_image_size('u3imgs1c', 208, 208, true );
	add_image_size('u5imgs1c', 125, 125, true );
	add_image_size('slide', 940, 373, true );
	add_image_size('slide-thumb', 65, 45, true );
	add_image_size('slidehalf', 625, 415, true );
	add_image_size('gallery', 585, 9999 );
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
}
endif;
function twentyten_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );
/*
Display Title Attribute in Menu 
*/
add_filter('walker_nav_menu_start_el', 'description_in_nav_el', 10, 4);
function description_in_nav_el($item_output, $item, $depth, $args)
{
	return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<span class='subtitle'>{$item->attr_title}</span><", $item_output);
	
}
//remove gallery style
add_filter( 'gallery_style', 'my_gallery_style', 99 );
function my_gallery_style() {
    return "<div class='gallery'>";
}
//allow ico file uploaded
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {

	$existing_mimes['ico'] = 'mime/type';
	return $existing_mimes;
}
/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return '';
}



/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function idi_cust_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
  	<li>
		<div class="avatar">
			<?php echo get_avatar($comment, 28); ?>					
		</div><!--END avatar--> 
        <div class="comment-meta">
			<span class="date"><?php printf('%1$s', get_comment_date('m-d-Y'), get_comment_time()) ?>, <?php  comment_time('g:i a'); ?></span>
			<span class="author"><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></span><span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text'=>__('REPLY','ux'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>		
		</div><!--END comment-mate--> 
		<div class="comment">
			<?php comment_text() ?>
		</div><!--END comment-->
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php _e('Your comment is awaiting moderation','ux'); ?>.</em></p>
<?php endif; ?>				
<?php 
}
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );
?>
<?php
 	///////// Define menu ////////////

add_theme_support('nav_menus');
$avia_config['nav_menus'] = array('ux' => 'Main Menu');
foreach($avia_config['nav_menus'] as $key => $value){ register_nav_menu($key, $value); }
?>
<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'default',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'sidebar_1',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'sidebar_2',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'sidebar_3',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_4',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_5',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_6',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_7',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_8',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_9',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_10',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'sidebar_11',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}

function all_titles($post_or_page)
{
	    global $wpdb;
$results = $wpdb->get_results("SELECT post_title FROM $wpdb->posts
	WHERE post_status = 'publish' AND post_type = '$post_or_page' AND post_parent = '0' ORDER BY post_title");

foreach ($results as $result) {
	$titles[] = $result->post_title;
}
return $titles;
}

function all_names($post_or_page)
{
	    global $wpdb;
$results = $wpdb->get_results("SELECT post_name FROM $wpdb->posts
	WHERE post_status = 'publish' AND post_type = '$post_or_page' AND post_parent = '0' ORDER BY post_title");

foreach ($results as $result) {
	$names[] = $result->post_name;
}
return $names;
}

function all_IDs($post_or_page)
{
	    global $wpdb;
$results = $wpdb->get_results("SELECT ID FROM $wpdb->posts
	WHERE post_status = 'publish' AND post_type = '$post_or_page' AND post_parent = '0' ORDER BY post_title");

foreach ($results as $result) {
	$IDs[] = $result->ID;
}
return $IDs;
}


function all_categories()
{
	    global $wpdb;
$results = $wpdb->get_results("SELECT name FROM $wpdb->terms
	INNER JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
	WHERE $wpdb->term_taxonomy.taxonomy = 'category'");

foreach ($results as $result) {
	$categories[] = $result->name;
}
return $categories;
}

function all_cat_names()
{
	    global $wpdb;
$results = $wpdb->get_results("SELECT name FROM $wpdb->terms
	INNER JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
	WHERE $wpdb->term_taxonomy.taxonomy = 'category'");

foreach ($results as $result) {
	$names[] = $result->name;
}
return $names;
}

function all_cat_ids()
{
	    global $wpdb;
$results = $wpdb->get_results("SELECT term_taxonomy_id FROM $wpdb->term_taxonomy
	INNER JOIN $wpdb->terms ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
	WHERE $wpdb->term_taxonomy.taxonomy = 'category'");

foreach ($results as $result) {
	$ids[] = $result->term_taxonomy_id;
}
return $ids;
}

function what_to_show($option, $default) {
	if ($option == "") echo $default; else echo $option;
}

function better_excerpt($text, $excerpt_length) {
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		// replace </p> with <br> and remove <p>
		$text = str_replace("<p>", "", $text);
		$text = str_replace("</p>", "<br/>", $text);
		$text = strip_tags($text, "<br/>");
		$text = str_replace("<br>", "", $text);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
		}
		$text = ltrim($text, "<br>");
		$text = trim($text);
		if ($text == "/>") $text = "";
		if (substr($text, 0, 2) == "/>") $text = substr($text, 2);
	//return "<p>$text</p>";
	return "$text";
}

// Get all image urls from an html document
function get_all_img_urls($data)
{
$images = array();
preg_match_all('/(img|src)\=(\"|\')[^\"\'\>]+/i', $data, $media);
unset($data);
$data=preg_replace('/(img|src)(\"|\'|\=\"|\=\')(.*)/i',"$3",$media[0]);
foreach($data as $url)
{
	$info = pathinfo($url);
	if (isset($info['extension']))
	{
		if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') ||
		($info['extension'] == 'gif') || ($info['extension'] == 'png'))
		array_push($images, $url);
	}
}
return $images;
}

// Get all image urls from an html document
function get_all_img_alts($data)
{
$alts = array();
preg_match_all('/(alt)\=(\"|\')[^\"\'\>]*/i', $data, $media);
unset($data);
$data=preg_replace('/(alt)(\"|\'|\=\"|\=\')(.*)/i',"$3",$media[0]);
foreach($data as $alt)
{
	array_push($alts, $alt);
}
return $alts;
}
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function strip_single_tags($tags, $string)
{
    foreach( $tags as $tag )
    {
        $string = preg_replace('#</?'.$tag.'[^>]*>#is', '', $string);
    }
	
	//remove empty a and p
	$string = preg_replace('/<a[^>]*><\\/a[^>]*>/', '', $string);
	$string = preg_replace('/<p[^>]*><\\/p[^>]*>/', '', $string);
    return $string;
}

/**/
function ux_testimonials($atts, $content = null) {
	//extract(shortcode_atts(array("id" => '', "no" => ''), $atts));
	
	$id = $atts["id"];
	$no = $atts["no"];
	$h1 = $atts["h1"];
	
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	if ($no == "") $no = -1;
	$query = "cat=$id&posts_per_page=$no&orderby=date&order=DESC";

	$wp_query->query($query);
	ob_start();
	?>
<div class="slider-fade">
<?php
if ($h1)
{
?>
<h1><?php echo get_cat_name($id)?></h1>
<?php
}
?>
<div class="slider-fade-content box-light">
<ul>
<?php 
while ($wp_query->have_posts()) : $wp_query->the_post();
$k++;
$link_text = get_post_meta(get_the_ID(), "ux_link-text", true);
$link_url = get_post_meta(get_the_ID(), "ux_link-url", true);
?>
				<li <?php if ($k != 1) {?> style="display:none" <?php } ?>>
				<?php the_content(); ?>
				<p class="authors"><?php the_title(); ?>
                <?php
				if ($link_text != "")
				{
				?>
                <br/><a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
                <?php
				}
				?>
                </p>
				</li>
<?php endwhile; ?>
			</ul><!--END ul-->
				
			</div><!--END slider-fade-content-->
			
		</div><!--END slider-fade-->
	<?php $wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	//return $content;
	echo $content;
}

remove_action('wp_head', 'wp_generator');
function change_menu_class($menu) {
	$menu = str_replace('<div class="menu"', '<div class="nav"', $menu);
	return $menu;
}
add_filter('wp_page_menu', 'change_menu_class');

function ux_cloud_filter($args = array()) {
   $args['smallest'] = 11;
   $args['largest'] = 11;
   $args['unit'] = 'px';
   return $args;
}
add_filter('widget_tag_cloud_args', 'ux_cloud_filter', 90);
// helper function can be defined in another plugin
if(!function_exists('bf_smart_multiwidget_update')){
	function bf_smart_multiwidget_update($id_prefix, $options, $post, $sidebar, $option_name = ''){
		global $wp_registered_widgets;
		static $updated = false;
		// get active sidebar
		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();		
		// search unused options
		foreach ( $this_sidebar as $_widget_id ) {
			if(preg_match('/'.$id_prefix.'-([0-9]+)/i', $_widget_id, $match)){
				$widget_number = $match[1];
				
				// $_POST['widget-id'] contain current widgets set for current sidebar
				// $this_sidebar is not updated yet, so we can determine which was deleted
				if(!in_array($match[0], $_POST['widget-id'])){
					unset($options[$widget_number]);
				}
			}
		}
		
		// update database
		if(!empty($option_name)){
			update_option($option_name, $options);
			$updated = true;
		}
		
		// return updated array
		return $options;
	}
}
function reduce_width_height($html, $max_width)
{
    $w_start = 9;
	$w_end = 10;
	$h_end = 10;
    while ($w_start != 7)
    {
				$w_start = strpos($html, "width=", $w_end + 1) + 7;
				$w_end = strpos($html, '"', $w_start + 1);
				$width = substr($html, $w_start, $w_end - $w_start);
				$h_start = strpos($html, "height=", $h_end + 1) + 8;
				$h_end = strpos($html, '"', $h_start + 1);
				$height = substr($html, $h_start, $h_end - $h_start);
    
        if ($width > $max_width)
        {
            $new_width = $max_width;
            $new_height = ceil(($max_width * $height) / $width);
            $old_w = 'width="'.$width.'"';
            $new_w = 'width="'.$new_width.'"';
            $old_h = 'height="'.$height.'"';
            $new_h = 'height="'.$new_height.'"';
            $html = str_replace($old_w, $new_w, $html); 
            $html = str_replace($old_h, $new_h, $html);
        }
    }
    return $html;
    
}

function get_youtube_id($url)
{
	preg_match('#http://w?w?w?.?youtube.com/watch\?v=([A-Za-z0-9\-_]+)#s', $url, $matches);
	return $matches[1];
}
function get_vimeo_id($url)
{
	$matches = parse_url($url);
	$matches = str_replace("/","",$matches[path]);
	return $matches;
}

function get_video_img($url)
{

	preg_match('#http://w?w?w?.?youtube.com/watch\?v=([A-Za-z0-9\-_]+)#s', $url, $matches);
	$youtube_thumbnail = 'http://img.youtube.com/vi/' . $matches[1] . '/0.jpg';
	
	//preg_match('#http://w?w?w?.?vimeo.com/([A-Za-z0-9\-_]+)#s', $url, $matches);
	
	//$vimeo_url = 'http://vimeo.com/api/v2/video/' . $matches[1] . '.php';
	
	return $youtube_thumbnail;
}

function is_youtube($video_url)
{
	if (strpos($video_url, "youtube.com")) return 1; else return 0;
}
function is_vimeo($video_url)
{
	if (strpos($video_url, "vimeo.com")) return 1; else return 0;
}
function is_swf($video_url)
{
	if (strpos($video_url, ".swf")) return 1; else return 0;
}

function get_image_alt($image, $html_content)
{
	$poc = strpos($html_content, $image);
	$poc = strpos($html_content, 'alt="', $poc + 1);
	$kraj = strpos($html_content, '"', $poc + 5);
	$alt = substr($html_content, $poc + 5, $kraj - $poc - 5);

return $alt;	
}

function only_characters($string)
{
	$pattern = '/[^A-Za-z0-9:.\/_-]/';
	$clean = preg_replace($pattern,'',$string);
	return $clean;
}
function no_comments($no)
{
	if ($no == 0) return "no comments";
	if ($no == 1) return "1 comment";
	if ($no > 1) return "$no comments";
}

// Adds a rel="prettyPhoto" tag to all linked image files
add_filter('the_content', 'addlightboxrel_replace', 12);
add_filter('get_comment_text', 'addlightboxrel_replace');
add_filter('wp_get_attachment_image', 'addlightboxrel_replace');
function addlightboxrel_replace ($content)
{   global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 rel="prettyPhoto['.$post->ID.']"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
//breadcrumbs
function get_breadcrumbs()
{
    global $wp_query;
 
    if ( !is_home() ){
 
        // Start the UL
        echo '<ul class="breadcrumbs">';
        // Add the Home link
        echo '<li><a href="'. home_url() .'">';
		_e('Home','ux');
		echo '</a></li>';
        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li> : ". get_category_parents( $cat, TRUE, " : " )  ;
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li> : ";
			_e('Archives','ux');
			echo "</li>";
        }
        elseif ( is_search() ) {
 
            echo "<li> : ";
			_e('Search Results','ux');
			echo "</li>";
        }
        elseif ( is_404() )
        {
            echo "<li> : ";
			_e('404 Not Found','ux');
			echo "</li>";
        }
        elseif ( is_single() )
        {
            $category = get_the_category();
            $category_id = get_cat_ID( $category[0]->cat_name );
 
            echo '<li> : '. get_category_parents( $category_id, TRUE, " : " );
            echo the_title('','', FALSE) ."</li>";
        }
        elseif ( is_page() || ($template == "blog.php") )
        {
            $post = $wp_query->get_queried_object();
 
            if ( $post->post_parent == 0 ){
 
                echo "<li> : ".the_title('','', FALSE)."</li>";
 
            } else {
                $title = the_title('','', FALSE);
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                array_push($ancestors, $post->ID);
 
                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        echo '<li> : <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
                    } else {
                        echo '<li> : '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
                    }
                }
            }
        }
 
        // End the UL
        echo "</ul>";
    }
}
//EDN breadcrumbs

add_action('after_setup_theme', 'my_theme_setup');
//muti languages
function my_theme_setup(){
load_theme_textdomain('ux', get_template_directory() . '/languages');
}


//add image for slide

function attachment_url_extra( $form_fields, $post ) {
	$post->post_type == 'attachment';
	//Brick Color form
	$form_fields[ 'brick_color' ] = array(
		'label' => __( 'Block Color','ux' ),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, '_brick_color', true )
	);
	$form_fields[ 'brick_color' ][ 'label' ] = __( 'Block Color','ux' );
	$form_fields[ 'brick_color' ][ 'input' ] = "html";
	$form_fields[ 'brick_color' ][ 'html' ] = "<input class='color' id='attachments[{$post->ID}][brick_color]' name='attachments[{$post->ID}][brick_color]' value='".get_post_meta( $post->ID, '_brick_color', true )."'><p class='help'>Block Color for Brick slide</p>";
	//link form
	$form_fields[ 'link_to' ] = array(
		'label' => __( 'Slide Link','ux' ),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, '_link_to', true )
	);
	$form_fields[ 'link_to' ][ 'label' ] = __( 'Slide Link','ux' );
	$form_fields[ 'link_to' ][ 'input' ] = 'html';
	$form_fields[ 'link_to' ][ 'html' ] = "<input type='text' class='text urlfield' id='attachments[{$post->ID}][brick_color]' name='attachments[{$post->ID}][link_to]' value='".get_post_meta( $post->ID, '_link_to', true )."'><p class='help'>Enter a link URL for slide </p>";
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'attachment_url_extra', NULL, 2 );

function attachment_url_extra_save( $post, $attachment ) {
	if( isset( $attachment[ 'brick_color' ] ) ) {
		if( trim( $attachment[ 'brick_color'] ) == '' ) $post[ 'errors' ][ 'brick_color' ][ 'errors' ][] = __( 'Error! Something went wrong.','ux' );
		else update_post_meta( $post[ 'ID' ], '_brick_color', $attachment[ 'brick_color' ] );
	}
	if( isset( $attachment[ 'link_to' ] ) ) {
		if( trim( $attachment[ 'link_to'] ) == '' ) $post[ 'errors' ][ 'link_to' ][ 'errors' ][] = __( 'Error! Something went wrong.','ux' );
		else update_post_meta( $post[ 'ID' ], '_link_to', $attachment[ 'link_to' ] );
	}
	return $post;
}
add_filter( 'attachment_fields_to_save', 'attachment_url_extra_save', NULL, 2 );


//load out function

require_once locate_template('/functions/custom_fields.php');


/* Register frontend javascripts: */

function ux_frontend_js(){	
	
	wp_register_script( 'ux-default', UX_LOCAL_URL.'/js/main.js', 'jquery', "1.6.4", true);
	wp_register_script( 'ux-prettyPhoto',  UX_LOCAL_URL.'/js/prettyPhoto.js', 'jquery', "3.1.3", true);
	wp_register_script( 'ux-isotope', UX_LOCAL_URL.'/js/jquery.isotope.js', 'jquery', "1.5.1", true);
	wp_register_script( 'ux-flexslider',  UX_LOCAL_URL.'/js/jquery.flexslider.js', 'jquery', "1.1.0", true);
	wp_register_script( 'ux-infinitescroll',  UX_LOCAL_URL.'/js/jquery.infinitescroll.min.js', 'jquery', "2.0", true);
	wp_register_script( 'ux-nivoslider',  UX_LOCAL_URL.'/js/jquery.nivo.slider.pack.js', 'jquery', "2.7.1", true);
	wp_register_script( 'ux-map-load-ggserver', 'http://maps.google.com/maps/api/js?sensor=false', 'jquery', "1", true);
	wp_register_script( 'ux-jqueryuimap', UX_LOCAL_URL.'/js/jquery.ui.map.js', 'jquery', "1", true);
	wp_register_script( 'ux-googlefont', UX_LOCAL_URL.'/js/googlefont.js.php', 'jquery', "1.6.4", true);
	
	if (!is_admin()) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'ux-isotope' );
		wp_enqueue_script( 'ux-infinitescroll' );
		wp_enqueue_script( 'ux-nivoslider' );
		wp_enqueue_script( 'ux-flexslider' );
		wp_enqueue_script( 'ux-prettyPhoto' );
		wp_enqueue_script( 'ux-map-load-ggserver' );
		wp_enqueue_script( 'ux-jqueryuimap' );	
		wp_enqueue_script( 'ux-default' );	
		if ( is_singular() ) { 
			wp_enqueue_script( "comment-reply" ); 
		}
		wp_enqueue_script( 'ux-googlefont' );
	}
}

add_action('wp_enqueue_scripts', 'ux_frontend_js');

function ux_frontend_styles() {

	 wp_register_style('flexslider-css', UX_LOCAL_URL . '/styles/flexslider.css', array(), '1.8', 'screen'); 
	 wp_register_style('reset-css', UX_LOCAL_URL . '/styles/reset.css', array(), '1.6.4', 'screen'); 
	 wp_register_style('color-stateblue-css', UX_LOCAL_URL . '/styles/color-stateblue.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-sienna-css', UX_LOCAL_URL . '/styles/color-sienna.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-peru-css', UX_LOCAL_URL . '/styles/color-peru.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-orange-css', UX_LOCAL_URL . '/styles/color-orange.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-mediumpurple-css', UX_LOCAL_URL . '/styles/color-mediumpurple.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-grey-css', UX_LOCAL_URL . '/styles/color-grey.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-green-css', UX_LOCAL_URL . '/styles/color-green.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-dodgerblue-css', UX_LOCAL_URL . '/styles/color-dodgerblue.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-blue-css', UX_LOCAL_URL . '/styles/color-blue.css', array(), '1.6.4', 'screen');
	 wp_register_style('color-deeppink-css', UX_LOCAL_URL . '/styles/color-deeppink.css', array(), '1.6.4', 'screen');	 
	 wp_register_style('dark-css', UX_LOCAL_URL . '/styles/dark.css', array(), '1.6.4', 'screen');
	 wp_register_style('light-css', UX_LOCAL_URL . '/styles/light.css', array(), '1.6.4', 'screen');
	 wp_register_style('style-css', UX_LOCAL_URL . '/styles/style.css', array(), '1.6.4', 'screen');
	 wp_register_style('skeleton-css', UX_LOCAL_URL . '/styles/skeleton.css', array(), '1.6.4', 'screen');
	 wp_register_style('prettyPhoto-css', UX_LOCAL_URL . '/styles/prettyPhoto.css', array(), '3.1.3', 'screen'); 
	 wp_register_style('customstyle-css', UX_LOCAL_URL . '/styles/custom-css.css.php', array(), '1.6.4', 'screen');
	 
	 wp_enqueue_style('flexslider-css');
	 wp_enqueue_style('reset-css');
	 
	
	 wp_enqueue_style('style-css');
	 wp_enqueue_style('flexslider-css');
	 wp_enqueue_style('skeleton-css');
	 wp_enqueue_style('prettyPhoto-css');
	 wp_enqueue_style('customstyle-css');
}

add_action('wp_enqueue_scripts', 'ux_frontend_styles');  
?>