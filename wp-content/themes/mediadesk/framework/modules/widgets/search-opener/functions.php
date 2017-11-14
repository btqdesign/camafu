<?php

if ( ! function_exists( 'mediadesk_edge_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function mediadesk_edge_register_search_opener_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_search_opener_widget' );
}