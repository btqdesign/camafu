<?php

if ( ! function_exists( 'mediadesk_edge_side_area_slide_from_right_type_style' ) ) {
	function mediadesk_edge_side_area_slide_from_right_type_style() {
		$width = mediadesk_edge_options()->getOptionValue( 'side_area_width' );
		
		if ( $width !== '' ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-side-menu-slide-from-right .edgtf-side-menu', array(
				'right' => '-' . mediadesk_edge_filter_px( $width ) . 'px',
				'width' => mediadesk_edge_filter_px( $width ) . 'px'
			) );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_side_area_slide_from_right_type_style' );
}

if ( ! function_exists( 'mediadesk_edge_side_area_icon_color_styles' ) ) {
	function mediadesk_edge_side_area_icon_color_styles() {
		$icon_color             = mediadesk_edge_options()->getOptionValue( 'side_area_icon_color' );
		$icon_hover_color       = mediadesk_edge_options()->getOptionValue( 'side_area_icon_hover_color' );
		$close_icon_color       = mediadesk_edge_options()->getOptionValue( 'side_area_close_icon_color' );
		$close_icon_hover_color = mediadesk_edge_options()->getOptionValue( 'side_area_close_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.edgtf-side-menu-button-opener:hover',
			'.edgtf-side-menu-button-opener.opened'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-side-menu-button-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo mediadesk_edge_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			) );
		}
		
		if ( ! empty( $close_icon_color ) ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-side-menu a.edgtf-close-side-menu', array(
				'color' => $close_icon_color
			) );
		}
		
		if ( ! empty( $close_icon_hover_color ) ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-side-menu a.edgtf-close-side-menu:hover', array(
				'color' => $close_icon_hover_color
			) );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_side_area_icon_color_styles' );
}

if ( ! function_exists( 'mediadesk_edge_side_area_styles' ) ) {
	function mediadesk_edge_side_area_styles() {
		$side_area_styles = array();
		$background_color = mediadesk_edge_options()->getOptionValue( 'side_area_background_color' );
		$padding          = mediadesk_edge_options()->getOptionValue( 'side_area_padding' );
		$text_alignment   = mediadesk_edge_options()->getOptionValue( 'side_area_aligment' );
		
		if ( ! empty( $background_color ) ) {
			$side_area_styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $padding ) ) {
			$side_area_styles['padding'] = esc_attr( $padding );
		}
		
		if ( ! empty( $text_alignment ) ) {
			$side_area_styles['text-align'] = $text_alignment;
		}
		
		if ( ! empty( $side_area_styles ) ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-side-menu', $side_area_styles );
		}
		
		if ( $text_alignment === 'center' ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-side-menu .widget img', array(
				'margin' => '0 auto'
			) );
		}
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_side_area_styles' );
}