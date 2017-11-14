<?php

if ( ! function_exists( 'mediadesk_edge_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function mediadesk_edge_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'edgtf-container';
		$params_list['inner']  = 'edgtf-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'mediadesk_edge_filter_blog_holder_params', 'mediadesk_edge_get_blog_holder_params' );
}

if ( ! function_exists( 'mediadesk_edge_get_blog_holder_classes' ) ) {
	/**
	 * Function that generates blog holder classes for blog page
	 */
	function mediadesk_edge_get_blog_holder_classes( $classes ) {
		$sidebar_classes   = array();
		$sidebar_classes[] = 'edgtf-grid-medium-gutter';
		
		return implode( ' ', $sidebar_classes );
	}
	
	add_filter( 'mediadesk_edge_filter_blog_holder_classes', 'mediadesk_edge_get_blog_holder_classes' );
}