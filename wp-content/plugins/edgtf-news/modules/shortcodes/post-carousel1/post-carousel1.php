<?php

namespace EdgefNews\CPT\Shortcodes\PostCarousel1;

use EdgefNews\Lib;

class PostCarousel1 extends Lib\NewsShortcodes {
	private $base;
	private $css_class;
	private $shortcode_title;
	private $icon_class;
	
	function __construct() {
		$this->base            = 'edgtf_post_carousel1';
		$this->css_class       = 'edgtf-post-carousel1';
		$this->shortcode_title = esc_html__( 'Post Carousel 1', 'edgtf-news' );
		$this->icon_class      = 'post-carousel1';
		
		parent::__construct( $this->base, $this->css_class, $this->shortcode_title, $this->icon_class );
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function getDefaultParams() {
		$default_atts = array(
			'title_tag'                  => 'h3',
			'image_size'                 => 'full',
			'display_categories'         => 'yes',
			'display_date'               => 'yes',
			'date_format'                => 'difference',
			'display_excerpt'            => 'yes',
			'excerpt_length'             => '',
			'display_like'               => 'yes',
			'display_comments'           => 'yes',
			'display_share'              => 'yes',
			'display_hot_trending_icons' => 'no'
		);
		
		return $default_atts;
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = $this->getDefaultParams();
		$params       = shortcode_atts( $default_atts, $atts );
		
		if ( $params['image_size'] === 'custom' ) {
			$params['image_size'] = 'full';
		}
		
		//Get HTML from template
		$html = edgtf_news_get_shortcode_module_template_part( 'templates/layout4-template', 'layout4', '', $params );
		
		return $html;
	}
	
	public function getAdditionalHolderInnerData() {
		$data['data-slider-animate-in']  = '';
		$data['data-slider-animate-out'] = '';
		
		return $data;
	}
	
	public function getShortcodeParams( $exclude_options = array() ) {
		$params_general_excluded = array(
			'column_number',
			'space_between_items',
			'block_proportion',
			'show_filter',
			'filter_by',
			'layout_title',
			'layout_title'
		);
		
		$params_post_item_excluded = array(
			'custom_image_width',
			'custom_image_height',
			'display_author',
			'display_views'
		);
		
		$params_navigation_excluded = array(
			'number_of_visible_items'
		);
		
		// General Options - start
		$params_general_array = edgtf_news_get_general_shortcode_params( $params_general_excluded );
		// General Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_post_item_shortcode_params( $params_post_item_excluded );
		// Post Item Options - end
		
		// Slider Settings Options - start
		$params_navigation_array = edgtf_news_get_slider_shortcode_params( $params_navigation_excluded );
		// Slider Settings Options - end
		
		$params_array = array_merge(
			$params_general_array,
			$params_post_item_array,
			$params_navigation_array
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
	
	public function isSlider() {
		return true;
	}
}