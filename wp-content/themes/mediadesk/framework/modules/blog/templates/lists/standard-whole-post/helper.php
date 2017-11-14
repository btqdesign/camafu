<?php

if ( ! function_exists( 'mediadesk_edge_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function mediadesk_edge_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'edgtf-full-width';
		$params_list['inner']  = 'edgtf-full-width-inner';
		
		return $params_list;
	}
	
	add_filter( 'mediadesk_edge_filter_blog_holder_params', 'mediadesk_edge_get_blog_holder_params' );
}

if ( ! function_exists( 'mediadesk_edge_blog_part_params' ) ) {
	function mediadesk_edge_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h1';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'mediadesk_edge_filter_blog_part_params', 'mediadesk_edge_blog_part_params' );
}