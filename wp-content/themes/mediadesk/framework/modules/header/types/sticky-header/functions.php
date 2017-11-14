<?php

if ( ! function_exists( 'mediadesk_edge_sticky_header_global_js_var' ) ) {
	function mediadesk_edge_sticky_header_global_js_var( $global_variables ) {
		$global_variables['edgtfStickyHeaderHeight']             = mediadesk_edge_get_sticky_header_height();
		$global_variables['edgtfStickyHeaderTransparencyHeight'] = mediadesk_edge_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter( 'mediadesk_edge_filter_js_global_variables', 'mediadesk_edge_sticky_header_global_js_var' );
}

if ( ! function_exists( 'mediadesk_edge_sticky_header_per_page_js_var' ) ) {
	function mediadesk_edge_sticky_header_per_page_js_var( $perPageVars ) {
		$perPageVars['edgtfStickyScrollAmount'] = mediadesk_edge_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter( 'mediadesk_edge_filter_per_page_js_vars', 'mediadesk_edge_sticky_header_per_page_js_var' );
}

if ( ! function_exists( 'mediadesk_edge_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function mediadesk_edge_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'edgtf-sticky-right',
				'name'          => esc_html__( 'Sticky Header Widget Area', 'mediadesk' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'mediadesk' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'mediadesk_edge_register_sticky_header_areas' );
}

if ( ! function_exists( 'mediadesk_edge_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mediadesk_edge_get_sticky_menu( $additional_class = 'edgtf-default-nav' ) {
		mediadesk_edge_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function mediadesk_edge_get_sticky_header( $slug = '', $module = '' ) {
		$parameters = array(
			'hide_logo'             => mediadesk_edge_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
			'sticky_header_in_grid' => mediadesk_edge_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' ? true : false
		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		mediadesk_edge_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function mediadesk_edge_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'mediadesk_edge_filter_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = mediadesk_edge_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up' ) ) ) {
			$sticky_header_height = mediadesk_edge_filter_px( mediadesk_edge_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function mediadesk_edge_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'mediadesk_edge_filter_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = mediadesk_edge_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && mediadesk_edge_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = mediadesk_edge_filter_px( mediadesk_edge_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'mediadesk_edge_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function mediadesk_edge_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'mediadesk_edge_filter_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = mediadesk_edge_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = mediadesk_edge_filter_px( mediadesk_edge_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}