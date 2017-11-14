<?php

if ( ! function_exists( 'mediadesk_edge_header_skin_class' ) ) {
	/**
	 * Function that adds header style class to body tag
	 */
	function mediadesk_edge_header_skin_class( $classes ) {
		$header_style     = mediadesk_edge_get_meta_field_intersect( 'header_style', mediadesk_edge_get_page_id() );
		$header_style_404 = mediadesk_edge_options()->getOptionValue( '404_header_style' );
		
		if ( is_404() && ! empty( $header_style_404 ) ) {
			$classes[] = 'edgtf-' . $header_style_404;
		} else if ( ! empty( $header_style ) ) {
			$classes[] = 'edgtf-' . $header_style;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_header_skin_class' );
}

if ( ! function_exists( 'mediadesk_edge_sticky_header_behaviour_class' ) ) {
	/**
	 * Function that adds header behavior class to body tag
	 */
	function mediadesk_edge_sticky_header_behaviour_class( $classes ) {
		$header_behavior = mediadesk_edge_get_meta_field_intersect( 'header_behaviour', mediadesk_edge_get_page_id() );
		
		if ( ! empty( $header_behavior ) ) {
			$classes[] = 'edgtf-' . $header_behavior;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_sticky_header_behaviour_class' );
}

if ( ! function_exists( 'mediadesk_edge_menu_dropdown_appearance' ) ) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function mediadesk_edge_menu_dropdown_appearance( $classes ) {
		$dropdown_menu_appearance = mediadesk_edge_options()->getOptionValue( 'menu_dropdown_appearance' );
		
		if ( $dropdown_menu_appearance !== 'default' ) {
			$classes[] = 'edgtf-' . $dropdown_menu_appearance;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_menu_dropdown_appearance' );
}

if ( ! function_exists( 'mediadesk_edge_header_class' ) ) {
	/**
	 * Function that adds class to header based on theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added header class
	 */
	function mediadesk_edge_header_class( $classes ) {
		$id = mediadesk_edge_get_page_id();
		
		$header_type = mediadesk_edge_get_meta_field_intersect( 'header_type', $id );
		
		$classes[] = 'edgtf-' . $header_type;
		
		$disable_menu_area_shadow = mediadesk_edge_get_meta_field_intersect( 'menu_area_shadow', $id ) == 'no';
		if ( $disable_menu_area_shadow ) {
			$classes[] = 'edgtf-menu-area-shadow-disable';
		}
		
		$disable_menu_area_grid_shadow = mediadesk_edge_get_meta_field_intersect( 'menu_area_in_grid_shadow', $id ) == 'no';
		if ( $disable_menu_area_grid_shadow ) {
			$classes[] = 'edgtf-menu-area-in-grid-shadow-disable';
		}
		
		$disable_menu_area_border = mediadesk_edge_get_meta_field_intersect( 'menu_area_border', $id ) == 'no';
		if ( $disable_menu_area_border ) {
			$classes[] = 'edgtf-menu-area-border-disable';
		}
		
		$disable_menu_area_grid_border = mediadesk_edge_get_meta_field_intersect( 'menu_area_in_grid_border', $id ) == 'no';
		if ( $disable_menu_area_grid_border ) {
			$classes[] = 'edgtf-menu-area-in-grid-border-disable';
		}
		
		if ( mediadesk_edge_get_meta_field_intersect( 'menu_area_in_grid', $id ) == 'yes' &&
		     mediadesk_edge_get_meta_field_intersect( 'menu_area_grid_background_color', $id ) !== '' &&
		     mediadesk_edge_get_meta_field_intersect( 'menu_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'edgtf-header-menu-area-in-grid-padding';
		}
		
		$disable_logo_area_border = mediadesk_edge_get_meta_field_intersect( 'logo_area_border', $id ) == 'no';
		if ( $disable_logo_area_border ) {
			$classes[] = 'edgtf-logo-area-border-disable';
		}
		
		$disable_logo_area_grid_border = mediadesk_edge_get_meta_field_intersect( 'logo_area_in_grid_border', $id ) == 'no';
		if ( $disable_logo_area_grid_border ) {
			$classes[] = 'edgtf-logo-area-in-grid-border-disable';
		}
		
		if ( mediadesk_edge_get_meta_field_intersect( 'logo_area_in_grid', $id ) == 'yes' &&
		     mediadesk_edge_get_meta_field_intersect( 'logo_area_grid_background_color', $id ) !== '' &&
		     mediadesk_edge_get_meta_field_intersect( 'logo_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'edgtf-header-logo-area-in-grid-padding';
		}
		
		$disable_shadow_vertical = mediadesk_edge_get_meta_field_intersect( 'vertical_header_shadow', $id ) == 'no';
		if ( $disable_shadow_vertical ) {
			$classes[] = 'edgtf-header-vertical-shadow-disable';
		}
		
		$disable_border_vertical = mediadesk_edge_get_meta_field_intersect( 'vertical_header_border', $id ) == 'no';
		if ( $disable_border_vertical ) {
			$classes[] = 'edgtf-header-vertical-border-disable';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_header_class' );
}

if ( ! function_exists( 'mediadesk_edge_header_area_style' ) ) {
	/**
	 * Function that return styles for header area
	 */
	function mediadesk_edge_header_area_style( $style ) {
		$page_id      = mediadesk_edge_get_page_id();
		$class_prefix = mediadesk_edge_get_unique_page_class( $page_id, true );
		
		$current_style = '';
		
		$menu_area_style              = array();
		$menu_area_grid_style         = array();
		$menu_area_enable_border      = get_post_meta( $page_id, 'edgtf_menu_area_border_meta', true ) == 'yes';
		$menu_area_enable_grid_border = get_post_meta( $page_id, 'edgtf_menu_area_in_grid_border_meta', true ) == 'yes';
		$menu_area_enable_shadow      = get_post_meta( $page_id, 'edgtf_menu_area_shadow_meta', true ) == 'yes';
		$menu_area_enable_grid_shadow = get_post_meta( $page_id, 'edgtf_menu_area_in_grid_shadow_meta', true ) == 'yes';
		
		$menu_area_selector      = array( $class_prefix . ' .edgtf-page-header .edgtf-menu-area' );
		$menu_area_grid_selector = array( $class_prefix . ' .edgtf-page-header .edgtf-menu-area .edgtf-grid .edgtf-vertical-align-containers' );
		
		/* menu area style - start */
		
		$menu_area_background_color        = get_post_meta( $page_id, 'edgtf_menu_area_background_color_meta', true );
		$menu_area_background_transparency = get_post_meta( $page_id, 'edgtf_menu_area_background_transparency_meta', true );
		
		if ( $menu_area_background_transparency === '' ) {
			$menu_area_background_transparency = 1;
		}
		
		$menu_area_background_color_rgba = mediadesk_edge_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		
		if ( $menu_area_background_color_rgba !== null ) {
			$menu_area_style['background-color'] = $menu_area_background_color_rgba;
		}
		
		if ( $menu_area_enable_shadow ) {
			$menu_area_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ( $menu_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'edgtf_menu_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$menu_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* menu area style - end */
		
		/* menu area in grid style - start */
		
		if ( $menu_area_enable_grid_shadow ) {
			$menu_area_grid_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ( $menu_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'edgtf_menu_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$menu_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$menu_area_grid_background_color        = get_post_meta( $page_id, 'edgtf_menu_area_grid_background_color_meta', true );
		$menu_area_grid_background_transparency = get_post_meta( $page_id, 'edgtf_menu_area_grid_background_transparency_meta', true );
		
		if ( $menu_area_grid_background_transparency === '' ) {
			$menu_area_grid_background_transparency = 1;
		}
		
		$menu_area_grid_background_color_rgba = mediadesk_edge_rgba_color( $menu_area_grid_background_color, $menu_area_grid_background_transparency );
		
		if ( $menu_area_grid_background_color_rgba !== null ) {
			$menu_area_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}
		
		$current_style .= mediadesk_edge_dynamic_css( $menu_area_selector, $menu_area_style );
		$current_style .= mediadesk_edge_dynamic_css( $menu_area_grid_selector, $menu_area_grid_style );
		
		/* menu area in grid style - end */
		
		/* main menu dropdown area style - start */
		
		$dropdown_top_position = get_post_meta( $page_id, 'edgtf_dropdown_top_position_meta', true );
		
		$dropdown_styles = array();
		if ( $dropdown_top_position !== '' ) {
			$dropdown_styles['top'] = mediadesk_edge_filter_suffix( $dropdown_top_position, '%' ) . '%';
		}
		
		$dropdown_selector = array( $class_prefix . ' .edgtf-page-header .edgtf-drop-down .second' );
		
		$current_style .= mediadesk_edge_dynamic_css( $dropdown_selector, $dropdown_styles );
		
		/* main menu dropdown area style - end */
		
		/* logo area style - start */
		
		$logo_area_style              = array();
		$logo_area_grid_style         = array();
		$logo_area_enable_border      = get_post_meta( $page_id, 'edgtf_logo_area_border_meta', true ) == 'yes';
		$logo_area_enable_grid_border = get_post_meta( $page_id, 'edgtf_logo_area_in_grid_border_meta', true ) == 'yes';
		
		$logo_area_selector      = array( $class_prefix . ' .edgtf-page-header .edgtf-logo-area' );
		$logo_area_grid_selector = array( $class_prefix . ' .edgtf-page-header .edgtf-logo-area .edgtf-grid .edgtf-vertical-align-containers' );
		
		$logo_area_background_color        = get_post_meta( $page_id, 'edgtf_logo_area_background_color_meta', true );
		$logo_area_background_transparency = get_post_meta( $page_id, 'edgtf_logo_area_background_transparency_meta', true );
		
		if ( $logo_area_background_transparency === '' ) {
			$logo_area_background_transparency = 1;
		}
		
		$logo_area_background_color_rgba = mediadesk_edge_rgba_color( $logo_area_background_color, $logo_area_background_transparency );
		
		if ( $logo_area_background_color_rgba !== null ) {
			$logo_area_style['background-color'] = $logo_area_background_color_rgba;
		}
		
		if ( $logo_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'edgtf_logo_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$logo_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* logo area style - end */
		
		/* logo area in grid style - start */
		
		if ( $logo_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'edgtf_logo_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$logo_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$logo_area_grid_background_color        = get_post_meta( $page_id, 'edgtf_logo_area_grid_background_color_meta', true );
		$logo_area_grid_background_transparency = get_post_meta( $page_id, 'edgtf_logo_area_grid_background_transparency_meta', true );
		
		if ( $logo_area_grid_background_transparency === '' ) {
			$logo_area_grid_background_transparency = 1;
		}
		
		$logo_area_grid_background_color_rgba = mediadesk_edge_rgba_color( $logo_area_grid_background_color, $logo_area_grid_background_transparency );
		
		if ( $logo_area_grid_background_color_rgba !== null ) {
			$logo_area_grid_style['background-color'] = $logo_area_grid_background_color_rgba;
		}
		
		/* logo area in grid style - end */
		
		if ( ! empty( $logo_area_style ) ) {
			$current_style .= mediadesk_edge_dynamic_css( $logo_area_selector, $logo_area_style );
		}
		
		if ( ! empty( $logo_area_grid_style ) ) {
			$current_style .= mediadesk_edge_dynamic_css( $logo_area_grid_selector, $logo_area_grid_style );
		}
		
		$current_style = apply_filters( 'mediadesk_edge_filter_add_header_page_custom_style', $current_style, $class_prefix, $page_id ) . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediadesk_edge_filter_add_page_custom_style', 'mediadesk_edge_header_area_style' );
}