(function($) {
	"use strict";

    var masonryLayout = {};
    edgtf.modules.masonryLayout = masonryLayout;

    masonryLayout.edgtfOnDocumentReady = edgtfOnDocumentReady;
    masonryLayout.edgtfOnWindowResize = edgtfOnWindowResize;

    $(document).ready(edgtfOnDocumentReady);
    $(window).resize(edgtfOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
	    edgtfInitMasonryLayout();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
	    edgtfInitMasonryLayout();
    }

    /* 
     * Trigger functions after pagination
    */
    $(document).on('edgtfNewsAfterPagination', function(event, masonryHolder, content) {
	    edgtfAppendContentMasonryLayout(masonryHolder, content);
    });

    /* 
     * Trigger functions after filtering
    */
    $(document).on('edgtfNewsAfterFilter', function(event, masonryHolder, content) {
	    edgtfAppendContentMasonryLayout(masonryHolder, content);
    });
	
    /**
     *  Init Masonry Layout
     */
    function edgtfInitMasonryLayout() {
        var masonryLayout = $('.edgtf-news-holder.edgtf-masonry-layout');

        if(masonryLayout.length){
            masonryLayout.each(function(){

                var container = $(this),
                    masonry = container.children('.edgtf-news-list-inner'),
                    size = masonry.find('.edgtf-masonry-layout-sizer').width();

                edgtfResizeMasonryLayoutItems(size, masonry);
                // masonry.isotope('destroy');

			    masonry.isotope({
				    layoutMode: 'packery',
				    itemSelector: '.edgtf-news-item',
				    percentPosition: true,
				    packery: {
					    gutter: '.edgtf-masonry-layout-gutter',
					    columnWidth: '.edgtf-masonry-layout-sizer'
				    }
			    });
			    
                masonry.isotope( 'layout').addClass('edgtf-masonry-appeared');
            });
        }
    }

    /**
     * Init Resize Masonry Layout Items
     */
    function edgtfResizeMasonryLayoutItems(size,container){

        if(container.hasClass('edgtf-masonry-layout-image-fixed')) {
            var padding = parseInt(container.find('.edgtf-news-item').css('padding-left')),
                defaultMasonryItem = container.find('.edgtf-news-masonry-post-size-default'),
                largeWidthMasonryItem = container.find('.edgtf-news-masonry-post-size-large-width'),
                largeHeightMasonryItem = container.find('.edgtf-news-masonry-post-size-large-height'),
                largeWidthHeightMasonryItem = container.find('.edgtf-news-masonry-post-size-large-width-height');

			if (edgtf.windowWidth > 680) {
				defaultMasonryItem.css('height', size);
				largeHeightMasonryItem.css('height', Math.round(2 * size));
				largeWidthHeightMasonryItem.css('height', Math.round(2 * size));
				largeWidthMasonryItem.css('height', size);
			} else {
				defaultMasonryItem.css('height', size);
				largeHeightMasonryItem.css('height', Math.round(2 * size));
				largeWidthHeightMasonryItem.css('height', size);
				largeWidthMasonryItem.css('height', Math.round(size / 2));
			}
        }
    }

    function edgtfAppendContentMasonryLayout(masonryHolder, content) {

        if(masonryHolder.length && masonryHolder.parent().hasClass('edgtf-masonry-layout')){
            var size = masonryHolder.find('.edgtf-masonry-layout-sizer').width();

            //remove duplicated sizer and gutter if exist
            masonryHolder.find('.edgtf-masonry-layout-sizer').eq(1).remove();
            masonryHolder.find('.edgtf-masonry-layout-gutter').eq(1).remove();

			masonryHolder.isotope('reloadItems').isotope({sortBy: 'original-order'});			
            edgtfResizeMasonryLayoutItems(size, masonryHolder);

			setTimeout(function() {
				masonryHolder.isotope('layout');
			}, 600);
        }
    }

})(jQuery);