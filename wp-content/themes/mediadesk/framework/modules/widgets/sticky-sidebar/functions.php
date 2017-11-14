<?php

if(!function_exists('mediadesk_edge_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function mediadesk_edge_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'MediaDeskClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter('mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_sticky_sidebar_widget');
}