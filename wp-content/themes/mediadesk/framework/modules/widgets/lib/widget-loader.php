<?php

if ( ! function_exists( 'mediadesk_edge_register_widgets' ) ) {
	function mediadesk_edge_register_widgets() {
		$widgets = apply_filters( 'mediadesk_edge_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'mediadesk_edge_register_widgets' );
}