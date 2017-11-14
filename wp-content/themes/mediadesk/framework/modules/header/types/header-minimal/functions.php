<?php

if ( ! function_exists( 'mediadesk_edge_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mediadesk_edge_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'MediaDeskNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mediadesk_edge_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mediadesk_edge_init_register_header_minimal_type() {
		add_filter( 'mediadesk_edge_filter_register_header_type_class', 'mediadesk_edge_register_header_minimal_type' );
	}
	
	add_action( 'mediadesk_edge_action_before_header_function_init', 'mediadesk_edge_init_register_header_minimal_type' );
}

if ( ! function_exists( 'mediadesk_edge_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function mediadesk_edge_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'mediadesk' );
		
		return $menus;
	}
	
	if ( mediadesk_edge_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'mediadesk_edge_filter_register_headers_menu', 'mediadesk_edge_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'mediadesk_edge_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function mediadesk_edge_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'mediadesk' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'mediadesk' ),
				'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'mediadesk' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'mediadesk' ),
				'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="edgtf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( mediadesk_edge_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'mediadesk_edge_register_header_minimal_full_screen_menu_widgets' );
	}
}