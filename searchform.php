<form id="search" name="search" method="get" class="search-form" action="<?php echo home_url(); ?>/">	
				<input type="text" onblur="if (this.value == '') {this.value = '<?php _e('Click here to search','ux'); ?>';}" onfocus="if (this.value == '<?php _e('Click here to search','ux'); ?>') {this.value = '';}" id="s" name="s" value="<?php _e('Click here to search','ux'); ?>" class="textboxsearch"> 
				<input type="submit" value="Search" class="submitsearch" name="submitsearch">
</form>
