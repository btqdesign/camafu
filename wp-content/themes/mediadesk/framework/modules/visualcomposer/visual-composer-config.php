<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'mediadesk_edge_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function mediadesk_edge_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'mediadesk_edge_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'mediadesk_edge_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function mediadesk_edge_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'mediadesk' ),
				'value'      => array(
					esc_html__( 'Full Width', 'mediadesk' ) => 'full-width',
					esc_html__( 'In Grid', 'mediadesk' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Edge Anchor ID', 'mediadesk' ),
				'description' => esc_html__( 'For example "home"', 'mediadesk' ),
				'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'mediadesk' ),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'mediadesk' ),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'mediadesk' ),
				'value'       => array(
					esc_html__( 'Never', 'mediadesk' )        => '',
					esc_html__( 'Below 1280px', 'mediadesk' ) => '1280',
					esc_html__( 'Below 1024px', 'mediadesk' ) => '1024',
					esc_html__( 'Below 768px', 'mediadesk' )  => '768',
					esc_html__( 'Below 680px', 'mediadesk' )  => '680',
					esc_html__( 'Below 480px', 'mediadesk' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'mediadesk' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Edge Parallax Background Image', 'mediadesk' ),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Edge Parallax Speed', 'mediadesk' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'mediadesk' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Edge Parallax Section Height (px)', 'mediadesk' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'mediadesk' ),
				'value'      => array(
					esc_html__( 'Default', 'mediadesk' ) => '',
					esc_html__( 'Left', 'mediadesk' )    => 'left',
					esc_html__( 'Center', 'mediadesk' )  => 'center',
					esc_html__( 'Right', 'mediadesk' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Edge Row Content Width', 'mediadesk' ),
				'value'      => array(
					esc_html__( 'Full Width', 'mediadesk' ) => 'full-width',
					esc_html__( 'In Grid', 'mediadesk' )    => 'grid'
				),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Edge Background Color', 'mediadesk' ),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Edge Background Image', 'mediadesk' ),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Edge Disable Background Image', 'mediadesk' ),
				'value'       => array(
					esc_html__( 'Never', 'mediadesk' )        => '',
					esc_html__( 'Below 1280px', 'mediadesk' ) => '1280',
					esc_html__( 'Below 1024px', 'mediadesk' ) => '1024',
					esc_html__( 'Below 768px', 'mediadesk' )  => '768',
					esc_html__( 'Below 680px', 'mediadesk' )  => '680',
					esc_html__( 'Below 480px', 'mediadesk' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'mediadesk' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Edge Content Aligment', 'mediadesk' ),
				'value'      => array(
					esc_html__( 'Default', 'mediadesk' ) => '',
					esc_html__( 'Left', 'mediadesk' )    => 'left',
					esc_html__( 'Center', 'mediadesk' )  => 'center',
					esc_html__( 'Right', 'mediadesk' )   => 'right'
				),
				'group'      => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( mediadesk_edge_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Edge Enable Passepartout', 'mediadesk' ),
					'value'       => array_flip( mediadesk_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Edge Passepartout Size', 'mediadesk' ),
					'value'       => array(
						esc_html__( 'Tiny', 'mediadesk' )   => 'tiny',
						esc_html__( 'Small', 'mediadesk' )  => 'small',
						esc_html__( 'Normal', 'mediadesk' ) => 'normal',
						esc_html__( 'Large', 'mediadesk' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Edge Disable Side Passepartout', 'mediadesk' ),
					'value'       => array_flip( mediadesk_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Edge Disable Top Passepartout', 'mediadesk' ),
					'value'       => array_flip( mediadesk_edge_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
		
		/******* VC Widgetised Sidebar shortcode - begin *******/
		
		vc_add_param( 'vc_widget_sidebar',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'layout',
				'heading'     => esc_html__( 'Layout', 'mediadesk' ),
				'value'       => array(
					esc_html__( 'Default', 'mediadesk' ) => '',
					esc_html__( 'Boxed', 'mediadesk' )   => 'boxed'
				),
				'save_always' => true,
				'group'       => esc_html__( 'Edge Settings', 'mediadesk' )
			)
		);
		
		/******* VC Widgetised Sidebar shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'mediadesk_edge_vc_row_map' );
}