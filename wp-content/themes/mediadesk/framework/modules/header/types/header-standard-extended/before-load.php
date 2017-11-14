<?php

if ( ! function_exists( 'mediadesk_edge_set_header_standard_extended_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function mediadesk_edge_set_header_standard_extended_type_global_option( $header_types ) {
		$header_types['header-standard-extended'] = array(
			'image' => EDGE_FRAMEWORK_HEADER_TYPES_ROOT . '/header-standard-extended/assets/img/header-standard-extended.png',
			'label' => esc_html__( 'Standard Extended', 'mediadesk' )
		);
		
		return $header_types;
	}
	
	add_filter( 'mediadesk_edge_filter_header_type_global_option', 'mediadesk_edge_set_header_standard_extended_type_global_option' );
}

if ( ! function_exists( 'mediadesk_edge_set_header_standard_extended_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function mediadesk_edge_set_header_standard_extended_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-standard-extended'] = esc_html__( 'Standard Extended', 'mediadesk' );
		
		return $header_type_options;
	}
	
	add_filter( 'mediadesk_edge_filter_header_type_meta_boxes', 'mediadesk_edge_set_header_standard_extended_type_meta_boxes_option' );
}

if ( ! function_exists( 'mediadesk_edge_set_show_dep_options_for_header_standard_extended' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function mediadesk_edge_set_show_dep_options_for_header_standard_extended( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#edgtf_header_behaviour';
		$show_containers[] = '#edgtf_menu_area_container';
		$show_containers[] = '#edgtf_logo_area_container';
		$show_containers[] = '#edgtf_panel_main_menu';
		$show_containers[] = '#edgtf_panel_sticky_header';
		$show_containers[] = '#edgtf_panel_fixed_header';
		
		$show_containers = apply_filters( 'mediadesk_edge_filter_show_dep_options_for_header_standard_extended', $show_containers );
		
		$show_dep_options['header-standard-extended'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'mediadesk_edge_filter_header_type_show_global_option', 'mediadesk_edge_set_show_dep_options_for_header_standard_extended' );
}

if ( ! function_exists( 'mediadesk_edge_set_hide_dep_options_for_header_standard_extended' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function mediadesk_edge_set_hide_dep_options_for_header_standard_extended( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#edgtf_panel_fullscreen_menu';
		
		$hide_containers = apply_filters( 'mediadesk_edge_filter_hide_dep_options_for_header_standard_extended', $hide_containers );
		
		$hide_dep_options['header-standard-extended'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'mediadesk_edge_filter_header_type_hide_global_option', 'mediadesk_edge_set_hide_dep_options_for_header_standard_extended' );
}

if ( ! function_exists( 'mediadesk_edge_set_show_dep_options_for_header_standard_extended_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function mediadesk_edge_set_show_dep_options_for_header_standard_extended_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#edgtf_logo_area_container';
		$show_containers[] = '#edgtf_menu_area_container';
		
		$show_containers = apply_filters( 'mediadesk_edge_filter_show_dep_options_for_header_standard_extended_meta_boxes', $show_containers );
		
		$show_dep_options['header-standard-extended'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'mediadesk_edge_filter_header_type_show_meta_boxes', 'mediadesk_edge_set_show_dep_options_for_header_standard_extended_meta_boxes' );
}

if ( ! function_exists( 'mediadesk_edge_set_hide_dep_options_for_header_standard_extended_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function mediadesk_edge_set_hide_dep_options_for_header_standard_extended_meta_boxes( $hide_dep_options ) {
		$hide_containers = apply_filters( 'mediadesk_edge_filter_hide_dep_options_for_header_standard_extended_meta_boxes', $hide_containers = array() );
		
		$hide_dep_options['header-standard-extended'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'mediadesk_edge_filter_header_type_hide_meta_boxes', 'mediadesk_edge_set_hide_dep_options_for_header_standard_extended_meta_boxes' );
}

if ( ! function_exists( 'mediadesk_edge_set_hide_dep_options_header_standard_extended' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function mediadesk_edge_set_hide_dep_options_header_standard_extended( $hide_dep_options ) {
		$hide_dep_options[] = 'header-standard-extended';
		
		return $hide_dep_options;
	}
	
	// header types panel options
	add_filter( 'mediadesk_edge_filter_full_screen_menu_hide_global_option', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	add_filter( 'mediadesk_edge_filter_header_centered_hide_global_option', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	add_filter( 'mediadesk_edge_filter_header_standard_hide_global_option', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	add_filter( 'mediadesk_edge_filter_header_vertical_hide_global_option', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	add_filter( 'mediadesk_edge_filter_header_vertical_menu_hide_global_option', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	
	// header types panel meta boxes
	add_filter( 'mediadesk_edge_filter_header_centered_hide_meta_boxes', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	add_filter( 'mediadesk_edge_filter_header_standard_hide_meta_boxes', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
	add_filter( 'mediadesk_edge_filter_header_vertical_hide_meta_boxes', 'mediadesk_edge_set_hide_dep_options_header_standard_extended' );
}