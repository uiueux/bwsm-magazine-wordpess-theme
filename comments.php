<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
include get_template_directory() .'/get_options.php';
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','ux'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div id=comments_box>
	<h3 id="comments"><span><?php comments_number(__('0 COMMENT','ux'), __('1 COMMENT','ux'), __('% COMMENTS','ux') );?></span></h3>
	<ol class="commentlist">
	 <?php wp_list_comments('callback=idi_cust_comment'); ?>
	</ol>
	<div class="commnetsnavi">
	<?php paginate_comments_links(); ?>
	</div> 
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div id="respond">
<span  class="respondbtn"><?php if( $idi_respondtit ) {  ?>
<?php comment_form_title( $idi_respondtit, $idi_respondtit .' to %s' ); 
} else {?>
<?php comment_form_title( __('LEAVE A REPLY','ux'), __('LEAVE A REPLY to %s','ux') ); 
} ?></span>


<div id="respondwrap">
<script type="text/javascript">
	// #################################
	// Verification Form
	// ################################
jQuery(document).ready(function($){ 
          $('form#commentform').submit(function() {
               var hasError = false;
               $('.requiredFieldcomm').each(function() {
                   if(jQuery.trim($(this).val()) == '' || jQuery.trim($(this).val()) == '<?php _e('Name','ux'); ?>*' || jQuery.trim($(this).val()) == '<?php _e('Email','ux'); ?>*' || jQuery.trim($(this).val()) == '<?php _e('Required','ux'); ?>' || jQuery.trim($(this).val()) == '<?php _e('Invalid email','ux'); ?>') {
					$(this).attr("value","<?php _e('Required','ux'); ?>");
                         hasError = true;
                    } else if($(this).hasClass('email')) {
						 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
						 if(!emailReg.test(jQuery.trim($(this).val()))) {
							 $(this).attr("value","<?php _e('Invalid email','ux'); ?>");
							  hasError = true;
						 }
					}else{
					}
               });
               //After verification , print some infos. 
			if(!hasError) {
				$('form#commentform .send_btn').fadeOut('normal', function() {										  
					$(this).parent().append('<p class="sending"><?php _e('Sending','ux'); ?>...</p>');
				});
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#commentform').slideUp("fast", function() {
						$(this).before('<p class="success"><?php _e('Thanks, your comment was successfully sent','ux'); ?>.</p>');
						$('.sending').fadeOut();
					});
				});
			}
               return false;
     
          });
});
</script>
<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>



<?php if ( 'open' == $post->comment_status ) : 

$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$name_text = __('NAME','ux');
	$email_text = __('EMAIL','ux');
	$review_text = __('YOUR REVIEW','ux');
	if(esc_attr( $commenter['comment_author'] )){
	$fields =  array(
		'author' => '<p><input id="author" name="author" type="text" class="requiredFieldcomm" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' tabindex="1" onfocus="if(this.value==\''.$name_text.'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.$name_text.'\';}"/></p>',
		'email' => '<p><input id="email" name="email" type="text" class="email requiredFieldcomm" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' tabindex="2" onfocus="if(this.value==\''.$email_text.'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.$email_text.'\';}"/></p>',
		'url' => '<p><input id="url" name="url" type="text" class="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' tabindex="3"}"/></p>'
	);
	}else{
	$fields =  array(
		'author' => '<p><input id="author" name="author" type="text" class="requiredFieldcomm" value="NAME" size="30"' . $aria_req . ' tabindex="1" onfocus="if(this.value==\''.$name_text.'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.$name_text.'\';}"/></p>',
		'email' => '<p><input id="email" name="email" type="text" class="email requiredFieldcomm" value="EMAIL" size="30"' . $aria_req . ' tabindex="2" onfocus="if(this.value==\''.$email_text.'\'){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=\''.$email_text.'\';}"/></p>',
		'url' => '<p><input id="url" name="url" type="text" class="url" value="URL" size="30"' . $aria_req . ' tabindex="3" }"/></p>'
	);
	}
	$comments_args = array(
	    'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
	    'logged_in_as'		   => '<p class="logged">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'ux' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	    'title_reply'          => '<span class="comm-reply-title">'.__( 'LEAVE A COMMENT', 'ux' ).'</span>',
	    'title_reply_to'       => __( 'LEAVE A COMMENT to %s', 'ux' ),
	    'cancel_reply_link'    => __( 'CANCEL REPLY', 'ux' ),
	    'label_submit'         => __( 'SEND', 'ux' ),
	    'comment_field'		   => '<p><textarea id="comment" name="comment" class="requiredFieldcomm" cols="100%" tabindex="4" aria-required="true" onfocus="if(this.value==this.defaultValue){this.value=\'\';}" onblur="if(this.value==\'\'){this.value=this.defaultValue;}" >'.$review_text.'</textarea></p>',
	    'must_log_in'		   => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ux' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	    'comment_notes_after'  =>'',
	    'comment_notes_before'  =>''
	);

	comment_form($comments_args);

endif; 
?>





</div>

<?php endif; ?>
</div>