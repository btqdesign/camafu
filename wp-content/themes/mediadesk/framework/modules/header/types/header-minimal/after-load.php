<?php

if ( ! function_exists( 'mediadesk_edge_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function mediadesk_edge_header_minimal_full_screen_menu_body_class( $classes ) {
		$classes[] = 'edgtf-' . mediadesk_edge_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		
		return $classes;
	}
	
	if ( mediadesk_edge_check_is_header_type_enabled( 'header-minimal', mediadesk_edge_get_page_id() ) ) {
		add_filter( 'body_class', 'mediadesk_edge_header_minimal_full_screen_menu_body_class' );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function mediadesk_edge_get_header_minimal_full_screen_menu() {
		$parameters = array(
			'fullscreen_menu_in_grid' => mediadesk_edge_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
		);
		
		mediadesk_edge_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
	}
	
	if ( mediadesk_edge_check_is_header_type_enabled( 'header-minimal', mediadesk_edge_get_page_id() ) ) {
		add_action( 'mediadesk_edge_action_after_header_area', 'mediadesk_edge_get_header_minimal_full_screen_menu', 10 );
	}
}