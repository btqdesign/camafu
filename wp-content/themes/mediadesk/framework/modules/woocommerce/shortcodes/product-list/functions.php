<?php

if ( ! function_exists( 'mediadesk_edge_add_product_list_shortcode' ) ) {
	function mediadesk_edge_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'EdgeCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( mediadesk_edge_core_plugin_installed() ) {
		add_filter( 'edgtf_core_filter_add_vc_shortcode', 'mediadesk_edge_add_product_list_shortcode' );
	}
}

if ( ! function_exists( 'mediadesk_edge_add_product_list_into_shortcodes_list' ) ) {
	function mediadesk_edge_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'edgtf_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'mediadesk_edge_filter_woocommerce_shortcodes_list', 'mediadesk_edge_add_product_list_into_shortcodes_list' );
}