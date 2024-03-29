(function($) {
    "use strict";

    var search = {};
    edgtf.modules.search = search;

    search.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
	    edgtfSearch();
    }
	
	/**
	 * Init Search Types
	 */
	function edgtfSearch() {
		var searchOpener = $('a.edgtf-search-opener'),
			searchClose;
		
		if ( searchOpener.length > 0 ) {
			//Check for type of search
			if ( edgtf.body.hasClass( 'edgtf-fullscreen-search' ) ) {
				searchClose = $( '.edgtf-fullscreen-search-close' );
				edgtfFullscreenSearch();
			}
		}
		
		/**
		 * Fullscreen search fade
		 */
		function edgtfFullscreenSearch() {
			var searchHolder = $('.edgtf-fullscreen-search-holder');
			
			searchOpener.click(function (e) {
				e.preventDefault();
				
				if (searchHolder.hasClass('edgtf-animate')) {
					edgtf.body.removeClass('edgtf-fullscreen-search-opened edgtf-search-fade-out');
					edgtf.body.removeClass('edgtf-search-fade-in');
					searchHolder.removeClass('edgtf-animate');
					
					setTimeout(function () {
						searchHolder.find('.edgtf-search-field').val('');
						searchHolder.find('.edgtf-search-field').blur();
					}, 300);
					
					edgtf.modules.common.edgtfEnableScroll();
				} else {
					edgtf.body.addClass('edgtf-fullscreen-search-opened edgtf-search-fade-in');
					edgtf.body.removeClass('edgtf-search-fade-out');
					searchHolder.addClass('edgtf-animate');
					
					setTimeout(function () {
						searchHolder.find('.edgtf-search-field').focus();
					}, 900);
					
					edgtf.modules.common.edgtfDisableScroll();
				}
				
				searchClose.click(function (e) {
					e.preventDefault();
					edgtf.body.removeClass('edgtf-fullscreen-search-opened edgtf-search-fade-in');
					edgtf.body.addClass('edgtf-search-fade-out');
					searchHolder.removeClass('edgtf-animate');
					
					setTimeout(function () {
						searchHolder.find('.edgtf-search-field').val('');
						searchHolder.find('.edgtf-search-field').blur();
					}, 300);
					
					edgtf.modules.common.edgtfEnableScroll();
				});
				
				//Close on click away
				$(document).mouseup(function (e) {
					var container = $(".edgtf-form-holder-inner");
					
					if (!container.is(e.target) && container.has(e.target).length === 0) {
						e.preventDefault();
						edgtf.body.removeClass('edgtf-fullscreen-search-opened edgtf-search-fade-in');
						edgtf.body.addClass('edgtf-search-fade-out');
						searchHolder.removeClass('edgtf-animate');
						
						setTimeout(function () {
							searchHolder.find('.edgtf-search-field').val('');
							searchHolder.find('.edgtf-search-field').blur();
						}, 300);
						
						edgtf.modules.common.edgtfEnableScroll();
					}
				});
				
				//Close on escape
				$(document).keyup(function (e) {
					if (e.keyCode == 27) { //KeyCode for ESC button is 27
						edgtf.body.removeClass('edgtf-fullscreen-search-opened edgtf-search-fade-in');
						edgtf.body.addClass('edgtf-search-fade-out');
						searchHolder.removeClass('edgtf-animate');
						
						setTimeout(function () {
							searchHolder.find('.edgtf-search-field').val('');
							searchHolder.find('.edgtf-search-field').blur();
						}, 300);
						
						edgtf.modules.common.edgtfEnableScroll();
					}
				});
			});
			
			//Text input focus change
			var inputSearchField = $('.edgtf-fullscreen-search-holder .edgtf-search-field'),
				inputSearchLine = $('.edgtf-fullscreen-search-holder .edgtf-field-holder .edgtf-line');
			
			inputSearchField.focus(function () {
				inputSearchLine.css('width', '100%');
			});
			
			inputSearchField.blur(function () {
				inputSearchLine.css('width', '0');
			});
		}
	}

})(jQuery);
