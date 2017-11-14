<?php

if ( ! function_exists( 'mediadesk_edge_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function mediadesk_edge_register_custom_font_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_custom_font_widget' );
}