<?php

namespace EdgefNews\CPT\Shortcodes\Layout5;

use EdgefNews\Lib;

class Layout5 extends Lib\NewsShortcodes {
	private $base;
	private $css_class;
	private $shortcode_title;
	private $icon_class;
	
	function __construct() {
		$this->base            = 'edgtf_layout5';
		$this->css_class       = 'edgtf-layout5';
		$this->shortcode_title = esc_html__( 'Layout 5', 'edgtf-news' );
		$this->icon_class      = 'layout5';
		
		parent::__construct( $this->base, $this->css_class, $this->shortcode_title, $this->icon_class );
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function getDefaultParams() {
		$default_atts = array(
			'title_tag'           => 'h2',
			'image_size'          => 'full',
			'custom_image_width'  => '',
			'custom_image_height' => '',
			'display_categories'  => 'yes',
			'display_date'        => 'yes',
			'date_format'         => 'difference',
			'display_author'      => 'yes',
			'display_comments'    => 'yes',
			'display_like'        => 'yes',
			'display_review'      => 'yes'
		);
		
		return $default_atts;
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = $this->getDefaultParams();
		$params       = shortcode_atts( $default_atts, $atts );
		
		//Get HTML from template
		$html = edgtf_news_get_shortcode_module_template_part( 'templates/layout5-template', 'layout5', '', $params );
		
		return $html;
	}
	
	public function getShortcodeParams( $exclude_options = array() ) {
		$params_general_excluded   = array(
			'skin',
			'block_proportion'
		);
		
		$params_post_item_excluded = array(
			'display_excerpt',
			'excerpt_length',
			'display_views',
			'display_share',
			'display_hot_trending_icons'
		);
		
		// General Options - start
		$params_general_array = edgtf_news_get_general_shortcode_params( $params_general_excluded );
		// General Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_post_item_shortcode_params( $params_post_item_excluded );
		// Post Item Options - end
		
		// Additional Options - start
		$params_additional_array = array(
			array(
				'type'       => 'dropdown',
				'param_name' => 'display_review',
				'heading'    => esc_html__( 'Display Review', 'edgtf-news' ),
				'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
				'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
			)
		);
		// Additional Options - end
		
		// Pagination Options - start
		$params_pagination_array = edgtf_news_get_pagination_shortcode_params();
		// Pagination Options - end
		
		$params_array = array_merge(
			$params_general_array,
			$params_post_item_array,
			$params_additional_array,
			$params_pagination_array
		);
		
		if ( is_array( $exclude_options ) && count( $exclude_options ) ) {
			foreach ( $exclude_options as $exclude_key ) {
				foreach ( $params_array as $params_item ) {
					if ( $exclude_key == $params_item['param_name'] ) {
						$key = array_search( $params_item, $params_array );
						unset( $params_array[ $key ] );
					}
				}
			}
		}
		
		return $params_array;
	}
}