<?php

if ( ! function_exists( 'mediadesk_edge_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function mediadesk_edge_register_separator_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_separator_widget' );
}