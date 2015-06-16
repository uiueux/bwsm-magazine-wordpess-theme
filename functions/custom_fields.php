<?php
if ( !class_exists('myCustomFields') ) {
	class myCustomFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = 'idi_';
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/
		var $customFields =	array(
			
			array(
				"name"			=> "page_setting",
				"title"			=> "Layout setting",
				"description"	=> "All the following items are optional",
				"type"			=>	"title",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "layout",
				"title"			=> "Page Layout",
				"description"	=> "",
				"type"			=>	"select-layout",
				"scope"			=>	array(  "page" ),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "select_sidebar",
				"title"			=> "Sidebar",
				"description"	=> "",
				"type"			=> "select-sidebar",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "close",
				"type"			=> "optionclose",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "slide_setting",
				"title"			=>  "Slide settings",
				"description"	=> "",
				"type"			=>	"title",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "slide_setimage",
				"title"			=>  "",
				"description"	=> "You need to upload the slider images from your computer",
				"type"			=>	"slide-btn",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "home_slide_style",
				"title"			=> "Style",
				"description"	=> "",
				"type"			=> "home-slide-style",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "slide_order_by",
				"title"			=> "Order images by",
				"description"	=> "",
				"type"			=> "slide-order-by",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "slide_order",
				"title"			=> "Order",
				"description"	=> "",
				"type"			=> "slide-order",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "numbers_nivo",
				"title"			=> "Nivo Slide - Number of Pictures",
				"description"	=> "e.g. '3'",
				"type"			=> "wormbox",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "nivo_effect",
				"title"			=> "Nivo Slide Effect",
				"description"	=> "",
				"type"			=> "nivo-effect",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "nivo_slices",
				"title"			=> "Nivo Slide Slices",
				"description"	=> "e.g. '3'",
				"type"			=> "wormbox",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "nivo_animSpeed",
				"title"			=> "Nivo Slide transition speed",
				"description"	=> "Default 500 (1000 = 1 second)",
				"type"			=> "wormbox",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "close",
				"type"			=> "optionclose",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "general_setting",
				"title"			=> "General settings",
				"description"	=> "",
				"type"			=>	"title",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "guideif",
				"title"			=> "Show Breadcrumbs",
				"description"	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "slogan",
				"title"			=> "Slogan",
				"description"	=> "e.g.'Design is about how it works, not just how it looks!'",
				"type"			=> "textarea",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "quote",
				"title"			=> "Quoted text",
				"description"	=> "e.g.'Stay hungry, stay foolish! &lt;p align=right&gt;--Steve Jobs&lt;/p&gt;'",
				"type"			=> "textarea",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "close",
				"type"			=> "optionclose",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "item_setting",
				"title"			=> "List settings",
				"description"	=> "",
				"type"			=>	"title",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "home_promotion_cat",
				"title"			=> "List - Category",
				"description"	=> "Please select the category what you want to show in list",
				"type"			=> "select-cat",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "home_promotion_nums",
				"title"			=> "List - Number of posts",
				"description"	=> "Number of posts in one page",
				"type"			=> "wormbox",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "list_order_by",
				"title"			=> "Order posts by",
				"description"	=> "",
				"type"			=> "list-order-by",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "list_order",
				"title"			=> "Order",
				"description"	=> "",
				"type"			=> "list-order",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "pagination",
				"title"			=> "Pagination",
				"description"	=> "",
				"type"			=> "select-pagination",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "col",
				"title"			=> "Columns",
				"description"	=> "",
				"type"			=> "select-col",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options"
			),
			
			array(
				"name"			=> "close",
				"type"			=> "optionclose",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "ad_setting",
				"title"			=> "Advertising settings",
				"description"	=> "",
				"type"			=>	"title",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "pagead_top",
				"title"			=> "Top of page",
				"description"	=> "Please enter the AD code.<br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot;&gt;&lt;/a&gt;",
				"type"			=> "textareaadtop",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "pagead_middle",
				"title"			=> "Middle of page",
				"description"	=> "Please enter the AD code.<br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot;&gt;&lt;/a&gt;",
				"type"			=> "textareaadmiddle",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "pagead_insert",
				"title"			=> "Insert List",
				"description"	=> "Please enter the AD code.<br><strong>Note:</strong>1. Not support JavaScript code. 2. Need set a height for img label. 3. Not for Filterable template.<br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot; height=&quot;300&quot; &gt;&lt;/a&gt;",
				"type"			=> "textareaadinsert",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "insert_posi",
				"title"			=> "Insert List - Position",
				"description"	=> "",
				"type"			=> "listad_posi",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "pagead_bottom",
				"title"			=> "Bottom of page",
				"description"	=> "Please enter the AD code.<br> e.g.&lt;a href=&quot;http://sample.com&quot;&gt;&lt;img src=&quot;http://sample.com/sample.gif&quot;&gt;&lt;/a&gt;",
				"type"			=> "textareaadbottom",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "close",
				"type"			=> "optionclose",
				"scope"			=>	array( "page"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "post_setting",
				"title"			=> "Post settings",
				"description"	=> "",
				"type"			=>	"title",
				"scope"			=>	array( "post","gallery"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "layout",
				"title"			=> "Layout",
				"description"	=> "",
				"type"			=>	"select-layout",
				"scope"			=>	array(  "post" ),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "select_sidebar",
				"title"			=> "Sidebar",
				"description"	=> "",
				"type"			=> "select-sidebar",
				"scope"			=>	array( "post","gallery"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "layoutinlist",
				"title"			=> "Layout in list",
				"description"	=> "",
				"type"			=>	"select-layoutinlist",
				"scope"			=>	array(  "post","gallery" ),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "video_link",
				"title"			=> "Video URL",
				"description"	=> "Show in list, support Youtube(e.g.'http://www.youtube.com/watch?v=xxxxxxxxx'), Vimeo(e.g.'http://vimeo.com/12345678') and SWF(e.g.'http://www.flashrul.com/flashname.swf')",
				"type"			=>	"text",
				"scope"			=>	array( "post","gallery"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "guideif",
				"title"			=> "Show Breadcrumbs",
				"description"	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array( "post","gallery"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "showadif",
				"title"			=> "Advertising",
				"description"	=> "Not show Advertising in this post.",
				"type"			=>	"checkboxad",
				"scope"			=>	array(  "post"),
				"capability"	=> "manage_options"
			),
			array(
				"name"			=> "close",
				"type"			=> "optionclose",
				"scope"			=>	array( "post","gallery"),
				"capability"	=> "manage_options"
			)
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function myCustomFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				remove_meta_box( 'postcustom', 'post', $context );
				remove_meta_box( 'postcustom', 'page', $context );
				remove_meta_box( 'postcustom', 'gallery', $context );
				//Use the line below instead of the line above for WP versions older than 2.9.1
				//remove_meta_box( 'pagecustomdiv', 'page', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-custom-fields', 'Custom Fields', array( &$this, 'displayCustomFields' ), 'page', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Custom Fields', array( &$this, 'displayCustomFields' ), 'post', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Custom Fields', array( &$this, 'displayCustomFields' ), 'gallery', 'normal', 'high' );
				
			}
		}
		
		/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomFields() {
			global $post;
			$all_category_ids = get_all_category_ids();
			$no_of_categories = count($all_category_ids);
			

$categories = get_categories("taxonomy=catalog");
		
			$all_page_names = all_names("page");
			$all_page_titles = all_titles("page");
			$all_page_ids = all_IDs("page");
			$no_of_pages = count($all_page_ids);
			
			$all_post_names = all_names("post");
			$all_post_titles = all_titles("post");
			$all_post_ids = all_IDs("post");
			$no_of_posts = count($all_post_ids);
			
			$all_post_names = all_names("gallery");
			$all_post_titles = all_titles("gallery");
			$all_post_ids = all_IDs("gallery");
			$no_of_posts = count($all_post_ids);
			?>
			<div class="form-wrap">
				<div class="form-field form-required">
				<?php
				wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						if ($post->post_type == $scopeItem ){
						$output = true;
						break;
						}
					}
					// Check capability
					//if ( !current_user_can( $customField['capability'], $post->ID ) )
						//$output = false;
					// Output if allowed
					if ( $output ) {
					?>
						<!-- <div class="form-field form-required">-->
							<?php
							switch ( $customField[ 'type' ] ) {
								case "title": {
									// title
									echo '<div class="suboption" id="'. esc_attr($customField[ 'name' ]) .'"><div class="tit">' . esc_html($customField[ 'title' ]) . '</div>';
									break;
								}
								case "optionclose": {
									echo '</div>';
									break;
								}
								case "checkbox": {
									// Checkbox
									echo '<p style="height:10px"></p>
									<label class="lab" style="display:inline-block; width:130px; margin-top:-5px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<input style=" width:auto;" type="checkbox" name="' . esc_attr($this->prefix . $customField['name']) . '" id="' . esc_attr($this->prefix . $customField['name']) . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" /> <span class="breadyes">Yes</span><br />';
									break;
								}
								case "checkboxad": {
									// Checkbox
									echo '<p style="height:10px"></p><label class="lab" style="display:inline-block; width:130px; margin-top:-5px;" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<input style="width:auto;" type="checkbox" name="' . esc_attr($this->prefix . $customField['name']) . '" id="' . esc_attr($this->prefix . $customField['name']) . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" /> <span style="color:#666">Not show</span>';
									break;
								}
								case "textarea": {
									// Text area
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';
									echo '<textarea class="mutitext" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									break;
								}
								case "textareaadtop": {
									// Text area
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';
									echo '<textarea class="mutitext" style="width:610px; margin-right:20px; display:inline-block" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" columns="20" rows="8">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea><img style="display:inline-block" src='.esc_url(get_template_directory_uri()).'/functions/images/adfronttop.png>';
									break;
								}
								case "textareaadmiddle": {
									// Text area
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';
									echo '<textarea class="mutitext" style="width:610px; margin-right:20px; display:inline-block" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" columns="20" rows="8">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea><img style="display:inline-block" src='.esc_url(get_template_directory_uri() ).'/functions/images/adfrontmiddle.png>';
									break;
								}
								case "textareaadbottom": {
									// Text area
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';
									echo '<textarea class="mutitext" style="width:610px; margin-right:20px; display:inline-block" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" columns="20" rows="8">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea><img style="display:inline-block" src='.esc_url(get_template_directory_uri() ).'/functions/images/adfrontbottom.png>';
									break;
								}
								case "textareaadinsert": {
									// Text area
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<textarea class="mutitext" style="width:610px; margin-right:20px; display:inline-block" name="' . esc_attr($this->prefix . $customField[ 'name' ]). '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" columns="20" rows="10">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea><img style="display:inline-block" src='.esc_url(get_template_directory_uri() ).'/functions/images/adfrontinsert.png>';
									break;
								}
								case "select-cat": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<?php

foreach ($all_category_ids as $cat_id) {?>
<option value="<?php echo $cat_id; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $cat_id ) { ?> selected="selected" <?php } ?>><?php echo esc_html(get_cat_name($cat_id)); ?></option>
                                    
                                    <?php }
									echo '</select>';
									break;
									
									}
								case "select-post": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';

?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<?php
for ($i = 0 ; $i < $no_of_posts ; $i ++) {	?>
<option value="<?php echo esc_attr($all_post_ids[$i]); ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $all_post_ids[$i] ) { ?> selected="selected" <?php } ?>><?php echo esc_html($all_post_titles[$i])." / ".esc_html($all_post_names[$i]); ?></option>
                                    
                                    <?php }
									echo '</select>';
									break;
								}
								case "select-page": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<?php

for ($i = 0 ; $i < $no_of_pages ; $i ++) {	?>
<option value="<?php echo esc_attr($all_page_ids[$i]); ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $all_page_ids[$i] ) { ?> selected="selected" <?php } ?>><?php echo esc_html($all_page_titles[$i])." / ".esc_html($all_page_names[$i]); ?></option>
                                    
                                    <?php }
									echo '</select>';
									break;
								}
								case "listad_posi": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';						
									echo 'At No.<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="0" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "0" ) { ?> selected="selected" <?php } ?>>1</option>
<option value="1" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "1" ) { ?> selected="selected" <?php } ?>>2</option>
<option value="2" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "2" ) { ?> selected="selected" <?php } ?>>3</option>
<option value="3" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "3" ) { ?> selected="selected" <?php } ?>>4</option>
<option value="4" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "4" ) { ?> selected="selected" <?php } ?>>5</option>
                                    
                                    <?php 
									echo '</select> item';
									break;
								}
								case "select-sidebar": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="default" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "default" ) { ?> selected="selected" <?php } ?>><?php _e('Default','ux'); ?></option>
<option value="sidebar_1" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_1" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_1</option>
<option value="sidebar_2" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_2" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_2</option>
<option value="sidebar_3" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_3" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_3</option>
<option value="sidebar_4" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_4" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_4</option>
<option value="sidebar_5" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_5" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_5</option>
<option value="sidebar_6" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_6" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_6</option>
<option value="sidebar_7" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_7" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_7</option>
<option value="sidebar_8" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_8" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_8</option>
<option value="sidebar_9" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_9" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_9</option>
<option value="sidebar_10" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_10" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_10</option>
<option value="sidebar_11" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sidebar_11" ) { ?> selected="selected" <?php } ?>><?php _e('sidebar','ux'); ?>_11</option>                                 
                                    <?php 
									echo '</select><br />';
									break;
								}
								case "home-slide-style": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_html($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="none" ><?php _e('Please select','ux'); ?></option>
<option value="0" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "0" ) { ?> selected="selected" <?php } ?>><?php _e('No Slide','ux'); ?></option>
<option value="1" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "1" ) { ?> selected="selected" <?php } ?>><?php _e('Brick Slide','ux'); ?></option>
<option value="2" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "2" ) { ?> selected="selected" <?php } ?>><?php _e('Nivo Slider','ux'); ?></option>         
                                    <?php 
									echo '</select>';
									break;
								}
								case "nivo-effect": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="fade" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "fade" ) { ?> selected="selected" <?php } ?>><?php _e('fade','ux'); ?></option>
<option value="fold" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "fold" ) { ?> selected="selected" <?php } ?>><?php _e('fold','ux'); ?></option>
<option value="sliceUpDownLeft" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sliceUpDownLeft" ) { ?> selected="selected" <?php } ?>><?php _e('sliceUpDownLeft','ux'); ?></option>
<option value="sliceUpDown" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sliceUpDown" ) { ?> selected="selected" <?php } ?>><?php _e('sliceUpDown','ux'); ?></option>
<option value="sliceUpLeft" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sliceUpLeft" ) { ?> selected="selected" <?php } ?>><?php _e('sliceUpLeft','ux'); ?></option>
<option value="sliceUpRight" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sliceUpRight" ) { ?> selected="selected" <?php } ?>><?php _e('sliceUpRight','ux'); ?></option>
<option value="sliceDownLeft" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sliceDownLeft" ) { ?> selected="selected" <?php } ?>><?php _e('sliceDownLeft','ux'); ?></option>
<option value="sliceDownRight" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "sliceDownRight" ) { ?> selected="selected" <?php } ?>><?php _e('sliceDownRight','ux'); ?></option>
<?php 
									echo '</select>';
									break;
								}
								case "select-layout": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="1" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "1" ) { ?> selected="selected" <?php } ?>><?php _e('2 Columns with sidebar','ux'); ?></option>
<option value="2" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "2" ) { ?> selected="selected" <?php } ?>><?php _e('Fullwidth','ux'); ?></option>    
                                    <?php 
									echo '</select>';
									break;
								}
								case "yes-no": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="yes" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "yes" ) { ?> selected="selected" <?php } ?>>Yes</option>
<option value="no" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "no" ) { ?> selected="selected" <?php } ?>>No</option>
                                    
                                    <?php 
									echo '</select>';
									break;
								}
								case "select-layoutinlist": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';
?><div id="layoutlist">
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/u1imgonly.png" border="0" alt="One Image Layout A" title="One Image Layout A"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="One Image Layout A"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'One Image Layout A') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/u1imgonly2.png" border="0" alt="One Image Layout B" title="One Image Layout B"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="One Image Layout B"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'One Image Layout B') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/u3imgs.png" border="0" alt="3 Images" title="3 Images"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="3 Images"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == '3 Images') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/u5imgs.png" border="0" alt="5 Images" title="5 Images"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="5 Images"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == '5 Images') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/u1imgm.png" border="0" alt="One Image and Introduction A" title="One Image and Introduction A"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="u1imgm"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'u1imgm') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/u1imgb.png" border="0" alt="One Image and Introduction B" title="One Image and Introduction B"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="u1imgb"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'u1imgb') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/ublog1img.png" border="0" alt="One Image and Introduction with date" title="One Image and Introduction with date"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="ublog1img"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'ublog1img') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/ublognoimg.png" border="0" alt="No image with date" title="No image with date"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="ublognoimg"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'ublognoimg') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/ufullimg.png" border="0" alt="Full Image" title="Full Image"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="ufullimg"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'ufullimg') echo 'checked="checked"'; ?> /></label>
<label class="radioui"><img src="<?php echo get_template_directory_uri() ; ?>/img/widget/uvideo.png" border="0" alt="Video" title="Video"><input type="radio" id="videocheck" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="uvideo"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'uvideo') echo 'checked="checked"'; ?> /></label>
</div>
                                    <?php 
									break;
								}
								case "slide-order": {
									// Drop Down
									echo '<div></div><label class="lab labradio" style="display:inline-block;" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									?>
<label class="radioui2" style="color:#666;"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="ASC"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'ASC') echo 'checked="checked"'; ?> /><?php _e('Ascending','ux'); ?></label>	
<label class="radioui2" style="color:#666;"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="DESC"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'DESC') echo 'checked="checked"'; ?> /><?php _e('Descending','ux'); ?></label>
							<?php 
									break;
									}
									case "list-order": {
									// Drop Down
									echo '<div></div><label class="lab labradio" style="display:inline-block;" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									?>
<label class="radioui3" style="color:#666;"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="ASC"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'ASC') echo 'checked="checked"'; ?> /><?php _e('Ascending','ux'); ?></label>	
<label class="radioui3" style="color:#666;"><input type="radio" name="<?php echo esc_attr($this->prefix . $customField[ 'name' ]); ?>" value="DESC"  <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == 'DESC') echo 'checked="checked"'; ?> /><?php _e('Descending','ux'); ?></label>
							<?php 
									break;
								}
								case "slide-order-by": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="title" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "title" ) { ?> selected="selected" <?php } ?>><?php _e('Title','ux'); ?></option>
<option value="date" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "date" ) { ?> selected="selected" <?php } ?>><?php _e('Date/Time','ux'); ?></option>
<option value="rand" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "rand" ) { ?> selected="selected" <?php } ?>><?php _e('Random','ux'); ?></option>
							<?php echo '</select>';
									break;
								}
								case "list-order-by": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="title" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "title" ) { ?> selected="selected" <?php } ?>><?php _e('Title','ux'); ?></option>
<option value="date" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "date" ) { ?> selected="selected" <?php } ?>><?php _e('Date','ux'); ?></option>
<option value="rand" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "rand" ) { ?> selected="selected" <?php } ?>><?php _e('Random','ux'); ?></option>
<option value="ID" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "ID" ) { ?> selected="selected" <?php } ?>><?php _e('ID','ux'); ?></option>
<option value="modified" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "modified" ) { ?> selected="selected" <?php } ?>><?php _e('modified','ux'); ?></option>
<option value="author" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "author" ) { ?> selected="selected" <?php } ?>><?php _e('author','ux'); ?></option>
<option value="comment_count" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "comment_count" ) { ?> selected="selected" <?php } ?>><?php _e('comment_count','ux'); ?></option>
<option value="none" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "none" ) { ?> selected="selected" <?php } ?>><?php _e('none','ux'); ?></option>
							<?php echo '</select>';
									break;
								}
								case "yes-no": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="No" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "No" ) { ?> selected="selected" <?php } ?>><?php _e('No','ux'); ?></option>
<option value="Yes" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "Yes" ) { ?> selected="selected" <?php } ?>><?php _e('Yes','ux'); ?></option>
                                    <?php 
									echo '</select>';
									break;
								}	
								case "select-pagination": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="infinite" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "infinite" ) { ?> selected="selected" <?php } ?>><?php _e('Infinite Scroll','ux'); ?></option>
<option value="numbers" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "numbers" ) { ?> selected="selected" <?php } ?>><?php _e('With page numbers','ux'); ?></option>
<option value="none" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "none" ) { ?> selected="selected" <?php } ?>><?php _e('None','ux'); ?></option>
                                    <?php 
									echo '</select>';
									break;
								}
								case "select-col": {
									// Drop Down
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';						
									echo '<select name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '"> ';
?>
<option value="" ><?php _e('Please select','ux'); ?></option>
<option value="2" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "2" ) { ?> selected="selected" <?php } ?>>2</option>
<option value="3" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "3" ) { ?> selected="selected" <?php } ?>>3</option>
                                    <?php 
									echo '</select>';
									break;
								}
								case "wormbox": {
									// Plain text field, width is smaller
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';
									echo '<input type="text" style="width:50px;" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;
								}
								// upload image
								case "image": {
								
								$std = get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true );
								if($std != '') { $val = $std; };
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';
									echo '<input type="file" style="width:180px;" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									if(get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true )) {
									echo '<br /><img style=" margin-left:5px;" width="30" src="'.esc_url(htmlspecialchars(get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )).'"   />'; }
									break;
								}
								case "slide-color-box": {
									// Plain text field, width is smaller
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';
									echo '<input type="text" class="color" style="width:200px;" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;
								}
								case "slide-btn": {
									// Plain text field, width is smaller
									echo '<input id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" class="img_upload_btn" type="button" value="Add Slider Images" />';
									echo '<script>jQuery(document).ready(function() {
									jQuery(".img_upload_btn").click(function() {
										jQuery("html").addClass("Image");
										formfield = jQuery(this).prev().attr("name");
										tb_show("", "media-upload.php?post_id=';
									echo get_the_ID();
									echo 'type=image&amp;TB_iframe=true");
										return false;
									});
									});</script>';
									break;
								}
								default: {
									// Plain text field
									echo '<label class="lab" for="' . esc_attr($this->prefix . $customField[ 'name' ]) .'"><b>' . esc_attr($customField[ 'title' ]) . '</b></label>';
									echo '<input type="text" name="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" id="' . esc_attr($this->prefix . $customField[ 'name' ]) . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;
								}
							} //switch end
							?>
							<?php if ( $customField[ 'description' ] ) echo '<p>' . esc_attr($customField[ 'description' ]) . '</p>'; ?>
						<!--</div>-->
					<?php
					}// if output end
				} //foreach customFields end  ?>
				</div>
			</div>
			<?php
		}//Function display customFields end
		/**
		* Save the new Custom Fields values
		*/
		function saveCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( $post->post_type != 'page' && $post->post_type != 'post' && $post->post_type != 'gallery')
				return;
			foreach ( $this->customFields as $customField ) {
				//if ( current_user_can( $customField['capability'], $post_id ) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
						} 
					
				
				if(isset($_FILES[$this->prefix . $customField['name']])  && ($_FILES[$this->prefix . $customField['name']]['size'] > 0)){ //New upload
							$override['action'] = 'editpost';
							$uploaded_file = wp_handle_upload($_FILES[$this->prefix . $customField['name']], $override);
							$file_name_and_location = $uploaded_file['file'];
							$file_title_for_media_library = 'your title here';
							require_once(ABSPATH . "wp-admin" . '/includes/image.php');
							update_post_meta($post->ID,  $this->prefix . $customField[ 'name' ], $uploaded_file['url']);
						} else if(empty($_FILES[$this->prefix . $customField['name']])){
							update_post_meta($post->ID,  $this->prefix . $customField[ 'name' ],$_POST[ $this->prefix . $customField[ 'name' ]]);;
						}
									
				//}
			}
		}

	} // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('myCustomFields') ) {
	$myCustomFields_var = new myCustomFields();
}
?>