<?php

if ( ! function_exists( 'mediadesk_edge_map_general_meta' ) ) {
	function mediadesk_edge_map_general_meta() {
		
		$general_meta_box = mediadesk_edge_add_meta_box(
			array(
				'scope' => apply_filters( 'mediadesk_edge_filter_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'mediadesk' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'mediadesk' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'mediadesk' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'mediadesk' ),
				'parent'        => $general_meta_box
			)
		);
		
		$edgtf_content_padding_group = mediadesk_edge_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'mediadesk' ),
				'description' => esc_html__( 'Define styles for Content area', 'mediadesk' ),
				'parent'      => $general_meta_box
			)
		);
		
			$edgtf_content_padding_row = mediadesk_edge_add_admin_row(
				array(
					'name'   => 'edgtf_content_padding_row',
					'next'   => true,
					'parent' => $edgtf_content_padding_group
				)
			);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'   => 'edgtf_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'mediadesk' ),
						'parent' => $edgtf_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'    => 'edgtf_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'mediadesk' ),
						'parent'  => $edgtf_content_padding_row,
						'options' => mediadesk_edge_get_yes_no_select_array( false )
					)
				);
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose background color for page content', 'mediadesk' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'    => 'edgtf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'mediadesk' ),
				'parent'  => $general_meta_box,
				'options' => mediadesk_edge_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_boxed_container_meta',
						'no'  => '#edgtf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_boxed_container_meta'
					)
				)
			)
		);
		
			$boxed_container_meta = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'hidden_property' => 'edgtf_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'mediadesk' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'mediadesk' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'mediadesk' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'mediadesk' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'mediadesk' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'          => 'edgtf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'mediadesk' ),
						'description'   => esc_html__( 'Choose background image attachment', 'mediadesk' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'mediadesk' ),
							'fixed'  => esc_html__( 'Fixed', 'mediadesk' ),
							'scroll' => esc_html__( 'Scroll', 'mediadesk' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'mediadesk' ),
				'parent'        => $general_meta_box,
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'    => array(
					'dependence'    => true,
					'hide'          => array(
						''    => '#edgtf_edgtf_paspartu_container_meta',
						'no'  => '#edgtf_edgtf_paspartu_container_meta',
						'yes' => ''
					),
					'show'          => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_edgtf_paspartu_container_meta'
					)
				)
			)
		);
		
			$paspartu_container_meta = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'edgtf_paspartu_container_meta',
					'hidden_property' => 'edgtf_paspartu_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'mediadesk' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'mediadesk' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'mediadesk' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				mediadesk_edge_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'edgtf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'mediadesk' ),
						'options'       => mediadesk_edge_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'mediadesk' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'mediadesk' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'mediadesk' ),
					'edgtf-grid-1400' => esc_html__( '1400px', 'mediadesk' ),
					'edgtf-grid-1300' => esc_html__( '1300px', 'mediadesk' ),
					'edgtf-grid-1200' => esc_html__( '1200px', 'mediadesk' ),
					'edgtf-grid-1100' => esc_html__( '1100px', 'mediadesk' ),
					'edgtf-grid-1000' => esc_html__( '1000px', 'mediadesk' ),
					'edgtf-grid-800'  => esc_html__( '800px', 'mediadesk' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'          => 'edgtf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'mediadesk' ),
				'parent'        => $general_meta_box,
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#edgtf_page_transitions_container_meta',
						'no'  => '#edgtf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#edgtf_page_transitions_container_meta'
					)
				)
			)
		);
		
			$page_transitions_container_meta = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'edgtf_smooth_page_transitions_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				mediadesk_edge_add_meta_box_field(
					array(
						'name'        => 'edgtf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'mediadesk' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'mediadesk' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => mediadesk_edge_get_yes_no_select_array(),
						'args'        => array(
							'dependence' => true,
							'hide'       => array(
								''    => '#edgtf_page_transition_preloader_container_meta',
								'no'  => '#edgtf_page_transition_preloader_container_meta',
								'yes' => ''
							),
							'show'       => array(
								''    => '',
								'no'  => '',
								'yes' => '#edgtf_page_transition_preloader_container_meta'
							)
						)
					)
				);
				
				$page_transition_preloader_container_meta = mediadesk_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'hidden_property' => 'edgtf_page_transition_preloader_meta',
						'hidden_values'   => array(
							'',
							'no'
						)
					)
				);
				
					mediadesk_edge_add_meta_box_field(
						array(
							'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'mediadesk' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = mediadesk_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'mediadesk' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'mediadesk' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = mediadesk_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					mediadesk_edge_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'edgtf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'mediadesk' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'mediadesk' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'mediadesk' ),
								'pulse'                 => esc_html__( 'Pulse', 'mediadesk' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'mediadesk' ),
								'cube'                  => esc_html__( 'Cube', 'mediadesk' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'mediadesk' ),
								'stripes'               => esc_html__( 'Stripes', 'mediadesk' ),
								'wave'                  => esc_html__( 'Wave', 'mediadesk' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'mediadesk' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'mediadesk' ),
								'atom'                  => esc_html__( 'Atom', 'mediadesk' ),
								'clock'                 => esc_html__( 'Clock', 'mediadesk' ),
								'mitosis'               => esc_html__( 'Mitosis', 'mediadesk' ),
								'lines'                 => esc_html__( 'Lines', 'mediadesk' ),
								'fussion'               => esc_html__( 'Fussion', 'mediadesk' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'mediadesk' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'mediadesk' )
							)
						)
					);
					
					mediadesk_edge_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'edgtf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'mediadesk' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					mediadesk_edge_add_meta_box_field(
						array(
							'name'        => 'edgtf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'mediadesk' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'mediadesk' ),
							'options'     => mediadesk_edge_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		mediadesk_edge_add_meta_box_field(
			array(
				'name'        => 'edgtf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'mediadesk' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'mediadesk' ),
				'parent'      => $general_meta_box,
				'options'     => mediadesk_edge_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'mediadesk_edge_action_meta_boxes_map', 'mediadesk_edge_map_general_meta', 10 );
}