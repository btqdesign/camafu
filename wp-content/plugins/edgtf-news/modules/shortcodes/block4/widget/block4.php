<?php

class EdgefNewsClassWidgetBlock4 extends EdgefNewsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_block4_widget',
			esc_html__( 'Edge Block 4 Widget', 'edgtf-news' ),
			array( 'description' => esc_html__( 'Display a block 4', 'edgtf-news' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		// General Options - start
		$params_general_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_general_shortcode_params( array(
			'category_name',
			'block_proportion',
			'column_number',
			'skin',
			'show_filter',
			'filter_by',
			'layout_title',
			'layout_title_tag'
		) ) );
		// General Options - end
		
		// Featured Post Item Options - start
		$params_featured_post_item_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_featured_post_item_shortcode_params( array(
			'featured_display_excerpt',
			'featured_excerpt_length',
			'featured_display_categories',
			'featured_display_date',
			'featured_date_format',
			'featured_display_author',
			'featured_display_views',
			'featured_display_like',
			'featured_display_comments',
			'featured_display_share',
			'featured_display_hot_trending_icons'
		) ) );
		// Featured Post Item Options - end
		
		// Post Item Options - start
		$params_post_item_array = edgtf_news_get_widget_params_from_VC( edgtf_news_get_post_item_shortcode_params( array(
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
		) ) );
		// Post Item Options - end
		
		$params_featured_post_item_new_array = array();
		
		foreach ( $params_featured_post_item_array as $featured_params_item ) {
			$featured_params_item['title']         = esc_html__( 'Featured ', 'edgtf-news' ) . $featured_params_item['title'];
			$params_featured_post_item_new_array[] = $featured_params_item;
		}
		
		$this->params = array_merge(
			array(
				array(
					'type' => 'textfield',
					'name' => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'edgtf-news' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'widget_layout',
					'title'   => esc_html__( 'Widget Layout', 'edgtf-news' ),
					'options' => array(
						''      => esc_html__( 'Default', 'edgtf-news' ),
						'boxed' => esc_html__( 'Boxed', 'edgtf-news' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'category_id_1',
					'title'   => esc_html__( 'First Category', 'edgtf-news' ),
					'options' => edgtf_news_get_post_categories( true )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'category_id_2',
					'title'   => esc_html__( 'Second Category', 'edgtf-news' ),
					'options' => edgtf_news_get_post_categories( true )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'category_id_3',
					'title'   => esc_html__( 'Third Category', 'edgtf-news' ),
					'options' => edgtf_news_get_post_categories( true )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'button_text',
					'title'   => esc_html__( 'Button Text', 'edgtf-news' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Button Link Target', 'edgtf-news' ),
					'options' => mediadesk_edge_get_link_target_array()
				),
			),
			$params_general_array,
			$params_featured_post_item_new_array,
			$params_post_item_array
		);
	}
	
	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		$instance['featured_display_categories'] = 'no';
		$instance['featured_display_date']       = 'no';
		$instance['featured_display_author']     = 'no';
		$instance['featured_display_like']       = 'no';
		$instance['featured_display_comments']   = 'no';
		$instance['button_text']   = ! empty($instance['button_text']) ? $instance['button_text'] : '';
		$instance['button_link']   = ! empty($instance['button_link']) ? $instance['button_link'] : '';
		$instance['target']        = ! empty($instance['target']) ? $instance['target'] : '_self';

		$categories = array();
		for ( $i = 1; $i <= 3; $i ++ ) {
			$categories[ $i ] = isset($instance[ 'category_id_' . $i ]) ? $instance[ 'category_id_' . $i ] : '';
			unset( $instance[ 'category_id_' . $i ] );
		}

		// Check for duplicate categories
		if ( is_array( $categories ) && ( ! empty( $categories[0] ) || ! empty( $categories[1] ) || ! empty( $categories[2] ) ) ) {
			$categories = array_flip( $categories );
			array_unique( $categories );
			$categories = array_flip( $categories );
		}
		
		$widget_holder_classes = '';
		if ( isset($instance['widget_layout']) && $instance['widget_layout'] === 'boxed' ) {
			$widget_holder_classes = 'edgtf-news-block4-boxed';
		}

		$html = '<div class="widget edgtf-news-widget edgtf-news-block4-widget '.esc_attr($widget_holder_classes).'">';
		if ( ! empty( $instance['widget_title'] ) ) {
			$html .= wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
		}

		$html .= '<div class="edgtf-plw-tabs-2">';
		$html .= '<div class="edgtf-plw-tabs-inner">';
		$html .= '<ul class="edgtf-plw-tabs-tabs-holder">';

		foreach ( $categories as $key => $value ) {
			if ($value !== 'no') {
				$term          = get_category_by_slug( $value );
				$category_name = $value != 'all' && ! empty($term) ? esc_attr( $term->name ) : esc_html__( 'All', 'edgtf-news' );
				$html          .= '<li class="edgtf-plw-tabs-tab"><a href="#"><span class="item_text">' . esc_html($category_name) . '</span></a></li>';
			}
		}

		$html .= '</ul>'; //close div.edgtf-plw-tabs-tabs-holder

		$html .= '<div class="edgtf-plw-tabs-content-holder">';

		for ( $i = 1; $i <= count($categories); $i++ ) {
			if ( 'all' !== $categories[$i] && 'no' !== $categories[$i] ) {
				$instance['category_name'] = $categories[$i];
			} else {
				$instance['category_name'] = '';
			}
			$term  = get_category_by_slug( $categories[$i] );
			if ( ! empty($term) ) {
				$link  = get_category_link( $term->term_id );
			}
			$html .= '<div class="edgtf-plw-tabs-content">';
			$html .= mediadesk_edge_execute_shortcode( 'edgtf_block4', $instance ); // XSS OK
			if ( ! empty($link) ) {
				$html .= '<div class="edgtf-tabs-button-wrap">';
				$html .= sprintf('<a href="%s" class="edgtf-read-more-tabs"><span class="edgtf-btn-text">%s</span><span class="edgtf-arow-wrapper"><span class="edgtf-rm-arrow" target="%s"></span><span class="edgtf-rm-line"></span></span></a>', esc_url($link), esc_html($instance['button_text']), esc_attr($instance['target']) );
				$html .= '</div>';
			}
			$html .= '</div>';
		}

		$html .= '</div>'; //close div.edgtf-plw-tabs-content-holder
		$html .= '</div>'; //close div.edgtf-plw-tabs-inner
		$html .= '</div>'; //close div.edgtf-plw-tabs
		$html .= '</div>'; //close div.edgtf-news-block4-widget

		echo wp_kses_post($html);
	}
}