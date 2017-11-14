<?php

if ( ! function_exists( 'mediadesk_edge_register_blog_standard_whole_post_template_file' ) ) {
	/**
	 * Function that register blog standard whole post template
	 */
	function mediadesk_edge_register_blog_standard_whole_post_template_file( $templates ) {
		$templates['blog-standard-whole-post'] = esc_html__( 'Blog: Standard Whole Post', 'mediadesk' );
		
		return $templates;
	}
	
	add_filter( 'mediadesk_edge_filter_register_blog_templates', 'mediadesk_edge_register_blog_standard_whole_post_template_file' );
}