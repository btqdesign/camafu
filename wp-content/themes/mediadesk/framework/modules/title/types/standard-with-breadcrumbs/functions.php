<?php

if ( ! function_exists( 'mediadesk_edge_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function mediadesk_edge_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'mediadesk' );
		
		return $type;
	}
	
	add_filter( 'mediadesk_edge_filter_title_type_global_option', 'mediadesk_edge_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'mediadesk_edge_filter_title_type_meta_boxes', 'mediadesk_edge_set_title_standard_with_breadcrumbs_type_for_options' );
}