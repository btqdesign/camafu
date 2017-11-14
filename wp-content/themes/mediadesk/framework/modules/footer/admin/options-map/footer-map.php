<?php

if ( ! function_exists( 'mediadesk_edge_footer_options_map' ) ) {
	function mediadesk_edge_footer_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'mediadesk' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);
		
		$footer_panel = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'mediadesk' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'mediadesk' ),
				'parent'        => $footer_panel,
			)
		);

		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'uncovering_footer',
				'default_value' => 'no',
				'label'         => esc_html__( 'Uncovering Footer', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'mediadesk' ),
				'parent'        => $footer_panel,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'mediadesk' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'mediadesk' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'mediadesk' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'mediadesk' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'mediadesk' ),
					'left'   => esc_html__( 'Left', 'mediadesk' ),
					'center' => esc_html__( 'Center', 'mediadesk' ),
					'right'  => esc_html__( 'Right', 'mediadesk' )
				),
				'parent'        => $show_footer_top_container,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Set background color for top footer area', 'mediadesk' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_bottom_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'mediadesk' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'mediadesk' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'mediadesk' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_footer_options_map', 11 );
}