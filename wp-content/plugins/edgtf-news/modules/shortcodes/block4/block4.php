<?php

namespace EdgefNews\CPT\Shortcodes\Block4;

use EdgefNews\Lib;

class Block4 extends Lib\NewsShortcodes {
	private $base;
	private $css_class;
	private $shortcode_title;
	private $icon_class;
	
	function __construct() {
		$this->base            = 'edgtf_block4';
		$this->css_class       = 'edgtf-block4';
		$this->shortcode_title = esc_html__( 'Block 4', 'edgtf-news' );
		$this->icon_class      = 'block4';
		
		parent::__construct( $this->base, $this->css_class, $this->shortcode_title, $this->icon_class );
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function getDefaultParams() {
		$default_atts = array(
			'title_tag'    => 'h4',
			'display_date' => 'yes',
			'date_format'  => 'difference'
		);
		
		return $default_atts;
	}
	
	public function getDefaultFeaturedParams() {
		$featured_atts = array(
			'featured_title_tag'           => 'h2',
			'featured_image_size'          => 'full',
			'featured_custom_image_width'  => '',
			'featured_custom_image_height' => '',
			'featured_display_categories'  => 'yes',
			'featured_display_date'        => 'yes',
			'featured_date_format'         => 'difference',
			'featured_display_author'      => 'yes',
			'featured_display_comments'    => 'yes',
			'featured_display_like'        => 'yes',
			'featured_display_review'      => 'yes'
		);
		
		return $featured_atts;
	}
	
	public function render( $atts, $content = null ) {
		$default_atts  = $this->getDefaultParams();
		$featured_atts = $this->getDefaultFeaturedParams();
		
		$params          = shortcode_atts( $default_atts, $atts );
		$featured_params = shortcode_atts( $featured_atts, $atts );
		$featured_params = edgtf_news_get_filtered_params( $featured_params, 'featured' );
		
		$html = '';
		
		if ( $atts['post_number'] == '1' ) {
			//Get HTML from template
			$html .= edgtf_news_get_shortcode_module_template_part( 'templates/layout5-template', 'layout5', '', $featured_params );
		} else {
			//Get HTML from template
			$html .= edgtf_news_get_shortcode_module_template_part( 'templates/layout7-template', 'layout7', '', $params );
		}
		
		return $html;
	}
	
	public function getShortcodeParams( $exclude_options = array() ) {
		$params_general_excluded = array(
			'column_number',
			'show_filter',
			'filter_by'
		);
		
		$params_featured_post_item_excluded = array (
			'featured_display_excerpt',
			'featured_excerpt_length',
			'featured_display_views',
			'featured_display_share',
			'featured_display_hot_trending_icons'
		);
		
		$params_post_item_excluded = array(
			'image_size',
			'custom_image_width',
			'custom_image_height',
			'display_excerpt',
			'excerpt_length',
			'display_categories',
			'display_author',
			'display_views',
			'display_like',
			'display_comments',
			'display_share',
			'display_hot_trending_icons'
		);
		
		// General Options - start
		$params_general_array = edgtf_news_get_general_shortcode_params( $params_general_excluded );
		// General Options - end
		
		// Featured Post Item Options - start
		$params_featured_post_item_array = edgtf_news_get_featured_post_item_shortcode_params( $params_featured_post_item_excluded );
		// Featured Post Item Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_post_item_shortcode_params( $params_post_item_excluded );
		// Post Item Options - end
		
		// Pagination Options - start
		$params_pagination_array = edgtf_news_get_pagination_shortcode_params();
		// Pagination Options - end
		
		$params_array = array_merge(
			$params_general_array,
			$params_featured_post_item_array,
			$params_post_item_array,
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
	
	public function isBlockElement() {
		return true;
	}
}