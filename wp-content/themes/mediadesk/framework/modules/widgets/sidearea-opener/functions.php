<?php

if ( ! function_exists( 'mediadesk_edge_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function mediadesk_edge_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'MediaDeskClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'mediadesk_edge_filter_register_widgets', 'mediadesk_edge_register_sidearea_opener_widget' );
}