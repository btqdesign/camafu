<?php

if ( ! function_exists( 'mediadesk_edge_fullscreen_options_map' ) ) {
	function mediadesk_edge_fullscreen_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_fullscreen_page',
				'title' => esc_html__( 'Fullscreen Side Area', 'mediadesk' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Fullscreen Side Area', 'mediadesk' ),
				'name'  => 'fullscreen',
				'page'  => '_fullscreen_page'
			)
		);

		$side_area_icon_style_group = mediadesk_edge_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'fullscreen_icon_style_group',
				'title'       => esc_html__( 'Fullscreen Side Area Icon Style', 'mediadesk' ),
				'description' => esc_html__( 'Define styles for Fullscreen Side Area icon', 'mediadesk' )
			)
		);
		
		$side_area_icon_style_row1 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_icon_color',
				'label'  => esc_html__( 'Color', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'mediadesk' )
			)
		);
		
		$side_area_icon_style_row2 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'fullscreen_icon_style_row2',
				'next'   => true
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'mediadesk' )
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'fullscreen_background_color',
				'label'       => esc_html__( 'Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose a background color for Fullscreen Side Area', 'mediadesk' )
			)
		);

		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $side_area_panel,
				'name'   => 'fullscreen_left',
				'title'  => esc_html__( 'Fullscreen Side Area Left Side', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'fullscreen_post',
				'default_value' => '',
				'label'         => esc_html__( 'Select Post', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a post to display on the left side of Fullscreen Side Area', 'mediadesk' ),
				'options'       => mediadesk_edge_get_posts_list(),
				'args'        => array(
					'select2' => true
				)
			)
		);

		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $side_area_panel,
				'name'   => 'fullscreen_right',
				'title'  => esc_html__( 'Fullscreen Side Area Right Side', 'mediadesk' )
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'fullscreen_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'mediadesk' ),
				'description' => esc_html__( 'Enter title that will be displayed in the right side of Fullscreen Side Area', 'mediadesk' ),
				'parent'      => $side_area_panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'select',
				'name'        => 'fullscreen_title_tag',
				'default_value' => 'h3',
				'label'       => esc_html__( 'Title', 'mediadesk' ),
				'description' => esc_html__( 'Enter title that will be displayed in the right side of Fullscreen Side Area', 'mediadesk' ),
				'options'     => mediadesk_edge_get_title_tag(),
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'fullscreen_nav_1',
				'default_value' => '',
				'label'         => esc_html__( 'Select First Navigation', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a first navigation to display in the right side of Fullscreen Side Area', 'mediadesk' ),
				'options'       => mediadesk_edge_get_menus_list(),
				'args'        => array(
					'select2' => true
				)
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'fullscreen_nav_2',
				'default_value' => '',
				'label'         => esc_html__( 'Select Second Navigation', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a second navigation to display in the right side of Fullscreen Side Area', 'mediadesk' ),
				'options'       => mediadesk_edge_get_menus_list(),
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_fullscreen_options_map', 16 );
}