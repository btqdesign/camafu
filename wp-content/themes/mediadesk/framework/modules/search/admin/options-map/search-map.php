<?php

if ( ! function_exists( 'mediadesk_edge_search_options_map' ) ) {
	function mediadesk_edge_search_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'mediadesk' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'mediadesk' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		mediadesk_edge_add_admin_field( array(
			'name'          => 'search_page_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Layout', 'mediadesk' ),
			'default_value' => 'in-grid',
			'description'   => esc_html__( 'Set layout. Default is in grid.', 'mediadesk' ),
			'parent'        => $search_page_panel,
			'options'       => array(
				'in-grid'    => esc_html__( 'In Grid', 'mediadesk' ),
				'full-width' => esc_html__( 'Full Width', 'mediadesk' )
			)
		) );
		
		mediadesk_edge_add_admin_field( array(
			'name'          => 'search_page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'mediadesk' ),
			'description'   => esc_html__( "Choose a sidebar layout for search page", 'mediadesk' ),
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
				'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
				'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
			),
			'parent'        => $search_page_panel
		) );
		
		$mediadesk_custom_sidebars = mediadesk_edge_get_custom_sidebars();
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_admin_field( array(
				'name'        => 'search_custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'mediadesk' ),
				'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'mediadesk' ),
				'parent'      => $search_page_panel,
				'options'     => $mediadesk_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
		
		$search_panel = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'mediadesk' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'fullscreen',
				'label'         => esc_html__( 'Select Search Type', 'mediadesk' ),
				'description'   => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'mediadesk' ),
				'options'       => array(
					'fullscreen'               => esc_html__( 'Fullscreen Search', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'mediadesk' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'mediadesk' ),
				'options'       => mediadesk_edge_icon_collections()->getIconCollectionsExclude( array( 'linea_icons' ) )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'mediadesk' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'mediadesk' ),
			)
		);
		
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'mediadesk' ),
				'description'   => esc_html__( 'Set size for icon', 'mediadesk' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = mediadesk_edge_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'mediadesk' ),
				'description' => esc_html__( 'Define color style for icon', 'mediadesk' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = mediadesk_edge_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'mediadesk' )
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_search_options_map', 16 );
}