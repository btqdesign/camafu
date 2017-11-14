<?php

if ( ! function_exists( 'mediadesk_edge_load_search' ) ) {
	function mediadesk_edge_load_search() {
		$search_type_meta = mediadesk_edge_options()->getOptionValue( 'search_type' );
		$search_type      = ! empty( $search_type_meta ) ? $search_type_meta : 'fullscreen';
		
		if ( mediadesk_edge_active_widget( false, false, 'edgtf_search_opener' ) ) {
			include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '.php';
		}
	}
	
	add_action( 'init', 'mediadesk_edge_load_search' );
}

if ( ! function_exists( 'mediadesk_edge_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function mediadesk_edge_get_holder_params_search() {
		$params_list = array();
		
		$layout = mediadesk_edge_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'edgtf-container';
			$params_list['inner']  = 'edgtf-container-inner clearfix';
		} else {
			$params_list['holder'] = 'edgtf-full-width';
			$params_list['inner']  = 'edgtf-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'mediadesk_edge_filter_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_search_page' ) ) {
	function mediadesk_edge_get_search_page() {
		$sidebar_layout = mediadesk_edge_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		mediadesk_edge_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'mediadesk_edge_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function mediadesk_edge_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'mediadesk_edge_filter_search_page_path', 'templates/page' );
		$type   = apply_filters( 'mediadesk_edge_filter_search_page_layout', 'default' );
		$module = apply_filters( 'mediadesk_edge_filter_search_page_module', 'search' );
		$plugin = apply_filters( 'mediadesk_edge_filter_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => mediadesk_edge_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'mediadesk_edge_filter_search_page_params', $params );
		
		mediadesk_edge_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}