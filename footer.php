<?php
 include get_template_directory() .'/get_options.php';
?>
<div class="clear"></div>
<div class="line_main"></div>
<!--Back Top button-->
<div id="top"></div>
<div id="footer">
	<div id="footbox" class="container">
<?php if( get_option('idi_contactinfo') == 'click to show' ) { ?>		
		<div id="footer_trggle" class="footer_open"></div>
		<div class="footinfo"><?php if ($idi_copyright) {  echo balanceTags($idi_copyright);  } else {} ?></div>
	</div><!--footbox-->
</div><!--footer-->
<div class="clear"></div>
	<div id="footunder">
	<div id="footunderwrap" class="container">
		<div class="textinfo">
			<h2><?php if( get_option('idi_addresstitle') ) { echo balanceTags(get_option('idi_addresstitle')); } else { ?>Address<?php } ?></h2>
				<?php if( get_option('idi_addressdetails') ) { echo balanceTags(get_option('idi_addressdetails')); } else {} ?>
			<div class="footericons">
			<?php if($idi_foot_facebook){?>
				<a href="<?php echo esc_url($idi_foot_facebook); ?>" title="Facebook"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_facebook.png" alt="Facebook"></a>
			<?php } if($idi_foot_tweet) {?>	
				<a href="<?php echo esc_url($idi_foot_tweet); ?>" title="Twitter"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_tweet.png" alt="Twitter"></a>
			<?php } if($idi_foot_linkedin) {?>	
				<a href="<?php echo esc_url($idi_foot_linkedin); ?>" title="LinkedIn"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_in.png" alt="LinkedIn"></a>
			<?php } if($idi_foot_flickr) {?>	
				<a href="<?php echo esc_url($idi_foot_flickr); ?>" title="Flickr"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_flickr.png" alt="Flickr"></a>
			<?php } if($idi_foot_youtube) {?>	
				<a href="<?php echo esc_url($idi_foot_youtube); ?>" title="Youtube"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_youtube.png" alt="Youtube"></a>
			<?php } if($idi_foot_vimeo) {?>	
				<a href="<?php echo esc_url($idi_foot_vimeo); ?>" title="Vimeo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_vimeo.png" alt="Vimeo"></a>
			<?php } if($idi_foot_blogger) {?>	
				<a href="<?php echo esc_url($idi_foot_blogger); ?>" title="Blogger"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_blogger.png" alt="Blogger"></a>
			<?php } if($idi_foot_lastfm) {?>	
				<a href="<?php echo esc_url($idi_foot_lastfm); ?>" title="Last.fm"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_lastfm.png" alt="Last.fm"></a>
			<?php } if($idi_foot_iconmail) {?>	
				<a href="mailto:<?php echo  is_email($idi_foot_iconmail); ?>" title="<?php _e('Email','ux'); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_mail.png" alt="<?php _e('Email','ux'); ?>"></a>
			<?php } if($idi_foot_rss) {?>	
				<a href="<?php echo esc_url($idi_foot_rss); ?>" title="Rss"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_rss.png" alt="Rss"></a>
			<?php } ?>	
			</div>
		</div><!--textinfo-->
<script type="text/javascript">
// #################################
// Verification Form
// ################################
//verification Footer-contact-form
jQuery(document).ready(function($){ 


		var formVerifyWrap = $('.verify-wrap'); 
		
		$('form#contact-form').submit(function() {
			//$('form#contact-form .error').remove();
			//$('form#contact-form .required').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if(jQuery.trim($(this).val()) == '' || jQuery.trim($(this).val()) == '<?php _e('Name','ux'); ?>*' || jQuery.trim($(this).val()) == '<?php _e('Email','ux'); ?>*' || jQuery.trim($(this).val()) == '<?php _e('Required','ux'); ?>' || jQuery.trim($(this).val()) == '<?php _e('Invalid email','ux'); ?>') {
					$(this).attr("value","<?php _e('Required','ux'); ?>");
					hasError = true;
				}else if($(this).hasClass('email')) {
            		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            		if(!emailReg.test(jQuery.trim($(this).val()))) {
						$(this).attr("value","<?php _e('Invalid email','ux'); ?>");
						hasError = true;
            		}
           		
				}else if($(this).hasClass('captcha')){
					var captchaReg = $(this).prev('[name=ux_captcha_word]');
					
					if($(this).val().toUpperCase() != captchaReg.val()){
						$(this).attr("value","Error Captcha");
						hasError = true;
					}
				}else{
				
				}
			});
			//After verification , print some infos. 
			if(!hasError) {
				$('form#contact-form #idi_send').fadeOut('normal', function() {										  
					$(this).parent().append('<p class="sending"><?php _e('Sending','ux'); ?>...</p>');
				});
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-form').slideUp("fast", function() {
						$(this).before('<p class="success"><?php _e('Thanks, your email was successfully sent','ux'); ?>.</p>');
						$('.sending').fadeOut();
					});
				});
			}
			return false;
	
		});
});
</script>
		<div class="contactform">
		<?php
		if ($idi_mailto) {
			$emailto = $idi_mailto;
		}else{
			$emailto = get_bloginfo('admin_email');
		}//End idi_emailto
		if ($idi_contactTitle){
			$title = $idi_contactTitle;
		}else{
			$title = __('Leave a Message','ux');
		}//End idi_contact title
		if($idi_contactButton){
			$button = $idi_contactButton;
		}else{
			$button = __('Send','ux');
		}//End idi_contact button
		if( isset($_POST['idi_form']) && $_POST['idi_form'] == 'send'){
			$name = isset( $_POST['idi_name'] ) ? trim(htmlspecialchars($_POST['idi_name'], ENT_QUOTES)) : '';
			$email =  isset( $_POST['idi_mail'] ) ? trim(htmlspecialchars($_POST['idi_mail'], ENT_QUOTES)) : '';
			$website =  isset( $_POST['idi_website'] ) ? trim(htmlspecialchars($_POST['idi_website'], ENT_QUOTES)) : '';
			$content =  isset( $_POST['idi_text'] ) ? trim(htmlspecialchars($_POST['idi_text'], ENT_QUOTES)) : '';
			$post_content = "This mail was sent by  $name .  Content:  $content";
			$title = 'Mail from '.$email;
			$headers = 'from :'.$email.'\n content-type:text/html';
			wp_mail($emailto,$title,$post_content,$headers);
		}//End send
		?>
		<h2><?php echo esc_html($title); ?></h2>
		<form action="<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>" id="contact-form" class="contact_form" method="POST">
		<p><input type="text" id="idi_name" name="idi_name" class="requiredField" value="<?php _e('Name','ux');?>*" onblur="if (this.value == '') {this.value = '<?php _e('Name','ux');?>*';}" onfocus="if (this.value == '<?php _e('Name','ux');?>*' || this.value == '<?php _e('Required','ux');?>' ) {this.value = '';}" /></p>
		<p><input type="text" id="idi_mail" name="idi_mail" class="requiredField email" value="<?php _e('Email','ux');?>*" onblur="if (this.value == '') {this.value = '<?php _e('Email','ux');?>*';}" onfocus="if (this.value == '<?php _e('Email','ux');?>*' || this.value == '<?php _e('Required','ux');?>' || this.value == '<?php _e('Invalid email','ux');?>' ) {this.value = '';}" /></p>
		<p><input type="text" id="idi_website" name="idi_website" class="website" value="<?php _e('Website','ux');?>" onblur="if (this.value == '') {this.value = '<?php _e('Website','ux');?>';}" onfocus="if (this.value == '<?php _e('Website','ux');?>') {this.value = '';}" /></p>
		<p><textarea rows="4" name="idi_text" id="idi_text" cols="4" class="requiredField inputError"  onfocus="if (this.value == '<?php _e('Required','ux');?>') {this.value = '';}"></textarea></p>
		<input type="hidden" value="send" name="idi_form" />
		<div class="btnarea">
			<input type="submit" id="idi_send" name="idi_send" class="idi_send" value="<?php echo esc_attr($button); ?>" />
		</div>
		</form>
		</div>
	</div>	
	</div><!--footunder-->
<?php } else if ( get_option('idi_contactinfo') == 'not show' ) { ?>
		<div class="footinfo"><?php if ($idi_copyright) {  echo balanceTags($idi_copyright);  } else {} ?></div>
	</div><!--footbox-->
</div><!--footer-->
<?php }else if ( get_option('idi_contactinfo') == 'show by default' ) { ?>
		<div class="footinfo"><?php if ($idi_copyright) {  echo balanceTags($idi_copyright);  } else {} ?></div>
	</div><!--footbox-->
</div><!--footer-->
<div class="clear"></div>
	<div id="footunder" style="display:block">
	<div id="footunderwrap" class="container">
		<div class="textinfo">
			<h2><?php if( get_option('idi_addresstitle') ) { echo balanceTags(get_option('idi_addresstitle')); } else { ?>Address<?php } ?></h2>
				<?php if( get_option('idi_addressdetails') ) { echo balanceTags(get_option('idi_addressdetails')); } else {} ?>
			<div class="footericons">
			<?php if($idi_foot_facebook){?>
				<a href="<?php echo esc_url($idi_foot_facebook); ?>" title="Facebook"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_facebook.png" alt="Facebook"></a>
			<?php } if($idi_foot_tweet) {?>	
				<a href="<?php echo esc_url($idi_foot_tweet); ?>" title="Twitter"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_tweet.png" alt="Twitter"></a>
			<?php } if($idi_foot_linkedin) {?>	
				<a href="<?php echo esc_url($idi_foot_linkedin); ?>" title="LinkedIn"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_in.png" alt="LinkedIn"></a>
			<?php } if($idi_foot_flickr) {?>	
				<a href="<?php echo esc_url($idi_foot_flickr); ?>" title="Flickr"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_flickr.png" alt="Flickr"></a>
			<?php } if($idi_foot_youtube) {?>	
				<a href="<?php echo esc_url($idi_foot_youtube); ?>" title="Youtube"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_youtube.png" alt="Youtube"></a>
			<?php } if($idi_foot_vimeo) {?>	
				<a href="<?php echo esc_url($idi_foot_vimeo); ?>" title="Vimeo"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_vimeo.png" alt="Vimeo"></a>
			<?php } if($idi_foot_blogger) {?>	
				<a href="<?php echo esc_url($idi_foot_blogger); ?>" title="Blogger"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_blogger.png" alt="Blogger"></a>
			<?php } if($idi_foot_lastfm) {?>	
				<a href="<?php echo esc_url($idi_foot_lastfm); ?>" title="Last.fm"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_lastfm.png" alt="Last.fm"></a>
			<?php } if($idi_foot_iconmail) {?>	
				<a href="mailto:<?php echo  is_email($idi_foot_iconmail); ?>" title="<?php _e('Email','ux'); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_mail.png" alt="<?php _e('Email','ux'); ?>"></a>
			<?php } if($idi_foot_rss) {?>	
				<a href="<?php echo esc_url($idi_foot_rss); ?>" title="Rss"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ico_rss.png" alt="Rss"></a>
			<?php } ?>
			</div>
		</div><!--textinfo-->
<script type="text/javascript">
// #################################
// Verification Form
// ################################
//verification Footer-contact-form
jQuery(document).ready(function($){ 

		var formVerifyWrap = jQuery('.verify-wrap'); 

		//Captcha
		
		
		$('form#contact-form').submit(function() {
			//$('form#contact-form .error').remove();
			//$('form#contact-form .required').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if(jQuery.trim($(this).val()) == '' || jQuery.trim($(this).val()) == '<?php _e('Name','ux'); ?>*' || jQuery.trim($(this).val()) == '<?php _e('Email','ux'); ?>*' || jQuery.trim($(this).val()) == '<?php _e('Required','ux'); ?>' || jQuery.trim($(this).val()) == '<?php _e('Invalid email','ux'); ?>') {
					$(this).attr("value","<?php _e('Required','ux'); ?>");
					hasError = true;
					
				}else if($(this).hasClass('email')) {
            		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            		if(!emailReg.test(jQuery.trim($(this).val()))) {
						$(this).attr("value","<?php _e('Invalid email','ux'); ?>");
						hasError = true;
            		}
            	}else if($(this).hasClass('captcha')){
					var captchaReg = $(this).prev('[name=ux_captcha_word]');
					
					if($(this).val().toUpperCase() != captchaReg.val()){
						$(this).attr("value","Error Captcha");
						hasError = true;
					}
				}else{
				
				}
			});
			//After verification , print some infos. 
			if(!hasError) {
				$('form#contact-form #idi_send').fadeOut('normal', function() {										  
					$(this).parent().append('<p class="sending"><?php _e('Sending','ux'); ?>...</p>');
				});
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-form').slideUp("fast", function() {
						$(this).before('<p class="success"><?php _e('Thanks, your email was successfully sent','ux'); ?>.</p>');
						$('.sending').fadeOut();
					});
				});
			}
			return false;
	
		});
});
</script>
		<div class="contactform">
		<?php
		if ($idi_mailto) {
			$emailto = $idi_mailto;
		}else{
			$emailto = get_bloginfo('admin_email');
		}//End idi_emailto
		if ($idi_contactTitle){
			$title = $idi_contactTitle;
		}else{
			$title = __('Leave a Message','ux');
		}//End idi_contact title
		if($idi_contactButton){
			$button = $idi_contactButton;
		}else{
			$button = __('Send','ux');
		}//End idi_contact button
		if( isset($_POST['idi_form']) && $_POST['idi_form'] == 'send'){
			$name = isset( $_POST['idi_name'] ) ? trim(htmlspecialchars($_POST['idi_name'], ENT_QUOTES)) : '';
			$email =  isset( $_POST['idi_mail'] ) ? trim(htmlspecialchars($_POST['idi_mail'], ENT_QUOTES)) : '';
			$website =  isset( $_POST['idi_website'] ) ? trim(htmlspecialchars($_POST['idi_website'], ENT_QUOTES)) : '';
			$content =  isset( $_POST['idi_text'] ) ? trim(htmlspecialchars($_POST['idi_text'], ENT_QUOTES)) : '';
			$post_content = "This mail was sent by  $name .  Content:  $content";
			$title = 'Mail from '.$email;
			$headers = 'from :'.$email.'\n content-type:text/html';
			wp_mail($emailto,$title,$post_content,$headers);
		}//End send
		?>
		<h2><?php echo esc_html($title); ?></h2>
		<form action="<?php echo esc_url($_SERVER["REQUEST_URI"]); ?>" id="contact-form" class="contact_form" method="POST">
		<p><input type="text" id="idi_name" name="idi_name" class="requiredField" value="<?php _e('Name','ux');?>*" onblur="if (this.value == '') {this.value = '<?php _e('Name','ux');?>*';}" onfocus="if (this.value == '<?php _e('Name','ux');?>*' || this.value == '<?php _e('Required','ux');?>' ) {this.value = '';}" /></p>
		<p><input type="text" id="idi_mail" name="idi_mail" class="requiredField email" value="<?php _e('Email','ux');?>*" onblur="if (this.value == '') {this.value = '<?php _e('Email','ux');?>*';}" onfocus="if (this.value == '<?php _e('Email','ux');?>*' || this.value == '<?php _e('Required','ux');?>' || this.value == '<?php _e('Invalid email','ux');?>' ) {this.value = '';}" /></p>
		<p><input type="text" id="idi_website" name="idi_website" class="website" value="<?php _e('Website','ux');?>" onblur="if (this.value == '') {this.value = '<?php _e('Website','ux');?>';}" onfocus="if (this.value == '<?php _e('Website','ux');?>') {this.value = '';}" /></p>
		<p><textarea rows="4" name="idi_text" id="idi_text" cols="4" class="requiredField inputError"  onfocus="if (this.value == '<?php _e('Required','ux');?>') {this.value = '';}" ></textarea></p>
		<input type="hidden" value="send" name="idi_form" />
		<div class="btnarea">
			<input type="submit" id="idi_send" name="idi_send" class="idi_send" value="<?php echo esc_attr($button); ?>" />
		</div>
		
		</form>
		</div>
	</div>	
	</div><!--footunder-->
<?php } //End contactinfo ?>
<?php
wp_reset_query();
 if( is_page_template( 'fullwidth.php' ) || is_page_template( 'fullwidth_filterable.php' ) ) { ?>
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.slide.brick.js"></script>
<?php }else if( is_page_template( 'list.php' ) || is_page_template( 'list_filterable.php' ) ) { ?>
<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.slide.brick2.js"></script>
<?php } ?>
<!--[if IE 7 ]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles/ie7.css" />
		<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/ie7.js"></script>
	<![endif]-->
	<!--[if IE 8 ]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url(get_template_directory_uri()); ?>/styles/ie8.css" />
		<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/ie8.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 6]>
		<div style="width: 100%;" class="messagebox_orange">Your browser is obsolete and does not support this webpage. Please use newer version of your browser or visit <a href="http://www.ie6countdown.com/" target="_new">Internet Explorer 6 countdown page</a>  for more information. </div>
	<![endif]-->
	
<?php
wp_footer(); 
?>	
</body>
</html>
