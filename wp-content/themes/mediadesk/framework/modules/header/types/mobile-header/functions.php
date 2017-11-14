<?php

if ( ! function_exists( 'mediadesk_edge_include_mobile_header_menu' ) ) {
	function mediadesk_edge_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'mediadesk' );
		
		return $menus;
	}
	
	add_filter( 'mediadesk_edge_filter_register_headers_menu', 'mediadesk_edge_include_mobile_header_menu' );
}

if ( ! function_exists( 'mediadesk_edge_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function mediadesk_edge_register_mobile_header_areas() {
		if ( mediadesk_edge_is_responsive_on() ) {
			register_sidebar(
				array(
					'id'            => 'edgtf-right-from-mobile-logo',
					'name'          => esc_html__( 'Mobile Header Widget Area', 'mediadesk' ),
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'mediadesk' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'mediadesk_edge_register_mobile_header_areas' );
}

if ( ! function_exists( 'mediadesk_edge_mobile_header_class' ) ) {
	function mediadesk_edge_mobile_header_class( $classes ) {
		$classes[] = 'edgtf-default-mobile-header';
		
		$classes[] = 'edgtf-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_mobile_header_class' );
}

if ( ! function_exists( 'mediadesk_edge_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function mediadesk_edge_get_mobile_header( $slug = '', $module = '' ) {
		if ( mediadesk_edge_is_responsive_on() ) {
			$mobile_menu_title = mediadesk_edge_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title
			);
			
			$module = ! empty( $module ) ? $module : 'header/types/mobile-header';
			
			mediadesk_edge_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'mediadesk_edge_action_after_page_header', 'mediadesk_edge_get_mobile_header' );
}

if ( ! function_exists( 'mediadesk_edge_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function mediadesk_edge_get_mobile_logo() {
		$show_logo_image = mediadesk_edge_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = mediadesk_edge_get_meta_field_intersect( 'logo_image_mobile', mediadesk_edge_get_page_id() );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : mediadesk_edge_get_meta_field_intersect( 'logo_image', mediadesk_edge_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = mediadesk_edge_get_image_dimensions( $logo_image );
			
			$logo_height = '';
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_height'     => $logo_height,
				'logo_styles'     => $logo_styles
			);
			
			mediadesk_edge_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function mediadesk_edge_get_mobile_nav() {
		mediadesk_edge_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}