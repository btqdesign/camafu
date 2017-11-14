<?php

if ( ! function_exists( 'mediadesk_edge_sidebar_options_map' ) ) {
	function mediadesk_edge_sidebar_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'mediadesk' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'mediadesk' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		mediadesk_edge_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'mediadesk' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'mediadesk' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
				'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
				'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
			)
		) );
		
		$mediadesk_custom_sidebars = mediadesk_edge_get_custom_sidebars();
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'mediadesk' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'mediadesk' ),
				'parent'      => $sidebar_panel,
				'options'     => $mediadesk_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_sidebar_options_map', 9 );
}