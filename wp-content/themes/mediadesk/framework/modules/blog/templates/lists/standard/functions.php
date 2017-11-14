<?php

if ( ! function_exists( 'mediadesk_edge_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function mediadesk_edge_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'mediadesk' );
		
		return $templates;
	}
	
	add_filter( 'mediadesk_edge_filter_register_blog_templates', 'mediadesk_edge_register_blog_standard_template_file' );
}

if ( ! function_exists( 'mediadesk_edge_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function mediadesk_edge_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'mediadesk' );
		
		return $options;
	}
	
	add_filter( 'mediadesk_edge_filter_blog_list_type_global_option', 'mediadesk_edge_set_blog_standard_type_global_option' );
}