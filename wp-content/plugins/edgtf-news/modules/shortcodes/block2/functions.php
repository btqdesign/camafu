<?php

if ( ! function_exists( 'edgtf_news_add_block2_shortcodes' ) ) {
	function edgtf_news_add_block2_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'EdgefNews\CPT\Shortcodes\Block2\Block2'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'edgtf_news_filter_add_vc_shortcode', 'edgtf_news_add_block2_shortcodes' );
}

if ( ! function_exists( 'edgtf_news_set_block2_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for block 2 shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function edgtf_news_set_block2_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-block2';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'edgtf_news_filter_add_vc_shortcodes_custom_icon_class', 'edgtf_news_set_block2_icon_class_name_for_vc_shortcodes' );
}