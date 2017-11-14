<?php

if ( ! function_exists( 'mediadesk_edge_register_raw_html_widget' ) ) {
	/**
	 * Function that register raw html widget
	 */
	function mediadesk_edge_register_raw_html_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassRawHTMLWidget';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_raw_html_widget' );
}