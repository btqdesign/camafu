<?php

if ( ! function_exists( 'mediadesk_edge_get_title_types_meta_boxes' ) ) {
	function mediadesk_edge_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'mediadesk_edge_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'mediadesk' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'mediadesk_edge_map_title_meta' ) ) {
	function mediadesk_edge_map_title_meta() {
		$title_type_meta_boxes = mediadesk_edge_get_title_types_meta_boxes();
		
		$title_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'mediadesk_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'mediadesk' ),
				'name'  => 'title_meta'
			)
		);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mediadesk' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'mediadesk' ),
				'parent'        => $title_meta_box,
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#edgtf_edgtf_show_title_area_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#edgtf_edgtf_show_title_area_meta_container',
						'no'  => '',
						'yes' => '#edgtf_edgtf_show_title_area_meta_container'
					)
				)
			)
		);
		
			$show_title_area_meta_container = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'edgtf_show_title_area_meta_container',
					'hidden_property' => 'edgtf_show_title_area_meta',
					'hidden_value'    => 'no'
				)
			);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'mediadesk' ),
						'description'   => esc_html__( 'Choose title type', 'mediadesk' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'mediadesk' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'mediadesk' ),
						'options'       => mediadesk_edge_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'mediadesk' ),
						'description' => esc_html__( 'Set a height for Title Area', 'mediadesk' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose a background color for title area', 'mediadesk' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'mediadesk' ),
						'description' => esc_html__( 'Choose an Image for title area', 'mediadesk' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'mediadesk' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'mediadesk' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'mediadesk' ),
							'hide'                => esc_html__( 'Hide Image', 'mediadesk' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'mediadesk' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'mediadesk' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'mediadesk' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'mediadesk' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'mediadesk' )
						)
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'mediadesk' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'mediadesk' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'mediadesk' ),
							'header_bottom' => esc_html__( 'From Bottom of Header', 'mediadesk' ),
							'window_top'    => esc_html__( 'From Window Top', 'mediadesk' ),
							'bottom'        => esc_html__( 'Bottom Of Title Area', 'mediadesk' )
						)
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'mediadesk' ),
						'options'       => mediadesk_edge_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose a color for title text', 'mediadesk' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'mediadesk' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'mediadesk' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'mediadesk' ),
						'options'       => mediadesk_edge_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'mediadesk' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'mediadesk_edge_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_title_meta', 60 );
}