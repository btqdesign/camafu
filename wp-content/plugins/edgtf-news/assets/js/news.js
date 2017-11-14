(function($) {
	"use strict";

    var news = {};
    edgtf.modules.news = news;

    news.edgtfOnDocumentReady = edgtfOnDocumentReady;
    news.edgtfOnWindowLoad = edgtfOnWindowLoad;
    news.edgtfOnWindowScroll = edgtfOnWindowScroll;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).scroll(edgtfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
    	edgtfInitNewsShortcodesFilter();
    	edgtfLayoutHover();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
	    edgtfInitNewsShortcodesPagination().init();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
	    edgtfInitNewsShortcodesPagination().scroll();
    }

	/**
	 * Init news shortcodes pagination functions
	 */
	function edgtfInitNewsShortcodesPagination(){
		var holder = $('.edgtf-news-holder');
		
		var initStandardPagination = function(thisHolder) {
			var standardLink = thisHolder.find('.edgtf-news-standard-pagination li');

			if(standardLink.length) {
				standardLink.each(function(){

					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}

						initMainPagFunctionality(thisHolder, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisHolder) {
			var loadMoreButton = thisHolder.find('.edgtf-news-load-more-pagination a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisHolder);
			});
		};
		
		var initInifiteScrollPagination = function(thisHolder) {
			var newsShortcodeHeight = thisHolder.outerHeight(),
				newsShortcodeTopOffest = thisHolder.offset().top,
				newsShortcodePosition = newsShortcodeHeight + newsShortcodeTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;
			
			if(!thisHolder.hasClass('edgtf-news-pag-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > newsShortcodePosition) {
				initMainPagFunctionality(thisHolder);
			}
		};
		
		var initMainPagFunctionality = function(thisHolder, pagedLink) {
			var thisHolderInner = thisHolder.find('.edgtf-news-list-inner'),
				nextPage,
				maxNumPages,
				pagRangeLimit;
			
			if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
				maxNumPages = thisHolder.data('max-num-pages');
			}
			
			if(thisHolder.hasClass('edgtf-news-pag-standard')) {
				thisHolder.data('next-page', pagedLink);
				pagRangeLimit = thisHolder.data('pagination-numbers-amount');
			}
			
			if(thisHolder.hasClass('edgtf-news-pag-infinite-scroll')) {
				thisHolder.addClass('edgtf-news-pag-infinite-scroll-started');
			}
			
			var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisHolder),
				loadingItem = thisHolder.find('.edgtf-news-pag-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				if(thisHolder.hasClass('edgtf-news-pag-standard')) {
					loadingItem.addClass('edgtf-showing edgtf-news-pag-standard-trigger');
					thisHolder.addClass('edgtf-news-standard-pag-animate');
				} else {
					loadingItem.addClass('edgtf-showing');
				}
				var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'edgtf_news_shortcodes_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: edgtfGlobalVars.vars.edgtfAjaxUrl,
					success: function (data) {
						if(!thisHolder.hasClass('edgtf-news-pag-standard')) {
							nextPage++;
						}
						
						thisHolder.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisHolder.hasClass('edgtf-news-pag-standard')) {
							edgtfInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage, pagRangeLimit);
							
							thisHolder.waitForImages(function(){
								edgtfInitHtmlGalleryNewContent(thisHolder, thisHolderInner, loadingItem, responseHtml);
								
								if (typeof edgtf.modules.layout2.edgtfInitLayout2 === 'function') {
									edgtf.modules.layout2.edgtfInitLayout2();
								}
								
								if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
									edgtf.modules.common.edgtfStickySidebarWidget().reInit();
								}
							});
						} else {
							thisHolder.waitForImages(function(){
								edgtfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
								
								if (typeof edgtf.modules.layout2.edgtfInitLayout2 === 'function') {
									edgtf.modules.layout2.edgtfInitLayout2();
								}
								
								if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
									edgtf.modules.common.edgtfStickySidebarWidget().reInit();
								}
							});
						}
						if(thisHolder.hasClass('edgtf-news-pag-infinite-scroll-started')) {
							thisHolder.removeClass('edgtf-news-pag-infinite-scroll-started');
						}

						//reinitialise hover to get new items
						setTimeout(function(){
							edgtfLayoutHover();
						},500);
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisHolder.find('.edgtf-news-load-more-pagination').hide();
			}
		};
		
		var edgtfInitHtmlGalleryNewContent = function(thisHolder, thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing edgtf-news-pag-standard-trigger');
			thisHolder.removeClass('edgtf-news-standard-pag-animate');
			thisHolderInner.html(responseHtml);
			thisHolderInner.trigger('edgtfNewsAfterPagination', [thisHolderInner, responseHtml]);
		};
		
		var edgtfInitAppendGalleryNewContent = function(thisHolderInner, loadingItem, responseHtml) {
			loadingItem.removeClass('edgtf-showing');
			thisHolderInner.append(responseHtml);
			thisHolderInner.trigger('edgtfNewsAfterPagination', [thisHolderInner, responseHtml]);
		};
		
		return {
			init: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edgtf-news-pag-standard')) {
							initStandardPagination(thisHolder);
						}
						
						if(thisHolder.hasClass('edgtf-news-pag-load-more')) {
							initLoadMorePagination(thisHolder);
						}
						
						if(thisHolder.hasClass('edgtf-news-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			},
			scroll: function() {
				if(holder.length) {
					holder.each(function() {
						var thisHolder = $(this);
						
						if(thisHolder.hasClass('edgtf-news-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisHolder);
						}
					});
				}
			}
		};
	}

	function edgtfInitNewsShortcodesFilter(){
		var holder = $('.edgtf-news-holder');

		if (holder.length){

			holder.each(function(){
				var thisHolder = $(this),
					filterHolder = thisHolder.find('.edgtf-news-filter');

				if (filterHolder.length){
					var filters = filterHolder.find('.edgtf-news-filter-item'),
						filterBy = filterHolder.data('filter-by');

					filters.first().addClass('edgtf-news-active-filter');

					filters.click(function(e){
						e.preventDefault();
						e.stopPropagation();

						var thisFilter = $(this),
							filterData = thisFilter.data('filter');

						if (!thisFilter.hasClass('edgtf-news-active-filter')) {
							thisFilter.siblings().removeClass('edgtf-news-active-filter');
							thisFilter.addClass('edgtf-news-active-filter');

							thisHolder.addClass('edgtf-news-filter-activated');

							initFilterBy(thisHolder, filterBy, filterData);
						}
					});
					
					var initFilterBy = function(thisHolder, filterBy, filterData) {
						var thisHolderInner = thisHolder.find('.edgtf-news-list-inner'),
							loader = thisHolder.find('.edgtf-news-filter-loading');

						loader.addClass('edgtf-news-activate');

						var loadMoreData = edgtf.modules.common.getLoadMoreData(thisHolder);

						switch(filterBy) {
							case 'category':
								loadMoreData.categoryName = filterData;
							break;
							case 'tag':
								loadMoreData.tag = filterData;
							break;
						}
						
						var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreData, 'edgtf_news_shortcodes_filter');
						
						$.ajax({
							type: 'POST',
							data: ajaxData,
							url: edgtfGlobalVars.vars.edgtfAjaxUrl,
							success: function (data) {
								
								var response = $.parseJSON(data),
									responseHtml =  response.html,
									newQueryParams =  response.newQueryParams;

								thisHolder.data('max-num-pages',newQueryParams['max_num_pages']);
								thisHolder.data('next-page',parseInt(newQueryParams['paged']) + 1);

								switch(filterBy) {
									case 'category':
										thisHolder.data('category-name', filterData);
									break;
									case 'tag':
										thisHolder.data('tag', filterData);
									break;
								}

								if(thisHolder.data('max-num-pages') == thisHolder.data('paged')) {
									thisHolder.find('.edgtf-news-load-more-pagination').hide();
								} else {
									thisHolder.find('.edgtf-news-load-more-pagination').show();									
								}

								if(thisHolder.hasClass('edgtf-news-pag-infinite-scroll-started')) {
									thisHolder.removeClass('edgtf-news-pag-infinite-scroll-started');
								}

								if (thisHolder.find('.edgtf-news-standard-pagination').length){
									var standardPagHolder = thisHolder.find('.edgtf-news-standard-pagination'),
										standardPagNumericItem = standardPagHolder.find('li.edgtf-news-pag-number'),
										standardPagLastPage = standardPagHolder.find('li.edgtf-news-pag-last-page a'),
										maxNumPages = thisHolder.data('max-num-pages'),
										pagRangeLimit = thisHolder.data('pagination-numbers-amount');

									edgtfInitStandardPaginationLinkChanges(thisHolder, maxNumPages, 1, pagRangeLimit);

									if (maxNumPages == 1){
										standardPagHolder.hide();
									} else {
										standardPagHolder.show();
									}

									standardPagLastPage.data('paged',maxNumPages);

									if (maxNumPages <= pagRangeLimit){
										standardPagNumericItem.each(function(e){
											var thisItem = $(this);

											if (e >= maxNumPages){
												thisItem.hide();
											} else {
												thisItem.show();
											}
										});
									} else {
										standardPagNumericItem.show();
									}
								}
									
								thisHolder.waitForImages(function(){
									edgtfInitHtmlGalleryNewContent(thisHolder, thisHolderInner, responseHtml);
									loader.removeClass('edgtf-news-activate');
									thisHolder.removeClass('edgtf-news-filter-activated');
									
									if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
										edgtf.modules.common.edgtfStickySidebarWidget().reInit();
									}
								});
							}
						});
					};

					var edgtfInitHtmlGalleryNewContent = function(thisHolder, thisHolderInner, responseHtml) {
						thisHolderInner.html(responseHtml);
						thisHolderInner.trigger('edgtfNewsAfterPagination', [thisHolderInner, responseHtml]);
					};
				}
			});
		}
	}

	/*
	* Function for Pagination Link Changes for navigation and filter
	*/
	function edgtfInitStandardPaginationLinkChanges(thisHolder, maxNumPages, nextPage, pagRangeLimit) {
		var standardPagHolder = thisHolder.find('.edgtf-news-standard-pagination'),
			standardPagNumericItem = standardPagHolder.find('li.edgtf-news-pag-number'),
			standardPagPrevItem = standardPagHolder.find('li.edgtf-news-pag-prev a'),
			standardPagNextItem = standardPagHolder.find('li.edgtf-news-pag-next a'),
			standardPagFirstItem = standardPagHolder.find('li.edgtf-news-pag-first-page a'),
			standardPagLastItem = standardPagHolder.find('li.edgtf-news-pag-last-page a'),
			i = 1,
			j = pagRangeLimit,
			middle = Math.floor(pagRangeLimit/2)+1;

		if (pagRangeLimit > maxNumPages) {
			pagRangeLimit = maxNumPages;
		}
		
		standardPagPrevItem.data('paged', nextPage-1);
		standardPagNextItem.data('paged', nextPage+1);
		
		if(nextPage > 1) {
			standardPagPrevItem.css({'opacity': '1'});
		} else {
			standardPagPrevItem.css({'opacity': '0'});
		}
		
		if(nextPage === maxNumPages) {
			standardPagNextItem.css({'opacity': '0'});
		} else {
			standardPagNextItem.css({'opacity': '1'});
		}

		if(nextPage > middle) {
			standardPagFirstItem.css({'opacity': '1'});
		} else {
			standardPagFirstItem.css({'opacity': '0'});
		}

		if(nextPage < maxNumPages - middle + 1) {
			standardPagLastItem.css({'opacity': '1'});
		} else {
			standardPagLastItem.css({'opacity': '0'});
		}
		
		if (nextPage >= middle && nextPage <= maxNumPages - middle + 1) {
			standardPagNumericItem.eq(middle - 1).find('a').data('paged', nextPage);
			standardPagNumericItem.eq(middle - 1).find('a').html(nextPage);
			standardPagNumericItem.removeClass('edgtf-news-pag-active');
			standardPagNumericItem.eq(middle - 1).addClass('edgtf-news-pag-active');

			while (i < middle) {
			    standardPagNumericItem.eq(middle - i - 1 ).find('a').data('paged', nextPage - i);
			    standardPagNumericItem.eq(middle - i - 1 ).find('a').html(nextPage - i);
			    standardPagNumericItem.eq(middle + i - 1 ).find('a').data('paged', nextPage + i);
			    standardPagNumericItem.eq(middle + i - 1 ).find('a').html(nextPage + i);
			    i++;
			}

		} else if (nextPage < middle) {
			while (i <= pagRangeLimit) {
			    standardPagNumericItem.eq(i - 1 ).find('a').data('paged', i);
			    standardPagNumericItem.eq(i - 1 ).find('a').html(i);
			    i++;
			}

			standardPagNumericItem.removeClass('edgtf-news-pag-active');
			standardPagNumericItem.eq(nextPage - 1).addClass('edgtf-news-pag-active');

		} else {
			while (j > 0) {
			    standardPagNumericItem.eq(pagRangeLimit - j).find('a').data('paged', maxNumPages - j + 1);
			    standardPagNumericItem.eq(pagRangeLimit - j ).find('a').html(maxNumPages - j + 1);
			    j--;
			}

			standardPagNumericItem.removeClass('edgtf-news-pag-active');
			standardPagNumericItem.eq(pagRangeLimit - (maxNumPages - nextPage) - 1).addClass('edgtf-news-pag-active');
		}
	}

	function edgtfLayoutHover() {
	    var holder = $('.edgtf-news-item.edgtf-layout1-item, .edgtf-news-item.edgtf-layout2-item, .edgtf-news-item.edgtf-layout3-item, .edgtf-news-item.edgtf-layout4-item, .edgtf-news-item.edgtf-layout6-item, .edgtf-news-item.edgtf-layout8-item, .edgtf-news-item.edgtf-masonry-layout-item');
	
	    if (holder.length) {
		    holder.each(function () {
			    var thisHolder = $(this);

			    thisHolder.find('.edgtf-post-image, .edgtf-post-title').hover(function(){
			    	thisHolder.addClass("edgtf-hovered");
			    },function(){
			    	thisHolder.removeClass("edgtf-hovered");
			    });

		    });
	    }
    }

})(jQuery);
(function($) {
	"use strict";

    var reactions = {};
    edgtf.modules.reactions = reactions;

    reactions.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
    	edgtfReactions();
    }

    function edgtfReactions() {
    	var reactions = $('.edgtf-news-reactions'),
    		postID = reactions.data('post-id');

    	if (reactions.length){
    		var reactionTerm = reactions.find('.edgtf-reaction');

    		reactionTerm.each(function () {
    			var thisReaction = $(this),
    				thisReactionValue = thisReaction.find('.edgtf-rt-value');

    			thisReaction.on('click', function (e) {
    				e.preventDefault();
    				e.stopPropagation();

    				var reactionSlug = thisReaction.data('reaction');

    				if (thisReaction.hasClass('reacted')){
    					return false;
    				}

    				var dataToPass = {
		                action: 'edgtf_news_reaction_update',
		                reaction_slug: reactionSlug,
		                post_ID: postID,
		            };

					$.ajax({
						type: 'POST',
						data: dataToPass,
						url: edgtfGlobalVars.vars.edgtfAjaxUrl,
						success: function (data) {
							thisReaction.addClass('reacted');
							var newValue = parseInt(thisReactionValue.text()) + 1;
							thisReactionValue.text(newValue);
						}
					});
    			});
    			
    		});
	    }
    }

})(jQuery);
(function($) {
    'use strict';
	
	var block4Tabs = {};
	edgtf.modules.block4Tabs = block4Tabs;

	block4Tabs.edgtfPostLayoutTabWidget = edgtfPostLayoutTabWidget;


	block4Tabs.edgtfOnWindowLoad = edgtfOnWindowLoad;
	
	$(window).load(edgtfOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnWindowLoad() {
		edgtfPostLayoutTabWidget().init();
	}

	/**
	 * Object that represents post layout tabs widget
	 * @returns {{init: Function}} function that initializes post layout tabs widget functionality
	 */
	function edgtfPostLayoutTabWidget(){
		var layoutTabsWidget = $('.edgtf-plw-tabs-2');
		
		var edgtfPostLayoutTabWidgetEvent = function (thisWidget) {
			var plwTabsHolder = thisWidget.find('.edgtf-plw-tabs-tabs-holder'),
				plwTabsContent = thisWidget.find('.edgtf-plw-tabs-content-holder'),
				currentItemPosition = plwTabsHolder.children('.edgtf-plw-tabs-tab:first-child').index() + 1; // +1 is because index start from 0 and list from 1

			setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition);

			plwTabsHolder.find('a').on('click', function (e) {
				e.preventDefault();

				currentItemPosition = $(this).parents('.edgtf-plw-tabs-tab').index() + 1; // +1 is because index start from 0 and list from 1

				setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition);
			});
		};

		function setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition){
			var activeItemClass = 'edgtf-plw-tabs-active-item';

			plwTabsContent.children('.edgtf-plw-tabs-content').removeClass(activeItemClass);
			plwTabsHolder.children('.edgtf-plw-tabs-tab').removeClass(activeItemClass);

			var height = plwTabsContent.children('.edgtf-plw-tabs-content:nth-child('+currentItemPosition+')').addClass(activeItemClass).height();
			plwTabsContent.css('min-height',height+'px');
			plwTabsHolder.children('.edgtf-plw-tabs-tab:nth-child('+currentItemPosition+')').addClass(activeItemClass);
		}

		return {
			init : function() {
				if (layoutTabsWidget.length) {
					layoutTabsWidget.each(function () {
						edgtfPostLayoutTabWidgetEvent($(this));
					});
				}
			},

		};
	};

})(jQuery);
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
(function($) {
    'use strict';
	
	var postTabs = {};
	edgtf.modules.postTabs = postTabs;

	postTabs.edgtfPostLayoutTabWidget = edgtfPostLayoutTabWidget;


	postTabs.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfPostLayoutTabWidget().init();
	}

	/**
	 * Object that represents post layout tabs widget
	 * @returns {{init: Function}} function that initializes post layout tabs widget functionality
	 */
	function edgtfPostLayoutTabWidget(){

		var layoutTabsWidget = $('.edgtf-plw-tabs');


		var edgtfPostLayoutTabWidgetEvent = function (thisWidget) {
			var plwTabsHolder = thisWidget.find('.edgtf-plw-tabs-tabs-holder');
			var plwTabsContent = thisWidget.find('.edgtf-plw-tabs-content-holder');
			var currentItemPosition = plwTabsHolder.children('.edgtf-plw-tabs-tab:first-child').index() + 1; // +1 is because index start from 0 and list from 1

			setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition);

			plwTabsHolder.find('a').mouseover(function (e) {
				e.preventDefault();

				currentItemPosition = $(this).parents('.edgtf-plw-tabs-tab').index() + 1; // +1 is because index start from 0 and list from 1

				setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition);
			});
		};

		function setActiveTab(plwTabsContent, plwTabsHolder, currentItemPosition){
			var activeItemClass = 'edgtf-plw-tabs-active-item';

			plwTabsContent.children('.edgtf-plw-tabs-content').removeClass(activeItemClass);
			plwTabsHolder.children('.edgtf-plw-tabs-tab').removeClass(activeItemClass);

			var height = plwTabsContent.children('.edgtf-plw-tabs-content:nth-child('+currentItemPosition+')').addClass(activeItemClass).height();
			plwTabsContent.css('min-height',height+'px');
			plwTabsHolder.children('.edgtf-plw-tabs-tab:nth-child('+currentItemPosition+')').addClass(activeItemClass);
		}

		return {
			init : function() {
				if (layoutTabsWidget.length) {
					layoutTabsWidget.each(function () {
						edgtfPostLayoutTabWidgetEvent($(this));
					});
				}
			},

		};
	};

})(jQuery);