<?php
/*
Plugin Name: Edge News
Description: Plugin that adds news shortcodes and functionalities
Author: Edge Themes
Version: 1.0
*/

require_once 'load.php';

if ( ! function_exists( 'edgtf_news_activation' ) ) {
	/**
	 * Triggers when plugin is activated. It calls flush_rewrite_rules
	 * and defines mediadesk_edge_action_news_on_activate action
	 */
	function edgtf_news_activation() {
		do_action( 'mediadesk_edge_action_news_on_activate' );
		
		// EdgeNews\CPT\PostTypesRegister::getInstance()->register();
		flush_rewrite_rules();
	}
	
	register_activation_hook( __FILE__, 'edgtf_news_activation' );
}

if ( ! function_exists( 'edgtf_news_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function edgtf_news_text_domain() {
		load_plugin_textdomain( 'edgtf-news', false, EDGE_NEWS_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'edgtf_news_text_domain' );
}

if ( ! function_exists( 'edgtf_news_version_class' ) ) {
	/**
	 * Adds plugins version class to body
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function edgtf_news_version_class( $classes ) {
		$classes[] = 'edgt-news-' . EDGE_NEWS_VERSION;
		
		return $classes;
	}
	
	add_filter( 'body_class', 'edgtf_news_version_class' );
}

if ( ! function_exists( 'edgtf_news_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function edgtf_news_theme_installed() {
		return defined( 'EDGE_ROOT' );
	}
}

if ( ! function_exists( 'edgtf_news_scripts' ) ) {
	/**
	 * Loads plugin scripts
	 */
	function edgtf_news_scripts() {
		$array_deps_css            = array();
		$array_deps_css_responsive = array();
		$array_deps_js             = array();
		
		if ( edgtf_news_theme_installed() ) {
			$array_deps_css[]            = 'mediadesk_edge_modules';
			$array_deps_css_responsive[] = 'mediadesk_edge_modules_responsive';
			$array_deps_js[]             = 'mediadesk_edge_modules';
		}
		
		wp_enqueue_style( 'edgtf_news_style', plugins_url( EDGE_NEWS_REL_PATH . '/assets/css/news.min.css' ), $array_deps_css );
		wp_enqueue_style( 'edgtf_news_responsive_style', plugins_url( EDGE_NEWS_REL_PATH . '/assets/css/news-responsive.min.css' ), $array_deps_css_responsive );
		wp_enqueue_script( 'edgtf_news_script', plugins_url( EDGE_NEWS_REL_PATH . '/assets/js/news.min.js' ), $array_deps_js, false, true );
	}
	
	add_action( 'wp_enqueue_scripts', 'edgtf_news_scripts' );
}