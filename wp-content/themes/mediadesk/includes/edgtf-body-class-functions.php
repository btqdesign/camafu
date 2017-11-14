<?php

if ( ! function_exists( 'mediadesk_edge_theme_version_class' ) ) {
	/**
	 * Function that adds classes on body for version of theme
	 */
	function mediadesk_edge_theme_version_class( $classes ) {
		$current_theme = wp_get_theme();
		
		//is child theme activated?
		if ( $current_theme->parent() ) {
			//add child theme version
			$classes[] = strtolower( str_replace( ' ', '-', $current_theme->get( 'Name' ) ) ) . '-ver-' . $current_theme->get( 'Version' );
			
			//get parent theme
			$current_theme = $current_theme->parent();
		}
		
		if ( $current_theme->exists() && $current_theme->get( 'Version' ) != '' ) {
			$classes[] = strtolower( $current_theme->get( 'Name' ) ) . '-ver-' . $current_theme->get( 'Version' );
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_theme_version_class' );
}

if ( ! function_exists( 'mediadesk_edge_boxed_class' ) ) {
	/**
	 * Function that adds classes on body for boxed layout
	 */
	function mediadesk_edge_boxed_class( $classes ) {
		$allow_boxed_layout = true;
		$allow_boxed_layout = apply_filters( 'mediadesk_edge_filter_allow_content_boxed_layout', $allow_boxed_layout );
		
		if ( $allow_boxed_layout && mediadesk_edge_get_meta_field_intersect( 'boxed' ) === 'yes' ) {
			$classes[] = 'edgtf-boxed';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_boxed_class' );
}

if ( ! function_exists( 'mediadesk_edge_paspartu_class' ) ) {
	/**
	 * Function that adds classes on body for paspartu layout
	 */
	function mediadesk_edge_paspartu_class( $classes ) {
		$id = mediadesk_edge_get_page_id();
		
		//is paspartu layout turned on?
		if ( mediadesk_edge_get_meta_field_intersect( 'paspartu', $id ) === 'yes' ) {
			$classes[] = 'edgtf-paspartu-enabled';
			
			if ( mediadesk_edge_get_meta_field_intersect( 'disable_top_paspartu', $id ) === 'yes' ) {
				$classes[] = 'edgtf-top-paspartu-disabled';
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_paspartu_class' );
}

if ( ! function_exists( 'mediadesk_edge_page_smooth_scroll_class' ) ) {
	/**
	 * Function that adds classes on body for page smooth scroll
	 */
	function mediadesk_edge_page_smooth_scroll_class( $classes ) {
		//is smooth scroll enabled enabled?
		if ( mediadesk_edge_options()->getOptionValue( 'page_smooth_scroll' ) == 'yes' ) {
			$classes[] = 'edgtf-smooth-scroll';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_page_smooth_scroll_class' );
}

if ( ! function_exists( 'mediadesk_edge_smooth_page_transitions_class' ) ) {
	/**
	 * Function that adds classes on body for smooth page transitions
	 */
	function mediadesk_edge_smooth_page_transitions_class( $classes ) {
		$id = mediadesk_edge_get_page_id();
		
		if ( mediadesk_edge_get_meta_field_intersect( 'smooth_page_transitions', $id ) == 'yes' ) {
			$classes[] = 'edgtf-smooth-page-transitions';
			
			if ( mediadesk_edge_get_meta_field_intersect( 'page_transition_preloader', $id ) == 'yes' ) {
				$classes[] = 'edgtf-smooth-page-transitions-preloader';
			}
			
			if ( mediadesk_edge_get_meta_field_intersect( 'page_transition_fadeout', $id ) == 'yes' ) {
				$classes[] = 'edgtf-smooth-page-transitions-fadeout';
			}
			
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_smooth_page_transitions_class' );
}

if ( ! function_exists( 'mediadesk_edge_content_initial_width_body_class' ) ) {
	/**
	 * Function that adds transparent content class to body.
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with transparent content body class added
	 */
	function mediadesk_edge_content_initial_width_body_class( $classes ) {
		$initial_content_width = mediadesk_edge_get_meta_field_intersect( 'initial_content_width', mediadesk_edge_get_page_id() );
		
		if ( ! empty( $initial_content_width ) ) {
			$classes[] = $initial_content_width;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_content_initial_width_body_class' );
}

if ( ! function_exists( 'mediadesk_edge_set_content_behind_header_class' ) ) {
	function mediadesk_edge_set_content_behind_header_class( $classes ) {
		$id = mediadesk_edge_get_page_id();
		
		if ( get_post_meta( $id, 'edgtf_page_content_behind_header_meta', true ) === 'yes' ) {
			$classes[] = 'edgtf-content-is-behind-header';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mediadesk_edge_set_content_behind_header_class' );
}

if ( ! function_exists( 'mediadesk_edge_set_accespress_custom_class' ) ) {
	function mediadesk_edge_set_accespress_custom_class( $classes ) {
		$custom_class = mediadesk_edge_options()->getOptionValue('accesspress_style');

		if ( $custom_class === 'yes' ) {
			$classes[] = 'edgtf-accesspress-custom-style';
		}

		return $classes;
	}

	add_filter( 'body_class', 'mediadesk_edge_set_accespress_custom_class' );
}