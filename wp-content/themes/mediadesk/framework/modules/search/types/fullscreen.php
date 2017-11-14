<?php

if ( ! function_exists( 'mediadesk_edge_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function mediadesk_edge_search_body_class( $classes ) {
		$classes[] = 'edgtf-fullscreen-search';
		$classes[] = 'edgtf-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_search_body_class' );
}

if ( ! function_exists( 'mediadesk_edge_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function mediadesk_edge_get_search() {
		mediadesk_edge_load_search_template();
	}
	
	add_action( 'mediadesk_edge_action_before_page_header', 'mediadesk_edge_get_search' );
}

if ( ! function_exists( 'mediadesk_edge_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function mediadesk_edge_load_search_template() {
		mediadesk_edge_get_module_template_part( 'templates/types/fullscreen', 'search' );
	}
}