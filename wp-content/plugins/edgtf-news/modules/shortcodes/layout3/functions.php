<?php

if ( ! function_exists( 'edgtf_news_add_layout3_shortcodes' ) ) {
	function edgtf_news_add_layout3_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'EdgefNews\CPT\Shortcodes\Layout3\Layout3'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'edgtf_news_filter_add_vc_shortcode', 'edgtf_news_add_layout3_shortcodes' );
}

if ( ! function_exists( 'edgtf_news_set_layout3_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for layout 3 shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function edgtf_news_set_layout3_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-layout3';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'edgtf_news_filter_add_vc_shortcodes_custom_icon_class', 'edgtf_news_set_layout3_icon_class_name_for_vc_shortcodes' );
}