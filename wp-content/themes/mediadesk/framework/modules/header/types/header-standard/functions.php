<?php

if ( ! function_exists( 'mediadesk_edge_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mediadesk_edge_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'MediaDeskNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mediadesk_edge_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mediadesk_edge_init_register_header_standard_type() {
		add_filter( 'mediadesk_edge_filter_register_header_type_class', 'mediadesk_edge_register_header_standard_type' );
	}
	
	add_action( 'mediadesk_edge_action_before_header_function_init', 'mediadesk_edge_init_register_header_standard_type' );
}