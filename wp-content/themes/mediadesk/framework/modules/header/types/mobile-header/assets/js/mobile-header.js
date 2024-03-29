(function($) {
    "use strict";

    var mobileHeader = {};
    edgtf.modules.mobileHeader = mobileHeader;
	
	mobileHeader.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitMobileNavigation();
        edgtfMobileHeaderBehavior();
    }

    function edgtfInitMobileNavigation() {
        var navigationOpener = $('.edgtf-mobile-header .edgtf-mobile-menu-opener'),
            navigationHolder = $('.edgtf-mobile-header .edgtf-mobile-nav'),
            dropdownOpener = $('.edgtf-mobile-nav .mobile_arrow, .edgtf-mobile-nav h6, .edgtf-mobile-nav a.edgtf-mobile-no-link');

        //whole mobile menu opening / closing
        if(navigationOpener.length && navigationHolder.length) {
            navigationOpener.on('tap click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                if(navigationHolder.is(':visible')) {
                    navigationHolder.slideUp(450, 'easeInOutQuint');
                    navigationOpener.removeClass('edgtf-mobile-menu-opened');
                } else {
                    navigationHolder.slideDown(450, 'easeInOutQuint');
                    navigationOpener.addClass('edgtf-mobile-menu-opened');
                }
            });
        }

        //dropdown opening / closing
        if(dropdownOpener.length) {
            dropdownOpener.each(function() {
                $(this).on('tap click', function(e) {
	                var thisItem = $(this),
		                thisItemParent = thisItem.parent('li');
	
	                if (thisItemParent.hasClass('has_sub')) {
		                var submenu = thisItemParent.find('> ul.sub_menu');
		
		                if (submenu.is(':visible')) {
			                submenu.slideUp(450, 'easeInOutQuint');
			                thisItemParent.removeClass('edgtf-opened');
		                } else {
			                thisItemParent.addClass('open_sub');
			
			                if(thisItem.closest('.sub_menu').find('> .has_sub').length === 1) {
				                thisItemParent.removeClass('edgtf-opened').find('.sub_menu').slideUp(400, 'easeInOutQuint', function() {
				                	submenu.slideDown(400, 'easeInOutQuint');
				                });
			                } else {
				                thisItemParent.siblings().removeClass('edgtf-opened').find('.sub_menu').slideUp(400, 'easeInOutQuint', function() {
					                submenu.slideDown(400, 'easeInOutQuint');
				                });
			                }
		                }
	                }
                });
            });
        }

        $('.edgtf-mobile-nav a, .edgtf-mobile-logo-wrapper a').on('click tap', function(e) {
            if($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
                navigationHolder.slideUp(450, 'easeInOutQuint');
                navigationOpener.removeClass("edgtf-mobile-menu-opened");
            }
        });
    }

    function edgtfMobileHeaderBehavior() {
	    var mobileHeader = $('.edgtf-mobile-header'),
		    mobileMenuOpener = mobileHeader.find('.edgtf-mobile-menu-opener'),
		    mobileHeaderHeight = mobileHeader.length ? mobileHeader.outerHeight() : 0;
	    
	    if(edgtf.body.hasClass('edgtf-content-is-behind-header') && mobileHeaderHeight > 0 && edgtf.windowWidth <= 1024) {
		    $('.edgtf-content').css('marginTop', -mobileHeaderHeight);
	    }
	    
        if(edgtf.body.hasClass('edgtf-sticky-up-mobile-header')) {
            var stickyAppearAmount,
                adminBar     = $('#wpadminbar');

            var docYScroll1 = $(document).scrollTop();
            stickyAppearAmount = mobileHeaderHeight + edgtfGlobalVars.vars.edgtfAddForAdminBar;

            $(window).scroll(function() {
                var docYScroll2 = $(document).scrollTop();

                if(docYScroll2 > stickyAppearAmount) {
                    mobileHeader.addClass('edgtf-animate-mobile-header');
                } else {
                    mobileHeader.removeClass('edgtf-animate-mobile-header');
                }

                if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount && !mobileMenuOpener.hasClass('edgtf-mobile-menu-opened')) || (docYScroll2 < stickyAppearAmount)) {
                    mobileHeader.removeClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', 0);

                    if(adminBar.length) {
                        mobileHeader.find('.edgtf-mobile-header-inner').css('top', 0);
                    }
                } else {
                    mobileHeader.addClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', stickyAppearAmount);
                }

                docYScroll1 = $(document).scrollTop();
            });
        }
    }

})(jQuery);