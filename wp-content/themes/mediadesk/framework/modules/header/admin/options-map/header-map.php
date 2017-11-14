<?php

if ( ! function_exists( 'mediadesk_edge_header_options_map' ) ) {
	function mediadesk_edge_get_header_types_options() {
		$header_type_options = apply_filters( 'mediadesk_edge_filter_header_type_global_option', $header_type_options = array() );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_get_header_type_default_options' ) ) {
	function mediadesk_edge_get_header_type_default_options() {
		$header_type_option = apply_filters( 'mediadesk_edge_filter_default_header_type_global_option', $header_type_option = '' );
		
		return $header_type_option;
	}
}

if ( ! function_exists( 'mediadesk_edge_get_show_dep_for_header_types_options' ) ) {
	function mediadesk_edge_get_show_dep_for_header_types_options() {
		$show_dep_options = apply_filters( 'mediadesk_edge_filter_header_type_show_global_option', $show_dep_options = array() );
		
		return $show_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_types_options' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_types_options() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_type_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_get_hide_dep_for_header_behavior_options' ) ) {
	function mediadesk_edge_get_hide_dep_for_header_behavior_options() {
		$hide_dep_options = apply_filters( 'mediadesk_edge_filter_header_behavior_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_HEADER_ROOT_DIR . '/admin/options-map/*/*.php' ) as $options_load ) {
	include_once $options_load;
}

foreach ( glob( EDGE_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/options-map/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'mediadesk_edge_header_options_map' ) ) {
	function mediadesk_edge_header_options_map() {
		$header_type_options              = mediadesk_edge_get_header_types_options();
		$header_type_default_option       = mediadesk_edge_get_header_type_default_options();
		$header_type_options_show_dep     = mediadesk_edge_get_show_dep_for_header_types_options();
		$header_type_options_hide_dep     = mediadesk_edge_get_hide_dep_for_header_types_options();
		$header_behavior_options_hide_dep = mediadesk_edge_get_hide_dep_for_header_behavior_options();
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_header_page',
				'title' => esc_html__( 'Header', 'mediadesk' ),
				'icon'  => 'fa fa-header'
			)
		);
		
		$panel_header = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header',
				'title' => esc_html__( 'Header', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'radiogroup',
				'name'          => 'header_type',
				'default_value' => $header_type_default_option,
				'label'         => esc_html__( 'Choose Header Type', 'mediadesk' ),
				'description'   => esc_html__( 'Select the type of header you would like to use', 'mediadesk' ),
				'options'       => $header_type_options,
				'args'          => array(
					'use_images'  => true,
					'hide_labels' => true,
					'dependence'  => true,
					'show'        => $header_type_options_show_dep,
					'hide'        => $header_type_options_hide_dep
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'          => $panel_header,
				'type'            => 'select',
				'name'            => 'header_behaviour',
				'default_value'   => 'fixed-on-scroll',
				'label'           => esc_html__( 'Choose Header Behaviour', 'mediadesk' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'mediadesk' ),
				'options'         => array(
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'mediadesk' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'mediadesk' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'mediadesk' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'mediadesk' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $header_behavior_options_hide_dep,
				'args'            => array(
					'dependence'   => true,
					'show'         => array(
						'fixed-on-scroll'                 => '#edgtf_panel_fixed_header',
						'no-behavior'                     => '',
						'sticky-header-on-scroll-up'      => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header'
					),
					'hide'         => array(
						'fixed-on-scroll'                 => '#edgtf_panel_sticky_header',
						'no-behavior'                     => '#edgtf_panel_sticky_header, #edgtf_panel_fixed_header',
						'sticky-header-on-scroll-up'      => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header'
					)
				)
			)
		);
		
		/***************** Header Skin Options -start ********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a predefined header style for header elements (logo, main menu, side menu opener...)', 'mediadesk' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'mediadesk' ),
					'light-header' => esc_html__( 'Light', 'mediadesk' ),
					'dark-header'  => esc_html__( 'Dark', 'mediadesk' )
				)
			)
		);
		
		/***************** Header Skin Options - end ********************/
		
		/***************** Top Header Layout - start **********************/
		
		do_action( 'mediadesk_edge_action_header_top_options_map', $panel_header );
		
		/***************** Top Header Layout - end **********************/
		
		/***************** Logo Area Layout - start **********************/
		
		do_action( 'mediadesk_edge_action_header_logo_area_options_map', $panel_header );
		
		/***************** Logo Area Layout - end **********************/
		
		/***************** Menu Area Layout - start **********************/
		
		do_action( 'mediadesk_edge_action_header_menu_area_options_map', $panel_header );
		
		/***************** Menu Area Layout - end **********************/
		
		/***************** Additional Header Menu Area Layout - start *****************/
		
		do_action( 'mediadesk_edge_action_additional_header_menu_area_options_map', $panel_header );
		
		/***************** Additional Header Menu Area Layout - end *****************/
		
		/***************** Sticky Header Layout - start *******************/
		
		do_action( 'mediadesk_edge_action_header_sticky_options_map', $panel_header );
		
		/***************** Sticky Header Layout - end *******************/
		
		/***************** Fixed Header Layout - start ********************/
		
		do_action( 'mediadesk_edge_action_header_fixed_options_map', $panel_header );
		
		/***************** Fixed Header Layout - end ********************/
		
		/******************* Main Menu Layout - start *********************/
		
		do_action( 'mediadesk_edge_action_header_main_navigation_options_map' );
		
		/******************* Main Menu Layout - end *********************/
		
		/***************** Additional Main Menu Area Layout - start *****************/
		
		do_action( 'mediadesk_edge_action_additional_header_main_navigation_options_map' );
		
		/***************** Additional Main Menu Area Layout - end *****************/
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_header_options_map', 4 );
}