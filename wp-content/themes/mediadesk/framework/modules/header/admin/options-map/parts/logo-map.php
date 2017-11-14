<?php

if ( ! function_exists( 'mediadesk_edge_logo_options_map' ) ) {
	function mediadesk_edge_logo_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'mediadesk' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'mediadesk' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#edgtf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_logo_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'mediadesk' ),
				'parent'        => $hide_logo_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'mediadesk' ),
				'parent'        => $hide_logo_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'mediadesk' ),
				'parent'        => $hide_logo_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'mediadesk' ),
				'parent'        => $hide_logo_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => EDGE_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'mediadesk' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_logo_options_map', 2 );
}