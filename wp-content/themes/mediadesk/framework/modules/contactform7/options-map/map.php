<?php

if ( ! function_exists('mediadesk_edge_contact_form_7_options_map') ) {

	function mediadesk_edge_contact_form_7_options_map() {

		mediadesk_edge_add_admin_page(array(
			'slug'	=> '_contact_form7_page',
			'title'	=> esc_html__('Contact Form 7', 'mediadesk'),
			'icon'	=> 'fa fa-envelope-o'
		));

		$panel_contact_form_style_1 = mediadesk_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_1',
			'title'	=> esc_html__('Custom Style 1', 'mediadesk')
		));

		//Text Typography

		$typography_text_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title'			=> esc_html__('Form Text Typography', 'mediadesk'),
			'description'	=> esc_html__('Setup typography for form elements text', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_1
		));

		$typography_text_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Text Color', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_text_google_fonts',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mediadesk'),
			'options'		=>  mediadesk_edge_get_font_style_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_weight_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mediadesk'),
			'options'		=> mediadesk_edge_get_text_transform_array()
		));

		$typography_text_row3 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title'			=> esc_html__('Form Label Typography', 'mediadesk'),
			'description'	=> esc_html__('Setup typography for form elements label', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_1
		));

		$typography_label_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_label_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_label_google_fonts',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family', 'mediadesk'),
		));

		$typography_label_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mediadesk'),
			'options'		=>  mediadesk_edge_get_font_style_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_weight_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mediadesk'),
			'options'		=> mediadesk_edge_get_text_transform_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title'			=> esc_html__('Form Elements Background and Border', 'mediadesk'),
			'description'	=> esc_html__('Setup form elements background and border style', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_1
		));

		$background_border_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_focus_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Transparency', 'mediadesk')
		));

		$background_border_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_focus_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Transparency', 'mediadesk')
		));

		$background_border_row3 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title'			=> esc_html__('Elements Padding', 'mediadesk'),
			'description'	=> 'Setup form elements padding',
			'parent'		=> $panel_contact_form_style_1
		));

		$padding_row = mediadesk_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Top', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Right', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Bottom', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Left', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title'			=> esc_html__('Elements Margin', 'mediadesk'),
			'description'	=> esc_html__('Setup form elements margin', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_1
		));

		$margin_row = mediadesk_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_margin_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Top', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_margin_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Bottom', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_textarea_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Textarea Height', 'mediadesk'),
			'description'	=> esc_html__('Enter height for textarea form element', 'mediadesk'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title'			=> esc_html__('Button Typography', 'mediadesk'),
			'description'	=> esc_html__('Setup button text typography', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_typography_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover Text Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_button_google_fonts',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family', 'mediadesk')
		));

		$button_typography_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_style_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_weight_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mediadesk'),
			'options'		=> mediadesk_edge_get_text_transform_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background and Border

		$button_background_border_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'button_background_border_group',
			'title'			=> esc_html__('Button Background and Border', 'mediadesk'),
			'description'	=> esc_html__('Setup button background and border style', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_background_border_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row1',
			'parent'	=> $button_background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_bckg_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Transparency', 'mediadesk')
		));

		$button_background_border_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row2',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_hover_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Transparency', 'mediadesk')
		));

		$button_background_border_row3 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row3',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_button_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Height', 'mediadesk'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_button_padding',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Left/Right Padding', 'mediadesk'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		$panel_contact_form_style_2 = mediadesk_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_2',
			'title'	=> esc_html__('Custom Style 2', 'mediadesk')
		));

		//Text Typography

		$typography_text_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title'			=> esc_html__('Form Text Typography', 'mediadesk'),
			'description'	=> esc_html__('Setup typography for form elements text', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_2
		));

		$typography_text_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Text Color', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_text_google_fonts',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mediadesk'),
			'options'		=>  mediadesk_edge_get_font_style_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_weight_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mediadesk'),
			'options'		=> mediadesk_edge_get_text_transform_array()
		));

		$typography_text_row3 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title'			=> esc_html__('Form Label Typography', 'mediadesk'),
			'description'	=> esc_html__('Setup typography for form elements label', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_2
		));

		$typography_label_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_label_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_label_google_fonts',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family', 'mediadesk'),
		));

		$typography_label_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mediadesk'),
			'options'		=>  mediadesk_edge_get_font_style_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_weight_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mediadesk'),
			'options'		=> mediadesk_edge_get_text_transform_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title'			=> esc_html__('Form Elements Background and Border', 'mediadesk'),
			'description'	=> esc_html__('Setup form elements background and border style', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_2
		));

		$background_border_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_focus_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Transparency', 'mediadesk')
		));

		$background_border_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_focus_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Transparency', 'mediadesk')
		));

		$background_border_row3 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title'			=> esc_html__('Elements Padding', 'mediadesk'),
			'description'	=> 'Setup form elements padding',
			'parent'		=> $panel_contact_form_style_2
		));

		$padding_row = mediadesk_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Top', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Right', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Bottom', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Left', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title'			=> esc_html__('Elements Margin', 'mediadesk'),
			'description'	=> esc_html__('Setup form elements margin', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_2
		));

		$margin_row = mediadesk_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_margin_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Top', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_margin_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Bottom', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_textarea_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Textarea Height', 'mediadesk'),
			'description'	=> esc_html__('Enter height for textarea form element', 'mediadesk'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title'			=> esc_html__('Button Typography', 'mediadesk'),
			'description'	=> esc_html__('Setup button text typography', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_typography_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover Text Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_button_google_fonts',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family', 'mediadesk')
		));

		$button_typography_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_style_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'mediadesk'),
			'options'		=> mediadesk_edge_get_font_weight_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'mediadesk'),
			'options'		=> mediadesk_edge_get_text_transform_array()
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background and Border

		$button_background_border_group = mediadesk_edge_add_admin_group(array(
			'name'			=> 'button_background_border_group',
			'title'			=> esc_html__('Button Background and Border', 'mediadesk'),
			'description'	=> esc_html__('Setup button background and border style', 'mediadesk'),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_background_border_row1 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row1',
			'parent'	=> $button_background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_bckg_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Transparency', 'mediadesk')
		));

		$button_background_border_row2 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row2',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency', 'mediadesk'),
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Color', 'mediadesk')
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_hover_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Transparency', 'mediadesk')
		));

		$button_background_border_row3 = mediadesk_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row3',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius', 'mediadesk'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_button_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Height', 'mediadesk'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		mediadesk_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_button_padding',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Left/Right Padding', 'mediadesk'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

        $panel_contact_form_style_3 = mediadesk_edge_add_admin_panel(array(
            'page'	=> '_contact_form7_page',
            'name'	=> 'panel_contact_form_style_3',
            'title'	=> esc_html__('Custom Style 3', 'mediadesk')
        ));

        //Text Typography

        $typography_text_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'typography_text_group',
            'title'			=> esc_html__('Form Text Typography', 'mediadesk'),
            'description'	=> esc_html__('Setup typography for form elements text', 'mediadesk'),
            'parent'		=> $panel_contact_form_style_3
        ));

        $typography_text_row1 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'typography_text_row1',
            'parent'	=> $typography_text_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_text_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Text Color', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_focus_text_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Focus Text Color', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_text_font_size',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Size', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_text_line_height',
            'default_value'	=> '',
            'label'			=> esc_html__('Line Height', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        $typography_text_row2 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'typography_text_row2',
            'next'		=> true,
            'parent'	=> $typography_text_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row2,
            'type'			=> 'fontsimple',
            'name'			=> 'cf7_style_3_text_google_fonts',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Family', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row2,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_text_font_style',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Style', 'mediadesk'),
            'options'		=>  mediadesk_edge_get_font_style_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row2,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_text_font_weight',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Weight', 'mediadesk'),
            'options'		=> mediadesk_edge_get_font_weight_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row2,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_text_text_transform',
            'default_value'	=> '',
            'label'			=> esc_html__('Text Transform', 'mediadesk'),
            'options'		=> mediadesk_edge_get_text_transform_array()
        ));

        $typography_text_row3 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'typography_text_row3',
            'next'		=> true,
            'parent'	=> $typography_text_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_text_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_text_letter_spacing',
            'default_value'	=> '',
            'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Labels Typography

        $typography_label_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'typography_label_group',
            'title'			=> esc_html__('Form Label Typography', 'mediadesk'),
            'description'	=> esc_html__('Setup typography for form elements label', 'mediadesk'),
            'parent'		=> $panel_contact_form_style_3
        ));

        $typography_label_row1 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'typography_label_row1',
            'parent'	=> $typography_label_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_label_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Text Color', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_label_font_size',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Size', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_label_line_height',
            'default_value'	=> '',
            'label'			=> esc_html__('Line Height', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row1,
            'type'			=> 'fontsimple',
            'name'			=> 'cf7_style_3_label_google_fonts',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Family', 'mediadesk'),
        ));

        $typography_label_row3 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'typography_label_row3',
            'next'		=> true,
            'parent'	=> $typography_label_group
        ));


        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row3,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_label_font_style',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Style', 'mediadesk'),
            'options'		=>  mediadesk_edge_get_font_style_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row3,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_label_font_weight',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Weight', 'mediadesk'),
            'options'		=> mediadesk_edge_get_font_weight_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row3,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_label_text_transform',
            'default_value'	=> '',
            'label'			=> esc_html__('Text Transform', 'mediadesk'),
            'options'		=> mediadesk_edge_get_text_transform_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $typography_label_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_label_letter_spacing',
            'default_value'	=> '',
            'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Form Elements Background and Border

        $background_border_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'background_border_group',
            'title'			=> esc_html__('Form Elements Background and Border', 'mediadesk'),
            'description'	=> esc_html__('Setup form elements background and border style', 'mediadesk'),
            'parent'		=> $panel_contact_form_style_3
        ));

        $background_border_row1 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'background_border_row1',
            'parent'	=> $background_border_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_background_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Background Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_background_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Background Transparency', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_focus_background_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Focus Background Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_focus_background_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Focus Background Transparency', 'mediadesk')
        ));

        $background_border_row2 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'background_border_row2',
            'next'		=> true,
            'parent'	=> $background_border_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row2,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_border_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row2,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_border_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Transparency', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row2,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_focus_border_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Focus Border Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row2,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_focus_border_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Focus Border Transparency', 'mediadesk')
        ));

        $background_border_row3 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'background_border_row3',
            'next'		=> true,
            'parent'	=> $background_border_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_border_width',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Width', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $background_border_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_border_radius',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Radius', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Form Elements Padding

        $padding_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'padding_group',
            'title'			=> esc_html__('Elements Padding', 'mediadesk'),
            'description'	=> 'Setup form elements padding',
            'parent'		=> $panel_contact_form_style_3
        ));

        $padding_row = mediadesk_edge_add_admin_row(array(
            'name'		=> 'padding_row',
            'parent'	=> $padding_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $padding_row,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_padding_top',
            'default_value'	=> '',
            'label'			=> esc_html__('Padding Top', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $padding_row,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_padding_right',
            'default_value'	=> '',
            'label'			=> esc_html__('Padding Right', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $padding_row,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_padding_bottom',
            'default_value'	=> '',
            'label'			=> esc_html__('Padding Bottom', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $padding_row,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_padding_left',
            'default_value'	=> '',
            'label'			=> esc_html__('Padding Left', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Form Elements Margin

        $margin_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'margin_group',
            'title'			=> esc_html__('Elements Margin', 'mediadesk'),
            'description'	=> esc_html__('Setup form elements margin', 'mediadesk'),
            'parent'		=> $panel_contact_form_style_3
        ));

        $margin_row = mediadesk_edge_add_admin_row(array(
            'name'		=> 'margin_row',
            'parent'	=> $margin_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $margin_row,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_margin_top',
            'default_value'	=> '',
            'label'			=> esc_html__('Margin Top', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $margin_row,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_margin_bottom',
            'default_value'	=> '',
            'label'			=> esc_html__('Margin Bottom', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Textarea

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $panel_contact_form_style_3,
            'type'			=> 'text',
            'name'			=> 'cf7_style_3_textarea_height',
            'default_value'	=> '',
            'label'			=> esc_html__('Textarea Height', 'mediadesk'),
            'description'	=> esc_html__('Enter height for textarea form element', 'mediadesk'),
            'args'			=> array(
                'col_width' => '3',
                'suffix' => 'px'
            )
        ));

        // Button Typography

        $button_typography_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'button_typography_group',
            'title'			=> esc_html__('Button Typography', 'mediadesk'),
            'description'	=> esc_html__('Setup button text typography', 'mediadesk'),
            'parent'		=> $panel_contact_form_style_3
        ));

        $button_typography_row1 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'button_typography_row1',
            'parent'	=> $button_typography_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_button_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Text Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_button_hover_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Hover Text Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_font_size',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Size', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row1,
            'type'			=> 'fontsimple',
            'name'			=> 'cf7_style_3_button_google_fonts',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Family', 'mediadesk')
        ));

        $button_typography_row3 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'button_typography_row3',
            'next'		=> true,
            'parent'	=> $button_typography_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row3,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_button_font_style',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Style', 'mediadesk'),
            'options'		=> mediadesk_edge_get_font_style_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row3,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_button_font_weight',
            'default_value'	=> '',
            'label'			=> esc_html__('Font Weight', 'mediadesk'),
            'options'		=> mediadesk_edge_get_font_weight_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row3,
            'type'			=> 'selectsimple',
            'name'			=> 'cf7_style_3_button_text_transform',
            'default_value'	=> '',
            'label'			=> esc_html__('Text Transform', 'mediadesk'),
            'options'		=> mediadesk_edge_get_text_transform_array()
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_typography_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_letter_spacing',
            'default_value'	=> '',
            'label'			=> esc_html__('Letter Spacing', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Button Background and Border

        $button_background_border_group = mediadesk_edge_add_admin_group(array(
            'name'			=> 'button_background_border_group',
            'title'			=> esc_html__('Button Background and Border', 'mediadesk'),
            'description'	=> esc_html__('Setup button background and border style', 'mediadesk'),
            'parent'		=> $panel_contact_form_style_3
        ));

        $button_background_border_row1 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'button_background_border_row1',
            'parent'	=> $button_background_border_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_button_background_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Background Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_background_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Background Transparency', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row1,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_button_hover_bckg_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Background Hover Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row1,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_hover_bckg_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Background Hover Transparency', 'mediadesk')
        ));

        $button_background_border_row2 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'button_background_border_row2',
            'next'		=> true,
            'parent'	=> $button_background_border_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row2,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_button_border_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row2,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_border_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Transparency', 'mediadesk'),
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row2,
            'type'			=> 'colorsimple',
            'name'			=> 'cf7_style_3_button_hover_border_color',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Hover Color', 'mediadesk')
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row2,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_hover_border_transparency',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Hover Transparency', 'mediadesk')
        ));

        $button_background_border_row3 = mediadesk_edge_add_admin_row(array(
            'name'		=> 'button_background_border_row3',
            'next'		=> true,
            'parent'	=> $button_background_border_group
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_border_width',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Width', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $button_background_border_row3,
            'type'			=> 'textsimple',
            'name'			=> 'cf7_style_3_button_border_radius',
            'default_value'	=> '',
            'label'			=> esc_html__('Border Radius', 'mediadesk'),
            'args'			=> array(
                'suffix' => 'px'
            )
        ));

        // Button Height

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $panel_contact_form_style_3,
            'type'			=> 'text',
            'name'			=> 'cf7_style_3_button_height',
            'default_value'	=> '',
            'label'			=> esc_html__('Button Height', 'mediadesk'),
            'args'			=> array(
                'col_width' => '3',
                'suffix' => 'px'
            )
        ));

        // Button Padding

        mediadesk_edge_add_admin_field(array(
            'parent'		=> $panel_contact_form_style_3,
            'type'			=> 'text',
            'name'			=> 'cf7_style_3_button_padding',
            'default_value'	=> '',
            'label'			=> esc_html__('Button Left/Right Padding', 'mediadesk'),
            'args'			=> array(
                'col_width' => '3',
                'suffix' => 'px'
            )
        ));
	}

	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_contact_form_7_options_map', 20);
}