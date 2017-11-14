(function($) {
	"use strict";

    var layout2 = {};
    edgtf.modules.layout2 = layout2;
	
	layout2.edgtfInitLayout2 = edgtfInitLayout2;

    layout2.edgtfOnWindowLoad = edgtfOnWindowLoad;
    layout2.edgtfOnWindowResize = edgtfOnWindowResize;

    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    
    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
	    edgtfInitLayout2();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
	    edgtfInitLayout2();
    }
	
    /**
     *  Init Layout2
     */
    function edgtfInitLayout2() {
	    var holder = $('.edgtf-news-item.edgtf-layout2-item');
	
	    if (holder.length) {
		    holder.each(function () {
			    var thisHolder = $(this),
				    isCarousel = thisHolder.parents('.edgtf-post-carousel4'),
				    isCarouselNav = isCarousel.find('.owl-nav'),
				    itemBottomMargin = thisHolder.children('.edgtf-ni-inner'),
				    imageItem = thisHolder.find('.edgtf-ni-image-holder'),
				    contentItem = thisHolder.find('.edgtf-ni-content'),
				    tallest = 0;
			
			    contentItem.each(function() {
				    var thisItem = $(this).outerHeight();
				    
				    if(thisItem > tallest) {
					    tallest = thisItem;
				    }
			    });
			
			    if (tallest > 0) {
			    	if (isCarousel.length) {
			    		if (isCarouselNav.length) {
						    isCarouselNav.children().css('marginTop', -(tallest / 2 - 53)); //53 is half of 106
					    }
					    imageItem.css('height', edgtf.windowHeight - tallest + 106 - edgtfGlobalVars.vars.edgtfAddForAdminBar);
					    itemBottomMargin.css('marginBottom', tallest - 106); //106 is content offset inside image
				    } else {
					    itemBottomMargin.css('marginBottom', tallest - 30); //30 is content offset inside image
				    }
				
				    thisHolder.css('opacity', '1');
			    } else {
				    thisHolder.css('opacity', '1');
			    }

		    });
	    }
    }

})(jQuery);