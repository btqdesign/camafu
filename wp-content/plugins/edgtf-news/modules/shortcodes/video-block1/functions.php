<?php

if ( ! function_exists( 'edgtf_news_add_video_block1_shortcodes' ) ) {
	function edgtf_news_add_video_block1_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'EdgefNews\CPT\Shortcodes\VideoBlock1\VideoBlock1'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'edgtf_news_filter_add_vc_shortcode', 'edgtf_news_add_video_block1_shortcodes' );
}

if ( ! function_exists( 'edgtf_news_set_video_block1_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for video block 1 shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function edgtf_news_set_video_block1_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-video-block1';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'edgtf_news_filter_add_vc_shortcodes_custom_icon_class', 'edgtf_news_set_video_block1_icon_class_name_for_vc_shortcodes' );
}