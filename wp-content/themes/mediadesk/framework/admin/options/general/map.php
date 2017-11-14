<?php

if ( ! function_exists( 'mediadesk_edge_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function mediadesk_edge_general_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'mediadesk' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'mediadesk' ),
				'parent'        => $panel_design_style
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'mediadesk' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = mediadesk_edge_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediadesk' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediadesk' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediadesk' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediadesk' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediadesk' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediadesk' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediadesk' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediadesk' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediadesk' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediadesk' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'mediadesk' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'mediadesk' ),
					'100italic' => esc_html__( '100 Thin Italic', 'mediadesk' ),
					'200'       => esc_html__( '200 Extra-Light', 'mediadesk' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'mediadesk' ),
					'300'       => esc_html__( '300 Light', 'mediadesk' ),
					'300italic' => esc_html__( '300 Light Italic', 'mediadesk' ),
					'400'       => esc_html__( '400 Regular', 'mediadesk' ),
					'400italic' => esc_html__( '400 Regular Italic', 'mediadesk' ),
					'500'       => esc_html__( '500 Medium', 'mediadesk' ),
					'500italic' => esc_html__( '500 Medium Italic', 'mediadesk' ),
					'600'       => esc_html__( '600 Semi-Bold', 'mediadesk' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'mediadesk' ),
					'700'       => esc_html__( '700 Bold', 'mediadesk' ),
					'700italic' => esc_html__( '700 Bold Italic', 'mediadesk' ),
					'800'       => esc_html__( '800 Extra-Bold', 'mediadesk' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'mediadesk' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'mediadesk' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'mediadesk' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'mediadesk' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'mediadesk' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'mediadesk' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'mediadesk' ),
					'greek'        => esc_html__( 'Greek', 'mediadesk' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'mediadesk' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'mediadesk' ),
				'parent'      => $panel_design_style
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'mediadesk' ),
				'parent'      => $panel_design_style
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'mediadesk' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'mediadesk' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'mediadesk' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_boxed_container"
				)
			)
		);
		
			$boxed_container = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'hidden_property' => 'boxed',
					'hidden_value'    => 'no'
				)
			);
		
				mediadesk_edge_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'mediadesk' ),
						'parent'      => $boxed_container
					)
				);
				
				mediadesk_edge_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'mediadesk' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'mediadesk' ),
						'parent'      => $boxed_container
					)
				);
				
				mediadesk_edge_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'mediadesk' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'mediadesk' ),
						'parent'      => $boxed_container
					)
				);
				
				mediadesk_edge_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'mediadesk' ),
						'description'   => esc_html__( 'Choose background image attachment', 'mediadesk' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'mediadesk' ),
							'fixed'  => esc_html__( 'Fixed', 'mediadesk' ),
							'scroll' => esc_html__( 'Scroll', 'mediadesk' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'mediadesk' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_paspartu_container"
				)
			)
		);
		
			$paspartu_container = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'hidden_property' => 'paspartu',
					'hidden_value'    => 'no'
				)
			);
		
				mediadesk_edge_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'mediadesk' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'mediadesk' ),
						'parent'      => $paspartu_container
					)
				);
				
				mediadesk_edge_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'mediadesk' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'mediadesk' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				mediadesk_edge_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'mediadesk' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => 'edgtf-grid-1400',
				'label'         => esc_html__( 'Initial Width of Content', 'mediadesk' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'mediadesk' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'edgtf-grid-1400' => esc_html__( '1400px - default', 'mediadesk' ),
					'edgtf-grid-1300' => esc_html__( '1300px', 'mediadesk' ),
					'edgtf-grid-1200' => esc_html__( '1200px', 'mediadesk' ),
					'edgtf-grid-1100' => esc_html__( '1100px', 'mediadesk' ),
					'edgtf-grid-1000' => esc_html__( '1000px', 'mediadesk' ),
					'edgtf-grid-800'  => esc_html__( '800px', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'mediadesk' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'mediadesk' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'mediadesk' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'mediadesk' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'mediadesk' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_page_transitions_container"
				)
			)
		);
		
			$page_transitions_container = mediadesk_edge_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'hidden_property' => 'smooth_page_transitions',
					'hidden_value'    => 'no'
				)
			);
		
				mediadesk_edge_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'mediadesk' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'mediadesk' ),
						'parent'        => $page_transitions_container,
						'args'          => array(
							"dependence"             => true,
							"dependence_hide_on_yes" => "",
							"dependence_show_on_yes" => "#edgtf_page_transition_preloader_container"
						)
					)
				);
				
				$page_transition_preloader_container = mediadesk_edge_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'hidden_property' => 'page_transition_preloader',
						'hidden_value'    => 'no'
					)
				);
		
		
					mediadesk_edge_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'mediadesk' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = mediadesk_edge_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'mediadesk' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'mediadesk' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = mediadesk_edge_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					mediadesk_edge_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'mediadesk' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
					
					mediadesk_edge_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'mediadesk' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					mediadesk_edge_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'mediadesk' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'mediadesk' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'mediadesk' ),
				'parent'        => $panel_settings
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'mediadesk' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'mediadesk' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'mediadesk' ),
				'parent'      => $panel_custom_code
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'mediadesk' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'mediadesk' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'mediadesk' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'mediadesk' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_general_options_map', 1 );
}

if ( ! function_exists( 'mediadesk_edge_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function mediadesk_edge_page_general_style( $style ) {
		$current_style = '';
		$page_id       = mediadesk_edge_get_page_id();
		$class_prefix  = mediadesk_edge_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = mediadesk_edge_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = mediadesk_edge_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = mediadesk_edge_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = mediadesk_edge_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.edgtf-boxed .edgtf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= mediadesk_edge_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style = array();
		
		$paspartu_color = mediadesk_edge_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = mediadesk_edge_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( mediadesk_edge_string_ends_with( $paspartu_width, '%' ) || mediadesk_edge_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.edgtf-paspartu-enabled .edgtf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= mediadesk_edge_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediadesk_edge_filter_add_page_custom_style', 'mediadesk_edge_page_general_style' );
}