<?php

if ( ! function_exists( 'edgtf_news_register_layout2_widget' ) ) {
	/**
	 * Function that register layout2 widget
	 */
	function edgtf_news_register_layout2_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWidgetLayout2';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_layout2_widget' );
}