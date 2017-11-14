(function($) {
    "use strict";

    var sidearea = {};
    edgtf.modules.sidearea = sidearea;

    sidearea.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
	    edgtfFullscreen();
	    edgtfFullscreenScroll();
    }
	
	/**
	 * Show/hide side area
	 */
	function edgtfFullscreen() {
		var wrapper = $('.edgtf-wrapper'),
			fulscreenButtonOpen = $('a.edgtf-fullscreen-button-opener'),
			cssClass = 'edgtf-fullscreen-opened';

		$('a.edgtf-fullscreen-button-opener, a.edgtf-fullscreen-close').click(function(e) {
			e.preventDefault();
			
			if(!fulscreenButtonOpen.hasClass('opened')) {
				fulscreenButtonOpen.addClass('opened');
				edgtf.body.addClass(cssClass);

				var currentScroll = $(window).scrollTop();
				$(window).scroll(function() {
					if(Math.abs(edgtf.scroll - currentScroll) > 400){
						edgtf.body.removeClass(cssClass);
						fulscreenButtonOpen.removeClass('opened');
					}
				});

			} else {
				fulscreenButtonOpen.removeClass('opened');
				edgtf.body.removeClass(cssClass);
			}
		});
	}
	
	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function edgtfFullscreenScroll(){
		var fullscreen = $('.edgtf-fullscreen-area');
		
		if(fullscreen.length){
			fullscreen.niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			});
		}
	}

})(jQuery);
