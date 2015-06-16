jQuery(document).ready(function(){
	var nivo = jQuery('select#idi_nivo_effect,input#idi_numbers_nivo,input#idi_nivo_slices,input#idi_nivo_animSpeed,input#idi_nivo_thumb_position');
	var half = jQuery('select#idi_col,select#idi_select_sidebar');
	var filt = jQuery('select#idi_pagination,#idi_home_promotion_nums,#idi_pagead_insert,#idi_insert_posi,.breadyes');
	var list = jQuery('#slide_setting,#general_setting,#item_setting');
	var slideorder = jQuery('#idi_slide_order,#idi_slide_order_by,.radioui2,.radioui2 input');
//When slip the template	
function layout_options_change(){		
		var current_page_template = jQuery('#page_template').find('option:selected').val();
		var current_slide_change = jQuery('#idi_home_slide_style').find('option:selected').val();
		//Judge if list template
		if(current_page_template == 'fullwidth.php' || current_page_template == 'fullwidth_filterable.php'){
			list.animate({ opacity : 1 }, 300);
			jQuery('.suboption :input').removeAttr('disabled', 'disabled');
			jQuery('#page_setting :input').attr('disabled', 'disabled');
			nivo.animate({ opacity : 0.3 }, 300);
			nivo.attr('disabled', 'disabled');
			slideorder.animate({ opacity : 0.3 }, 300);
			slideorder.attr('disabled', 'disabled');
			jQuery('#page_setting,select#idi_col').animate({ opacity : 0.3 }, 300);
			jQuery('#page_setting').find('select','input').attr('disabled', 'disabled');
			jQuery('select#idi_col').attr('disabled', 'disabled');
			jQuery('#idi_pagead_middle').animate({ opacity : 1 }, 300);
			if(current_page_template == 'fullwidth.php'){
				filt.animate({ opacity : 1 }, 300);
				filt.removeAttr('disabled', 'disabled');					
			}else if(current_page_template == 'fullwidth_filterable.php'){
				filt.animate({ opacity : 0.3 }, 300);
				filt.attr('disabled', 'disabled');
			}
		}else if(current_page_template == 'list_filterable.php' || current_page_template == 'list.php'){
			jQuery('.suboption').animate({ opacity : 1 }, 300);
			jQuery('.suboption :input').removeAttr('disabled', 'disabled');
			filt.animate({ opacity : 0.3 }, 300);
			filt.attr('disabled', 'disabled');
			jQuery('#idi_layout').animate({ opacity : 0.3 }, 300);
			jQuery('#idi_layout').attr('disabled', 'disabled');
			jQuery('#idi_select_sidebar,select#idi_col').animate({ opacity : 1 }, 300);
			jQuery('#idi_select_sidebar,select#idi_col').removeAttr('disabled', 'disabled');
			nivo.animate({ opacity : 0.3 }, 300);
			nivo.attr('disabled', 'disabled');
			slideorder.animate({ opacity : 0.3 }, 300);
			slideorder.attr('disabled', 'disabled');
			jQuery('#idi_pagead_middle').animate({ opacity : 1 }, 300);
				if(current_page_template == 'list.php'){
					filt.animate({ opacity : 1 }, 300);
					filt.removeAttr('disabled', 'disabled');
				}
		} else if(current_page_template == 'page.php'){
			jQuery('#page_setting').siblings('.suboption').animate({ opacity : 0.3 }, 300);
			jQuery('.suboption :input').attr('disabled', 'disabled');
			jQuery('#page_setting :input').removeAttr('disabled', 'disabled');
			jQuery('#page_setting,#general_setting').animate({ opacity : 1 }, 300);
			jQuery('#page_setting,#general_setting').find('select','input').removeAttr('disabled', 'disabled');
			jQuery('#general_setting :input').removeAttr('disabled', 'disabled');
			jQuery('#idi_layout').animate({ opacity : 1 }, 300);
			jQuery('#idi_layout').removeAttr('disabled', 'disabled');
			jQuery('#ad_setting').animate({ opacity : 1 }, 300);
			jQuery('#ad_setting').find('textarea').removeAttr('disabled', 'disabled');
			jQuery('#idi_pagead_middle,#idi_pagead_insert').animate({ opacity : 0.3 }, 300);
			jQuery('#idi_pagead_middle,#idi_pagead_insert').attr('disabled', 'disabled');
		}else if(current_page_template == 'default'){
			jQuery('.suboption').animate({ opacity : 0.3 }, 300);
			jQuery('.suboption :input').attr('disabled', 'disabled');
		}

	}

	jQuery('#page_template').live('change', function(){
			layout_options_change();
	});

	jQuery(window).load(function(){
		layout_options_change();
	});
//When slip the slide style
function slide_change(){ 
		var current_slide_change = jQuery('#idi_home_slide_style').find('option:selected').val();
		if(current_slide_change == '1' || current_slide_change == '0'){
			nivo.animate({ opacity : 0.3 }, 300);	
			nivo.attr('disabled', 'disabled');
				if( current_slide_change == '0'){
					slideorder.animate({ opacity : 0.3 }, 300);
					slideorder.attr('disabled', 'disabled');
				}else{
					slideorder.animate({ opacity : 1 }, 300);
					slideorder.removeAttr('disabled', 'disabled');
				}
		}else if(current_slide_change == '2'){
			nivo.animate({ opacity : 1 }, 300);	
			nivo.removeAttr('disabled', 'disabled');
			slideorder.animate({ opacity : 1 }, 300);
			slideorder.removeAttr('disabled', 'disabled');
		}
	}
	jQuery('#idi_home_slide_style').live('change', function(){			
			slide_change();
	});

	jQuery(window).load(function(){
		slide_change();
	});
//When slip sidebar layout
	function sidebar_change(){
		var current_sidebar = jQuery('#idi_layout').find('option:selected').val();
		 if( current_sidebar =='1' ) {
			jQuery('#idi_select_sidebar').animate({ opacity : 1 }, 300);	
			jQuery('#idi_select_sidebar').removeAttr('disabled', 'disabled');
		} else if( current_sidebar =='2' ) {
			jQuery('#idi_select_sidebar').animate({ opacity : 0.3 }, 300);	
			jQuery('#idi_select_sidebar').attr('disabled', 'disabled');
		}
	}
	jQuery('#idi_layout').live('change', function(){			
			sidebar_change();
	});

	jQuery(window).load(function(){
		sidebar_change();
	});
//When slip pagenation show the tip
	function pagination_change(){
		var current_pagenumber = jQuery('#idi_pagination').find('option:selected').val();
		if( current_pagenumber =='numbers' ) {
			jQuery('#idi_pagination').after('<span class="paginote">Need <a href="http://wordpress.org/extend/plugins/wp-pagenavi/" target="_blank">WP-pagenavi plugin</a>.</span>')
		} else {
			jQuery('.paginote').remove();
		}
	}
	jQuery('#idi_pagination').live('change', function(){			
			pagination_change();
	});

	jQuery(window).load(function(){
		pagination_change();
	});
	//end
	//When check the video
	var current_layoutlist = jQuery('#layoutlist').find('input[type=radio]:checked').val();
	jQuery('#layoutlist').find('input').click(function (){
		var current_layoutlist = jQuery('#layoutlist').find('input[type=radio]:checked').val();
		if( current_layoutlist =='uvideo' ) {
			jQuery('#idi_video_link').animate({ opacity : 1 }, 300);
			jQuery('#idi_video_link').removeAttr('disabled', 'disabled');
		} else {
			jQuery('#idi_video_link').animate({ opacity : 0.3 }, 300);	
			jQuery('#idi_video_link').attr('disabled', 'disabled');
		}
	});
	jQuery(window).load(function(){
		if( current_layoutlist =='uvideo' ) {
			jQuery('#idi_video_link').animate({ opacity : 1 }, 300);
			jQuery('#idi_video_link').removeAttr('disabled', 'disabled');
		} else {
			jQuery('#idi_video_link').animate({ opacity : 0.3 }, 300);	
			jQuery('#idi_video_link').attr('disabled', 'disabled');
		}
	});
	//end
});	
