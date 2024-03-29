<?php

if ( ! function_exists( 'mediadesk_edge_mobile_header_options_map' ) ) {
	function mediadesk_edge_mobile_header_options_map() {
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_mobile_header',
				'title' => esc_html__( 'Mobile Header', 'mediadesk' ),
				'icon'  => 'fa fa-mobile'
			)
		);
		
		$panel_mobile_header = mediadesk_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'mediadesk' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_mobile_header'
			)
		);
		
		$mobile_header_group = mediadesk_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'mediadesk' )
			)
		);
		
		$mobile_header_row1 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'mediadesk' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'mediadesk' ),
				'parent' => $mobile_header_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'mediadesk' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = mediadesk_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'mediadesk' )
			)
		);
		
		$mobile_menu_row1 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'mediadesk' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'mediadesk' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'mediadesk' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'mediadesk' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'mediadesk' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'mediadesk' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'mediadesk' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'mediadesk' )
			)
		);
		
		$first_level_group = mediadesk_edge_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'mediadesk' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'mediadesk' )
			)
		);
		
		$first_level_row1 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'mediadesk' ),
				'parent' => $first_level_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'mediadesk' ),
				'parent' => $first_level_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'mediadesk' ),
				'parent' => $first_level_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'mediadesk' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'mediadesk' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'mediadesk' ),
				'parent'  => $first_level_row2,
				'options' => mediadesk_edge_get_text_transform_array()
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'mediadesk' ),
				'parent'  => $first_level_row2,
				'options' => mediadesk_edge_get_font_style_array()
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'mediadesk' ),
				'parent'  => $first_level_row2,
				'options' => mediadesk_edge_get_font_weight_array()
			)
		);
		
		$first_level_row3 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'mediadesk' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = mediadesk_edge_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'mediadesk' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'mediadesk' )
			)
		);
		
		$second_level_row1 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'mediadesk' ),
				'parent' => $second_level_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'mediadesk' ),
				'parent' => $second_level_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'mediadesk' ),
				'parent' => $second_level_row1
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'mediadesk' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'mediadesk' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'mediadesk' ),
				'parent'  => $second_level_row2,
				'options' => mediadesk_edge_get_text_transform_array()
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'mediadesk' ),
				'parent'  => $second_level_row2,
				'options' => mediadesk_edge_get_font_style_array()
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'mediadesk' ),
				'parent'  => $second_level_row2,
				'options' => mediadesk_edge_get_font_weight_array()
			)
		);
		
		$second_level_row3 = mediadesk_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'mediadesk' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mediadesk_edge_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'mediadesk' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'mediadesk' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'mediadesk' ),
				'parent' => $panel_mobile_header
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'mediadesk' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_mobile_header_options_map', 5 );
}