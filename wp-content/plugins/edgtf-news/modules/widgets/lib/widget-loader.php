<?php

if ( ! function_exists( 'edgtf_news_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to mediadesk_edge_action_after_options_map action
	 */
	function edgtf_news_load_widgets() {
		
		foreach ( glob( EDGE_NEWS_SHORTCODES_PATH . '/*/widget/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}
		
		foreach ( glob( EDGE_NEWS_WIDGETS_PATH . '/*/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}
	}
	
	add_action( 'mediadesk_edge_action_before_options_map', 'edgtf_news_load_widgets', 25 );
}

if ( ! function_exists( 'edgtf_news_register_widgets' ) ) {
	function edgtf_news_register_widgets() {
		$widgets = apply_filters( 'edgtf_news_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'edgtf_news_register_widgets' );
}