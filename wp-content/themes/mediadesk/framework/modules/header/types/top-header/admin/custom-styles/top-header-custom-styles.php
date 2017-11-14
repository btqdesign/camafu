<?php

if ( ! function_exists( 'mediadesk_edge_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function mediadesk_edge_header_top_bar_styles() {
		$top_header_height = mediadesk_edge_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo mediadesk_edge_dynamic_css( '.edgtf-top-bar', array( 'height' => mediadesk_edge_filter_px( $top_header_height ) . 'px' ) );
			echo mediadesk_edge_dynamic_css( '.edgtf-top-bar .edgtf-logo-wrapper a', array( 'max-height' => mediadesk_edge_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo mediadesk_edge_dynamic_css( '.edgtf-top-bar-background', array( 'height' => mediadesk_edge_get_top_bar_background_height() . 'px' ) );
		
		if ( mediadesk_edge_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.edgtf-top-bar .edgtf-grid .edgtf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = mediadesk_edge_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = mediadesk_edge_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = mediadesk_edge_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo mediadesk_edge_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = mediadesk_edge_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = mediadesk_edge_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( mediadesk_edge_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = mediadesk_edge_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = mediadesk_edge_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo mediadesk_edge_dynamic_css( '.edgtf-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( mediadesk_edge_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo mediadesk_edge_dynamic_css( '.edgtf-top-bar', $top_bar_styles );
	}
	
	add_action( 'mediadesk_edge_action_style_dynamic', 'mediadesk_edge_header_top_bar_styles' );
}