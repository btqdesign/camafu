<?php

namespace EdgefNews\CPT\Shortcodes\MasonryLayout;

use EdgefNews\Lib;

class MasonryLayout extends Lib\NewsShortcodes {
	private $base;
	private $css_class;
	private $shortcode_title;
	private $icon_class;
	
	function __construct() {
		$this->base            = 'edgtf_masonry_layout';
		$this->css_class       = 'edgtf-masonry-layout';
		$this->shortcode_title = esc_html__( 'Masonry Layout', 'edgtf-news' );
		$this->icon_class      = 'masonry-layout';
		
		parent::__construct( $this->base, $this->css_class, $this->shortcode_title, $this->icon_class );
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function getDefaultParams() {
		$default_atts = array(
			'title_tag'                  => 'h4',
			'display_date'               => 'yes',
			'date_format'                => 'difference',
			'display_excerpt'            => 'yes',
			'excerpt_length'             => '',
			'display_like'               => 'yes',
			'display_comments'           => 'yes',
			'display_share'              => 'yes',
			'display_hot_trending_icons' => 'no',
			'masonry_proportions'        => ''
		);
		
		return $default_atts;
	}
	
	public function render( $atts, $content = null ) {
		$default_atts        = $this->getDefaultParams();
		$params              = shortcode_atts( $default_atts, $atts );
		$params['post_info'] = $this->getPostSize( $params );
		
		//Get HTML from template
		$html = edgtf_news_get_shortcode_module_template_part( 'templates/masonry-layout-template', 'masonry-layout', '', $params );
		
		return $html;
	}
	
	public function renderQuery( $params, $content = null, $ajax_call = false ) {
		$html          = '';
		$inner_classes = $this->getHolderInnerClasses();
		$inner_data    = $this->getHolderInnerData( $params );
		
		if ( $params['masonry_proportions'] == 'fixed' ) {
			$inner_classes .= ' edgtf-masonry-layout-image-fixed';
		}
		
		if ( $params['query_result']->have_posts() ) {
			if ( ! $ajax_call ) {
				$html .= '<div ' . mediadesk_edge_get_class_attribute( $inner_classes ) . ' ' . $inner_data . '>';
			}
			$html .= '<div class="edgtf-masonry-layout-sizer"></div>';
			$html .= '<div class="edgtf-masonry-layout-gutter"></div>';
			
			while ( $params['query_result']->have_posts() ) : $params['query_result']->the_post();
				$html .= $this->render( $params );
			endwhile;
			
			if ( ! $ajax_call ) {
				$html .= '</div>'; //closing of edgtf-news-list-inner
			}
		} else {
			$html .= $this->errorMessage();
		}
		
		wp_reset_postdata();
		
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
			'display_categories',
			'display_author',
			'display_views'
		);
		
		// Masonry Options - start
		$params_masonry_array = array(
			array(
				'type'        => 'dropdown',
				'param_name'  => 'masonry_proportions',
				'heading'     => esc_html__( 'Masonry Image Proportions', 'edgtf-news' ),
				'value'       => array(
					esc_html__( 'Default', 'edgtf-news' )  => '',
					esc_html__( 'Fixed', 'edgtf-news' )    => 'fixed',
					esc_html__( 'Original', 'edgtf-news' ) => 'original'
				),
				'description' => esc_html__( 'Dimensions are taken from single post options', 'edgtf-news' ),
				'group'       => esc_html__( 'General', 'edgtf-news' ),
			)
		);
		// Masonry Options - end
		
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
			$params_masonry_array,
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
	
	public function getNewsShortcodesHolderDataParams( $params ) {
		$data_params_string = edgtf_news_get_holder_data_params( $params, $this->base );
		$masonry_proportion = $params['masonry_proportions'];
		
		if ( isset( $masonry_proportion ) && $masonry_proportion !== '' ) {
			$data_params_string .= ' data-masonry-proportions=' . esc_attr( $masonry_proportion );
		}
		
		return $data_params_string;
	}
	
	private function getPostSize( $params ) {
		$post_info = array();
		
		$image_proportion = 'original';
		
		if ( $params['masonry_proportions'] !== '' ) {
			$image_proportion = $params['masonry_proportions'];
		}
		$image_proportion_value = get_post_meta( get_the_ID(), 'edgtf_blog_masonry_gallery_' . $image_proportion . '_dimensions_meta', true );
		
		if ( isset( $image_proportion_value ) && $image_proportion_value !== '' ) {
			$size               = $image_proportion_value !== '' ? $image_proportion_value : 'default';
			$post_info['class'] = 'edgtf-news-masonry-post-size-' . $size;
		} else {
			$size               = 'default';
			$post_info['class'] = 'edgtf-news-masonry-post-size-default';
		}
		
		if ( $image_proportion == 'original' ) {
			$post_info['image_size'] = 'full';
		} else {
			switch ( $size ):
				case 'default':
					$post_info['image_size'] = 'mediadesk_edge_image_square';
					break;
				case 'large-width':
					$post_info['image_size'] = 'mediadesk_edge_image_landscape';
					break;
				case 'large-height':
					$post_info['image_size'] = 'mediadesk_edge_image_portrait';
					break;
				case 'large-width-height':
					$post_info['image_size'] = 'mediadesk_edge_image_huge';
					break;
				default:
					$post_info['image_size'] = 'mediadesk_edge_image_square';
					break;
			endswitch;
		}
		
		return $post_info;
	}
}