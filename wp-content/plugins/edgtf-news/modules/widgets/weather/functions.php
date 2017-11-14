<?php

if ( ! function_exists( 'edgtf_news_register_weather_widget' ) ) {
	/**
	 * Function that register weather widget
	 */
	function edgtf_news_register_weather_widget( $widgets ) {
		$widgets[] = 'EdgefNewsClassWeather';
		
		return $widgets;
	}
	
	add_filter( 'edgtf_news_filter_register_widgets', 'edgtf_news_register_weather_widget' );
}