<?php

if ( ! function_exists( 'mediadesk_edge_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function mediadesk_edge_register_button_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_button_widget' );
}