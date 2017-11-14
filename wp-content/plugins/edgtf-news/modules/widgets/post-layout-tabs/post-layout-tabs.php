<?php

class EdgefNewsClassPostLayoutTabs extends EdgefNewsPhpClassWidget {
	
	public function __construct() {
		parent::__construct(
			'edgtf_post_layout_tabs_widget', // Base ID
			'Edge Post Layout Tabs Widget' // Name
		);

		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'column_number',
				'title'   => esc_html__( 'Number of Columns', 'edgtf-news' ),
				'options' => array(
					4 => esc_html__( 'Four Columns', 'edgtf-news' ),
					1 => esc_html__( 'One Column', 'edgtf-news' ),
					2 => esc_html__( 'Two Columns', 'edgtf-news' ),
					3 => esc_html__( 'Three Columns', 'edgtf-news' ),
					5 => esc_html__( 'Five Columns', 'edgtf-news' ),
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'space_between_items',
				'title'   => esc_html__( 'Space Between Items', 'edgtf-news' ),
				'options' => array_flip( mediadesk_edge_get_space_between_items_array( true, true, true, true ) )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'category_id_1',
				'title'   => esc_html__( 'First Category', 'edgtf-news' ),
				'options' => edgtf_news_get_post_categories()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'category_id_2',
				'title'   => esc_html__( 'Second Category', 'edgtf-news' ),
				'options' => edgtf_news_get_post_categories()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'category_id_3',
				'title'   => esc_html__( 'Third Category', 'edgtf-news' ),
				'options' => edgtf_news_get_post_categories(),
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'category_id_4',
				'title'   => esc_html__( 'Fourth Category', 'edgtf-news' ),
				'options' => edgtf_news_get_post_categories()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'sort',
				'title'   => esc_html__( 'Sort', 'edgtf-news' ),
				'options' => array_flip( array(
					esc_html__( 'Default', 'edgtf-news' )               => '',
					esc_html__( 'Latest', 'edgtf-news' )                => 'latest',
					esc_html__( 'Random', 'edgtf-news' )                => 'random',
					esc_html__( 'Random Posts Today', 'edgtf-news' )    => 'random_today',
					esc_html__( 'Random in Last 7 Days', 'edgtf-news' ) => 'random_seven_days',
					esc_html__( 'Most Commented', 'edgtf-news' )        => 'comments',
					esc_html__( 'Title', 'edgtf-news' )                 => 'title',
					esc_html__( 'Popular', 'edgtf-news' )               => 'popular',
					esc_html__( 'Featured Posts First', 'edgtf-news' )  => 'featured_first',
					esc_html__( 'Trending Posts First', 'edgtf-news' )  => 'trending_first',
					esc_html__( 'Hot Posts First', 'edgtf-news' )       => 'hot_first',
					esc_html__( 'By Reaction', 'edgtf-news' )           => 'reactions'
				) )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'custom_image_width',
				'title'       => esc_html__( 'Image Width (px)', 'edgtf-news' ),
				'description' => esc_html__( 'Set custom image width (px)', 'edgtf-news' ),
			),
			array(
				'type'        => 'textfield',
				'name'        => 'custom_image_height',
				'title'       => esc_html__( 'Image Height (px)', 'edgtf-news' ),
				'description' => esc_html__( 'Set custom image height (px)', 'edgtf-news' ),
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'edgtf-news' ),
				'options' => mediadesk_edge_get_title_tag( true )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'title_length',
				'title'       => esc_html__( 'Title Max Characters', 'edgtf-news' ),
				'description' => esc_html__( 'Enter max character of title post list that you want to display', 'edgtf-news' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'display_date',
				'title'   => esc_html__( 'Display Date', 'edgtf-news' ),
				'options' => mediadesk_edge_get_yes_no_select_array( false, true )
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Display Categories', 'edgtf-news' ),
				'name'    => 'display_categories',
				'options' => mediadesk_edge_get_yes_no_select_array( false )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'date_format',
				'title'       => esc_html__( 'Date Format', 'edgtf-news' ),
				'options'     => array(
					''           => esc_html__( 'Default', 'edgtf-news' ),
					'difference' => esc_html__( 'Time from Publication', 'edgtf-news' ),
					'published'  => esc_html__( 'Date of Publication', 'edgtf-news' )
				),
				'description' => esc_html__( 'Enter the date format that you want to display', 'edgtf-news' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'display_post_type_icon',
				'title'   => esc_html__( 'Display Post Type Icon', 'edgtf-news' ),
				'options' => mediadesk_edge_get_yes_no_select_array( false )
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		//prepare variables
		if ( is_array( $instance ) && count( $instance ) ) {
			$params_label                    = 'params';
			$categories                      = array();
			$instance['posts_per_page']      = $instance['column_number'];
			$instance['image_size']          = 'custom';
			$instance['custom_image_width']  = $instance['custom_image_width'] != '' ? $instance['custom_image_width'] : '320';
			$instance['custom_image_height'] = $instance['custom_image_height'] != '' ? $instance['custom_image_height'] : '200';
			$instance['date_format']         = $instance['date_format'] != '' ? $instance['date_format'] : 'difference';
			$instance['space_between_items'] = $instance['space_between_items'] != '' ? $instance['space_between_items'] : 'normal';
			$instance['display_like']        = 'no';
			$instance['display_comments']    = 'no';
			
			for ( $i = 1; $i <= 4; $i ++ ) {
				${$params_label . $i} = '';
				$categories[ $i ]     = $instance[ 'category_id_' . $i ];
				unset( $instance[ 'category_id_' . $i ] );
			}

			//generate shortcode params
			for ( $i = 1; $i <= 4; $i ++ ) {
				foreach ( $instance as $key => $value ) {
					${$params_label . $i} .= " " . $key . " = '" . $value . "' ";
				}
				if( $categories[ $i ] !== 'all' ) {
					${$params_label . $i} .= " category_name = '" . $categories[ $i ] . "' ";
				}
			}

			$html = '<div class="widget edgtf-plw-tabs">';
			$html .= '<div class="edgtf-plw-tabs-inner">';
			$html .= '<div class="edgtf-plw-tabs-tabs-holder">';

			foreach ( $categories as $key => $value ) {
				$term          = get_category_by_slug( $value );
				$category_name = $value !== 'all' ? esc_attr( $term->name ) : esc_html__( 'All', 'edgtf-news' );
				$html          .= '<h5 class="edgtf-plw-tabs-tab"><a href="#"><span class="item_text">' . $category_name . '</span></a></h5>';
			}

			$html .= '</div>'; //close div.edgtf-plw-tabs-tabs-holder

			$html .= '<div class="edgtf-plw-tabs-content-holder">';

			for ( $i = 1; $i <= count($categories); $i++ ) {
				$html .= '<div class="edgtf-plw-tabs-content">';
				$html .= do_shortcode( '[edgtf_layout2 ' . ${$params_label . $i} . ']' ); // XSS OK
				$html .= '</div>';
			}

			$html .= '</div>'; //close div.edgtf-plw-tabs-content-holder
			$html .= '</div>'; //close div.edgtf-plw-tabs-inner
			$html .= '</div>'; //close div.edgtf-plw-tabs

			echo wp_kses_post( $html );
		}
	}
}