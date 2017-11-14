<?php

if ( ! function_exists( 'edgtf_news_register_post_layout_tabs_widget' ) ) {
	/**
	 * Function that register weather widget
	 */
	function edgtf_news_register_post_layout_tabs_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassPostLayoutTabs';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_post_layout_tabs_widget' );
}