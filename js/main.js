//Custom JS - All custom front-end jQuery

jQuery(document).ready(function() {					
	// #################################
	// Menu
	// #################################
	
	var $menuli = jQuery(".nav ul.menu").children("li");
	var $current = jQuery(".current-menu-item,.current-menu-parent,.current-menu-ancestor");
	var $menuunit = jQuery(".nav ul.menu li");				
	//add tri when submenu
		$menuli.children("a").each(function(i){
			jQuery(this).siblings("ul.sub-menu").parent().children("a").children("span.subtitle").before("<div class='nav_tri nav_tri_original'></div>");
		});
	//add hover block hidden
	$menuunit.prepend("<div class='navhover'></div>");
	//hover on menu
	$menuunit.hover(function(){
		jQuery(this).not("ul ul li").children(".navhover").slideDown(100);
		jQuery(this).children("a").children(".nav_tri").removeClass("nav_tri_original").addClass("nav_tri_active");
		jQuery(this).children("a").addClass("menu_active");
		jQuery(".nav li li").removeClass("navhover");
		jQuery(this).find('ul:first').delay(150).slideDown(200);
	},function(){	
		jQuery(this).not($current).children("a").children(".nav_tri").removeClass("nav_tri_active").addClass("nav_tri_original");
		jQuery(this).children(".navhover").delay(100).slideUp(100);
		jQuery(this).not($current).children("a").removeClass('menu_active');
		jQuery(this).find('ul:first').slideUp(100);
	})
	$current.children("a").addClass("menu_active");
	$current.children("a").children(".nav_tri").removeClass("nav_tri_original").addClass("nav_tri_active");		
	
	jQuery('span.subtitle').each(function(){
		if(jQuery(this).text()) {
			jQuery(this).parent('a').siblings("ul").css('top','60px');	
		}
	})
	
								
	// #################################
	// Search form
	// #################################
	jQuery(" input.textboxsearch ").focus(function(){
		//$(this).siblings('.boxborder').fadeIn(500);
		jQuery(this).parent().addClass("search-formhover");
		}).focusout(function(){
		//$(this).siblings('.boxborder').fadeOut(200);
		 jQuery(this).parent().removeClass("search-formhover");
	 });
	jQuery(".textboxsearch_header").focus(function(){
		jQuery(this).parent().addClass("search_header_over");	
		jQuery(this).parent().animate({width:"175px"},300);
	}).focusout(function(){
		jQuery(this).parent().removeClass("search_header_over");
		jQuery(this).parent().animate({width:"120px"},300);
	});

	// #################################
	// ZOOM PORTFOLIO HOVER
	// #################################

		jQuery("li.list_box a").hover(function(){							   
			jQuery(this).children(".back").fadeIn(200);
		},function() {
			jQuery(this).children(".back").fadeOut(100);
		});
		jQuery("ul#list_wrap,ul#list_wrap_col2").find("li.listbox_ufullimg").hover(function(){							   
			jQuery(this).find(".back").fadeIn(200);
			jQuery(this).find(".icozoom").animate({ left:"33%"}, 300 );
			jQuery(this).find(".icomore").animate({ right:"33%"}, 300 );
		},function() {
			jQuery(this).find(".back").fadeOut(100);
			jQuery(this).find(".icozoom").animate({ left:"0"}, 200 );
			jQuery(this).find(".icomore").animate({ right:"0"}, 200 );
		});
		jQuery("ul#list_wrap_col2_c1").find("li.listbox_ufullimg").hover(function(){							   
			jQuery(this).find(".back").fadeIn(200);
			jQuery(this).find(".icozoom").animate({ left:"40%"}, 300 );
			jQuery(this).find(".icomore").animate({ right:"40%"}, 300 );
		},function() {
			jQuery(this).find(".back").fadeOut(100);
			jQuery(this).find(".icozoom").animate({ left:"0"}, 200 );
			jQuery(this).find(".icomore").animate({ right:"0"}, 200 );
		});
	// #################################
	// shortcode image
	// #################################
		jQuery('.imageshover .imageshoverp').fadeOut(0);
		jQuery(".imageshover").hover(function(){
			jQuery(this).find('.imageshoverp').fadeIn(100);
		},function(){
		jQuery(this).find('.imageshoverp').fadeOut(100);
		});	
	// #################################
	// Show - Hide
	// ################################	
		// Respond form
		jQuery(".respondbtn").click(function () {
			jQuery("#respondwrap").slideToggle(500, function() {
				if (jQuery(this).is(":visible")) {
					jQuery('html, body').animate({scrollTop: jQuery(this).offset().top}, 500)
				}
			});
		});
		// Shortcode  Fold - Unfold
		jQuery(".job_title").click(function () {
			jQuery(this).siblings('.job_desc').slideToggle(500, function() {
				if (jQuery(this).is(":visible")) {
					jQuery('html, body').animate({scrollTop: jQuery(this).offset().top}, 500)
				}
			});
		});
		// Footer Contact info.
		jQuery("#footer_trggle").click(function () {
			jQuery("#footunder").slideToggle(500, function() {
				if (jQuery(this).is(":visible")) {
					jQuery('html, body').animate({scrollTop: jQuery(this).offset().top}, 300)
					jQuery("#footer_trggle").removeClass('footer_open').addClass('footer_close');
				}else{
					jQuery("#footer_trggle").removeClass('footer_close').addClass('footer_open');
				}
			});
		});
	// #################################
	// Back Top
	// ################################	
	/**/
		jQuery("#top").hide();
		jQuery(function () {
			jQuery(window).scroll(function(){
				if (jQuery(window).scrollTop()>100){
					jQuery("#top").fadeIn(300);
				}else{
					jQuery("#top").fadeOut(300);
				}
			});
			jQuery("#top").click(function(){
				jQuery('body,html').animate({scrollTop:0},500);
				return false;
			});
		});

	// ######################################
	// //Responsive Layout - isotope trigger
	// #####################################
		/**/
	jQuery(window).load(function(){
		var $container = jQuery('#list_wrap');
		$container.imagesLoaded(function(){
		  $container.isotope({
			transformsEnabled: false,
			animationEngine : 'jquery',
			itemSelector : '.list_box'
		  });
		});
		//Filterable 
		jQuery('#filterable a').click(function(){
			jQuery(this).css('outline','none');
			jQuery('ul#filterable .current').removeClass('current');
			jQuery(this).parent().addClass('current');	
			var selector = jQuery(this).attr('data-filter');
			$container.isotope({ 
				transformsEnabled: false,
				animationEngine : 'jquery',			   
				filter: selector
			});
			return false;
		});
		//Resize screen 
		jQuery(window).bind('smartresize.isotope',function(){
		  $container.isotope({
		  	itemSelector : '.list_box'
		  });
		});
		//infi mark
	});

	// #################################
	// Responsive Menus
	// ################################
(function($){

  //variable for storing the menu count when no ID is present
  var menuCount = 0;
  
  //plugin code
  $.fn.mobileMenu = function(options){
    
    //plugin's default options
    var settings = {
      switchWidth: 930,
      topOptionText: 'Menu',
      indentString: '---'
    };
    
    
    //function to check if selector matches a list
    function isList($this){
      return $this.is('ul, ol');
    }
  
  
    //function to decide if mobile or not
    function isMobile(){
      return (jQuery(window).width() < settings.switchWidth);
    }
    
    
    //check if dropdown exists for the current element
    function menuExists($this){
      
      //if the list has an ID, use it to give the menu an ID
      if($this.attr('id')){
        return (jQuery('#mobileMenu_'+$this.attr('id')).length > 0);
      } 
      
      //otherwise, give the list and select elements a generated ID
      else {
        menuCount++;
        $this.attr('id', 'mm'+menuCount);
        return (jQuery('#mobileMenu_mm'+menuCount).length > 0);
      }
    }
    
    
    //change page on mobile menu selection
    function goToPage($this){
      if($this.val() !== null){document.location.href = $this.val()}
    }
    
    
    //show the mobile menu
    function showMenu($this){
      $this.css('display', 'none');
      jQuery('#mobileMenu_'+$this.attr('id')).show();
    }
    
    
    //hide the mobile menu
    function hideMenu($this){
      $this.css('display', '');
      jQuery('#mobileMenu_'+$this.attr('id')).hide();
    }
    
    
    //create the mobile menu
    function createMenu($this){
      if(isList($this)){
                
        //generate select element as a string to append via jQuery
        var selectString = '<select id="mobileMenu_'+$this.attr('id')+'" class="mobileMenu">';
        
        //create first option (no value)
        selectString += '<option value="">'+settings.topOptionText+'</option>';
        
        //loop through list items
        $this.find('li').each(function(){
          
          //when sub-item, indent
          var levelStr = '';
          var len = $(this).parents('ul, ol').length;
          for(i=1;i<len;i++){levelStr += settings.indentString;}
          
          //get url and text for option
          var link = $(this).find('a').attr('href');
          var text = levelStr + $(this).clone().find('ul, ol, span').remove().end().text();
          
          //add option
          selectString += '<option value="'+link+'">'+text+'</option>';
        });
        
        selectString += '</select>';
        
        //append select element to ul/ol's container
        $this.parent().append(selectString);
        
        //add change event handler for mobile menu
        jQuery('#mobileMenu_'+$this.attr('id')).change(function(){
          goToPage(jQuery(this));
        });
        
        //hide current menu, show mobile menu
        showMenu($this);
      } else {
        alert('mobileMenu will only work with UL or OL elements!');
      }
    }
    
    
    //plugin functionality
    function run($this){
      
      //menu doesn't exist
      if(isMobile() && !menuExists($this)){
        createMenu($this);
      }
      
      //menu already exists
      else if(isMobile() && menuExists($this)){
        showMenu($this);
      }
      
      //not mobile browser
      else if(!isMobile() && menuExists($this)){
        hideMenu($this);
      }

    }
    
    //run plugin on each matched ul/ol
    //maintain chainability by returning "this"
    return this.each(function() {
      
      //override the default settings if user provides some
      if(options){$.extend(settings, options);}
      
      //cache "this"
      var $this = jQuery(this);
    
      //bind event to browser resize
      jQuery(window).resize(function(){run($this);});

      //run plugin
      run($this);

    });
    
  };
  
})(jQuery);

	// #################################
	// Triggle - Responsive Menus
	// ################################
	jQuery('.nav ul.menu').mobileMenu();
	
	// #################################
	// Triggle - flexslider
	// ################################
	jQuery('.flexslider').flexslider();
	

	// #################################
	// Client for image in list
	// #################################
		if(navigator.platform == "iPhone" || navigator.platform == "iPad" || navigator.platform == 'iPod') {
			  jQuery('img').css('margin-bottom','-6px');
		}
});