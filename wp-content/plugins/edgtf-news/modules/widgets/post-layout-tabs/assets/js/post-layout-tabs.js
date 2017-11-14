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