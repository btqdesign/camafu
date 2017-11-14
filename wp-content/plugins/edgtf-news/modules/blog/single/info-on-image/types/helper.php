<?php

if ( ! function_exists( 'edgtf_news_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function edgtf_news_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'edgtf-container';
		$params_list['inner']  = 'edgtf-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'edgtf_news_blog_holder_params', 'edgtf_news_get_blog_holder_params' );
}
