<?php

if ( ! function_exists( 'mediadesk_edge_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function mediadesk_edge_register_icon_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_icon_widget' );
}