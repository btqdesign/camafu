<?php
use MediaDeskNamespace\Modules\Header\Lib\HeaderFactory;

if ( ! function_exists( 'mediadesk_edge_get_header' ) ) {
	/**
	 * Loads header HTML based on header type option. Sets all necessary parameters for header
	 * and defines mediadesk_edge_filter_header_type_parameters filter
	 */
	function mediadesk_edge_get_header() {
		$id = mediadesk_edge_get_page_id();
		
		//will be read from options
		$header_type = mediadesk_edge_get_meta_field_intersect( 'header_type', $id );
		
		$menu_area_in_grid = mediadesk_edge_get_meta_field_intersect( 'menu_area_in_grid', $id );
		$navigation_in_grid = mediadesk_edge_get_meta_field_intersect( 'navigation_in_grid', $id );
		
		$header_behavior = mediadesk_edge_get_meta_field_intersect( 'header_behaviour', $id );
		
		if ( HeaderFactory::getInstance()->validHeaderObject() ) {
			$parameters = array(
				'hide_logo'          => mediadesk_edge_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
				'menu_area_in_grid'  => $menu_area_in_grid == 'yes' ? true : false,
				'navigation_in_grid' => $navigation_in_grid,
				'show_sticky'        => in_array( $header_behavior, array(
					'sticky-header-on-scroll-up',
					'sticky-header-on-scroll-down-up'
				) ) ? true : false,
				'show_fixed_wrapper' => in_array( $header_behavior, array( 'fixed-on-scroll' ) ) ? true : false,
			);
			
			$parameters = apply_filters( 'mediadesk_edge_filter_header_type_parameters', $parameters, $header_type );
			
			HeaderFactory::getInstance()->getHeaderObject()->loadTemplate( $parameters );
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_get_logo' ) ) {
	/**
	 * Loads logo HTML
	 *
	 * @param $slug
	 */
	function mediadesk_edge_get_logo( $slug = '' ) {
		$id = mediadesk_edge_get_page_id();
		
		if ( $slug == 'sticky' ) {
			$logo_image = mediadesk_edge_get_meta_field_intersect( 'logo_image_sticky', $id );
		} else {
			$logo_image = mediadesk_edge_get_meta_field_intersect( 'logo_image', $id );
		}
		
		$logo_image_dark  = mediadesk_edge_get_meta_field_intersect( 'logo_image_dark', $id );
		$logo_image_light = mediadesk_edge_get_meta_field_intersect( 'logo_image_light', $id );
		
		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = mediadesk_edge_get_image_dimensions( $logo_image );
		
		$logo_height = '';
		$logo_styles = '';
		if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px;'; //divided with 2 because of retina screens
		}
		
		$params = array(
			'logo_image'       => $logo_image,
			'logo_image_dark'  => $logo_image_dark,
			'logo_image_light' => $logo_image_light,
			'logo_styles'      => $logo_styles
		);
		
		$params = apply_filters( 'mediadesk_edge_filter_get_logo_html_parameters', $params );
		
		mediadesk_edge_get_module_template_part( 'parts/logo', 'header', $slug, $params );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mediadesk_edge_get_main_menu( $additional_class = 'edgtf-default-nav' ) {
		mediadesk_edge_get_module_template_part( 'parts/navigation', 'header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_header_widget_logo_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function mediadesk_edge_get_header_widget_logo_area() {
		$page_id                 = mediadesk_edge_get_page_id();
		$custom_logo_widget_area = get_post_meta( $page_id, 'edgtf_custom_logo_area_sidebar_meta', true );
		
		if ( get_post_meta( $page_id, 'edgtf_disable_header_widget_logo_area_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'edgtf-header-widget-logo-area' ) && empty( $custom_logo_widget_area ) ) {
				dynamic_sidebar( 'edgtf-header-widget-logo-area' );
			} else if ( ! empty( $custom_logo_widget_area ) && is_active_sidebar( $custom_logo_widget_area ) ) {
				dynamic_sidebar( $custom_logo_widget_area );
			}
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_get_header_widget_menu_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function mediadesk_edge_get_header_widget_menu_area() {
		$page_id                 = mediadesk_edge_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'edgtf_custom_menu_area_sidebar_meta', true );
		
		if ( get_post_meta( $page_id, 'edgtf_disable_header_widget_menu_area_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'edgtf-header-widget-menu-area' ) && empty( $custom_menu_widget_area ) ) {
				dynamic_sidebar( 'edgtf-header-widget-menu-area' );
			} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
				dynamic_sidebar( $custom_menu_widget_area );
			}
		}
	}
}