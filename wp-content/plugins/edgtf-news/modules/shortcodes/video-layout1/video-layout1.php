<?php

namespace EdgefNews\CPT\Shortcodes\VideoLayout1;

use EdgefNews\Lib;

class VideoLayout1 extends Lib\NewsShortcodes {
	private $base;
	private $css_class;
	private $shortcode_title;
	private $icon_class;
	
	function __construct() {
		$this->base            = 'edgtf_video_layout1';
		$this->css_class       = 'edgtf-video-layout1';
		$this->shortcode_title = esc_html__( 'Video Layout 1', 'edgtf-news' );
		$this->icon_class      = 'video-layout1';
		
		parent::__construct( $this->base, $this->css_class, $this->shortcode_title, $this->icon_class );
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function getDefaultParams() {
		$default_atts = array(
			'title_tag'          => 'h3',
			'display_excerpt'    => 'no',
			'excerpt_length'     => '',
			'display_categories' => 'no',
			'display_date'       => 'no',
			'date_format'        => '',
			'display_like'       => 'yes',
			'display_comments'   => 'yes',
			'display_share'      => 'yes'
		);
		
		return $default_atts;
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = $this->getDefaultParams();
		$params       = shortcode_atts( $default_atts, $atts );
		
		$post_id                  = get_the_ID();
		$params['video_type']     = get_post_meta( $post_id, "edgtf_video_type_meta", true );
		$params['has_video_link'] = get_post_meta( $post_id, "edgtf_post_video_custom_meta", true ) !== '' || get_post_meta( $post_id, "edgtf_post_video_link_meta", true ) !== '';
		
		if ( $params['video_type'] == 'social_networks' ) {
			$params['video_link'] = get_post_meta( $post_id, "edgtf_post_video_link_meta", true );
		} else {
			$params['video_link']  = get_post_meta( $post_id, "edgtf_post_video_custom_meta", true );
			$params['video_image'] = get_post_meta( $post_id, "edgtf_post_video_image_meta", true);
			$params['flash_media'] = get_template_directory_uri() . '/assets/js/flashmediaelement.swf';
		}
		
		$html = '';
		
		if ( $params['has_video_link'] ) {
			//Get HTML from template
			$html = edgtf_news_get_shortcode_module_template_part( 'templates/video-layout1-template', 'video-layout1', '', $params );
		}
		
		return $html;
	}
	
	public function getShortcodeParams( $exclude_options = array() ) {
		$params_general_excluded = array(
			'block_proportion'
		);
		
		$params_post_item_excluded = array(
			'image_size',
			'custom_image_width',
			'custom_image_height',
			'display_author',
			'display_views',
			'display_hot_trending_icons'
		);
		
		// General Options - start
		$params_general_array = edgtf_news_get_general_shortcode_params( $params_general_excluded );
		// General Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_post_item_shortcode_params( $params_post_item_excluded );
		// Post Item Options - end
		
		// Pagination Options - start
		$params_pagination_array = edgtf_news_get_pagination_shortcode_params();
		// Pagination Options - end
		
		$params_array = array_merge(
			$params_general_array,
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
	
	public function isVideoElement() {
		return true;
	}
}