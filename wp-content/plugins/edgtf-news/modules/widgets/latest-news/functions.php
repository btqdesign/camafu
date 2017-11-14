<?php

if ( ! function_exists( 'edgtf_news_register_latest_news_widget' ) ) {
	/**
	 * Function that register latest news widget
	 */
	function edgtf_news_register_latest_news_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassLatestNews';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_latest_news_widget' );
}