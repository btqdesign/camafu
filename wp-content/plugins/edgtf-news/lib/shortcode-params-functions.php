<?php
/**
 *
 * General Group Visual Composer options for News Shortcodes
 *
 */

if ( ! function_exists( 'edgtf_news_get_general_shortcode_params' ) ) {
	/**
	 * Function that returns array of general predefined params formatted for Visual Composer
	 *
	 * @return array of params
	 *
	 */
	function edgtf_news_get_general_shortcode_params( $exclude_options = array() ) {
		$params_array = array();
		
		// General Options - start
		
		$params_array[] = array(
			'type'       => 'textfield',
			'param_name' => 'extra_class_name',
			'heading'    => esc_html__( 'Extra Class Name', 'edgtf-news' ),
			'group'      => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'skin',
			'heading'    => esc_html__( 'Skin', 'edgtf-news' ),
			'value'      => array(
				esc_html__( 'Default', 'edgtf-news' ) => '',
				esc_html__( 'Light', 'edgtf-news' )   => 'light'
			),
			'save_always' => true,
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'posts_per_page',
			'heading'     => esc_html__( 'Number of Posts', 'edgtf-news' ),
			'value'       => '6',
			'save_always' => true,
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'column_number',
			'heading'    => esc_html__( 'Number of Columns', 'edgtf-news' ),
			'value'      => array(
				esc_html__( 'Default', 'edgtf-news' ) => '',
				esc_html__( 'One', 'edgtf-news' )     => 1,
				esc_html__( 'Two', 'edgtf-news' )     => 2,
				esc_html__( 'Three', 'edgtf-news' )   => 3,
				esc_html__( 'Four', 'edgtf-news' )    => 4,
				esc_html__( 'Five', 'edgtf-news' )    => 5
			),
			'group'      => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'block_proportion',
			'heading'     => esc_html__( 'Block Proportion', 'edgtf-news' ),
			'value'       => array(
				'1/2+1/2' => 'two-half',
				'2/3+1/3' => 'two-third-one-third',
				'1/3+2/3' => 'one-third-two-third',
				'3/4+1/4' => 'three-fourths-one-fourth',
			),
			'save_always' => true,
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'space_between_items',
			'heading'     => esc_html__( 'Space Between Items', 'edgtf-news' ),
			'value'       => array_flip( mediadesk_edge_get_space_between_items_array( false, true, true, true ) ),
			'save_always' => true,
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'autocomplete',
			'param_name'  => 'category_name',
			'heading'     => esc_html__( 'Category', 'edgtf-news' ),
			'settings'    => array(
				'multiple'      => true,
				'sortable'      => true,
				'unique_values' => true
			),
			'description' => esc_html__( 'Enter the categories of the posts you want to display (leave empty for showing all categories)', 'edgtf-news' ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'autocomplete',
			'param_name'  => 'author_id',
			'heading'     => esc_html__( 'Author', 'edgtf-news' ),
			'settings'    => array(
				'multiple'      => true,
				'sortable'      => true,
				'unique_values' => true
			),
			'description' => esc_html__( 'Enter the authors of the posts you want to display (leave empty for showing all authors)', 'edgtf-news' ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'autocomplete',
			'param_name'  => 'tag',
			'heading'     => esc_html__( 'Tag', 'edgtf-news' ),
			'settings'    => array(
				'multiple'      => true,
				'sortable'      => true,
				'unique_values' => true
			),
			'description' => esc_html__( 'Enter the tags of the posts you want to display (leave empty for showing all tags)', 'edgtf-news' ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'autocomplete',
			'param_name'  => 'post_in',
			'heading'     => esc_html__( 'Include Posts', 'edgtf-news' ),
			'settings'    => array(
				'multiple'      => true,
				'sortable'      => true,
				'unique_values' => true
			),
			'description' => esc_html__( 'Enter the IDs or Titles of the posts you want to display', 'edgtf-news' ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'autocomplete',
			'param_name'  => 'post_not_in',
			'heading'     => esc_html__( 'Exclude Posts', 'edgtf-news' ),
			'settings'    => array(
				'multiple'      => true,
				'sortable'      => true,
				'unique_values' => true
			),
			'description' => esc_html__( 'Enter the IDs or Titles of the posts you want to exclude', 'edgtf-news' ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'sort',
			'heading'     => esc_html__( 'Sort', 'edgtf-news' ),
			'value'       => array(
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
			),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'autocomplete',
			'param_name'  => 'reaction',
			'heading'     => esc_html__( 'Reaction', 'edgtf-news' ),
			'description' => esc_html__( 'Choose the reaction which you would like to use for sorting your posts. The posts that have the greatest number of your chosen reaction will be displayed first.', 'edgtf-news' ),
			'settings'    => array(
				'multiple'      => false,
				'sortable'      => true,
				'unique_values' => true
			),
			'dependency'  => array( 'element' => 'sort', 'value'   => array( 'reactions' ) ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'order',
			'heading'     => esc_html__( 'Order', 'edgtf-news' ),
			'value'       => array_flip( mediadesk_edge_get_query_order_array() ),
			'dependency'  => array( 'element' => 'sort', 'value'   => array( 'title' ) ),
			'save_always' => true,
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'offset',
			'heading'     => esc_html__( 'Offset', 'edgtf-news' ),
			'save_always' => true,
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'show_filter',
			'heading'    => esc_html__( 'Show Filter', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'filter_by',
			'heading'     => esc_html__( 'Filter By', 'edgtf-news' ),
			'value'       => array(
				esc_html__( 'Category', 'edgtf-news' ) => 'category',
				esc_html__( 'Tag', 'edgtf-news' )      => 'tag',
			),
			'save_always' => true,
			'dependency'  => array( 'element' => 'show_filter', 'value' => 'yes' ),
			'group'       => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'textfield',
			'param_name' => 'layout_title',
			'heading'    => esc_html__( 'Layout Title', 'edgtf-news' ),
			'group'      => esc_html__( 'General', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'layout_title_tag',
			'heading'    => esc_html__( 'Layout Title Tag', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_title_tag( true, array('span' => esc_html__('Custom Heading', 'mediadesk') ) ) ),
			'group'      => esc_html__( 'General', 'edgtf-news' )
		);
		
		// General Options - end
		
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

/**
 * General Featured Post Item Visual Composer options for News Shortcodes
 */
if ( ! function_exists( 'edgtf_news_get_featured_post_item_shortcode_params' ) ) {
	/**
	 * Function that returns array of featured post item predefined params formatted for Visual Composer
	 *
	 * @return array of params
	 *
	 */
	function edgtf_news_get_featured_post_item_shortcode_params( $exclude_options = array() ) {
		$params_array = array();
		
		// Post Options - Start
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_title_tag',
			'heading'    => esc_html__( 'Title Tag', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_title_tag( true ) ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'featured_image_size',
			'heading'     => esc_html__( 'Image Size', 'edgtf-news' ),
			'value'       => array(
				esc_html__( 'Default', 'edgtf-news' )   => '',
				esc_html__( 'Thumbnail', 'edgtf-news' ) => 'thumbnail',
				esc_html__( 'Medium', 'edgtf-news' )    => 'medium',
				esc_html__( 'Large', 'edgtf-news' )     => 'large',
				esc_html__( 'Landscape', 'edgtf-news' ) => 'mediadesk_edge_image_landscape',
				esc_html__( 'Portrait', 'edgtf-news' )  => 'mediadesk_edge_image_portrait',
				esc_html__( 'Square', 'edgtf-news' )    => 'mediadesk_edge_image_square',
				esc_html__( 'Full', 'edgtf-news' )      => 'full',
				esc_html__( 'Custom', 'edgtf-news' )    => 'custom'
			),
			'description' => esc_html__( 'Choose image size', 'edgtf-news' ),
			'group'       => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'featured_custom_image_width',
			'heading'     => esc_html__( 'Custom Image Width', 'edgtf-news' ),
			'description' => esc_html__( 'Enter image width in px', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'featured_image_size', 'value' => 'custom' ),
			'group'       => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'featured_custom_image_height',
			'heading'     => esc_html__( 'Custom Image Height', 'edgtf-news' ),
			'description' => esc_html__( 'Enter image height in px', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'featured_image_size', 'value' => 'custom' ),
			'group'       => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_categories',
			'heading'    => esc_html__( 'Display Categories', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_excerpt',
			'heading'    => esc_html__( 'Display Excerpt', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'featured_excerpt_length',
			'heading'     => esc_html__( 'Max. Excerpt Length', 'edgtf-news' ),
			'description' => esc_html__( 'Enter max of words that can be shown for excerpt', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'featured_display_excerpt', 'value' => array( '', 'yes' ) ),
			'group'       => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_date',
			'heading'    => esc_html__( 'Display Date', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_date_format',
			'heading'    => esc_html__( 'Publication Date Format', 'edgtf-news' ),
			'value'      => array(
				esc_html__( 'Default', 'edgtf-news' )               => '',
				esc_html__( 'Time from Publication', 'edgtf-news' ) => 'difference',
				esc_html__( 'Date of Publication', 'edgtf-news' )   => 'published'
			),
			'dependency' => array( 'element' => 'featured_display_date', 'value' => array( '', 'yes' ) ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_author',
			'heading'    => esc_html__( 'Display Author', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_comments',
			'heading'    => esc_html__( 'Display Comments', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_like',
			'heading'    => esc_html__( 'Display Like', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_views',
			'heading'    => esc_html__( 'Display Views', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_share',
			'heading'    => esc_html__( 'Display Share', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'featured_display_hot_trending_icons',
			'heading'    => esc_html__( 'Display Hot/Trending Icons', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Featured Post Item', 'edgtf-news' ),
		);
		
		// Post Options - end
		
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

/**
 * General Post Item Visual Composer options for News Shortcodes
 */
if ( ! function_exists( 'edgtf_news_get_post_item_shortcode_params' ) ) {
	/**
	 * Function that returns array of post item predefined params formatted for Visual Composer
	 *
	 * @return array of params
	 *
	 */
	function edgtf_news_get_post_item_shortcode_params( $exclude_options = array() ) {
		$params_array = array();
		
		// Post Options - Start
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'title_tag',
			'heading'    => esc_html__( 'Title Tag', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_title_tag( true, array( 'p' => 'p' ) ) ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'image_size',
			'heading'     => esc_html__( 'Image Size', 'edgtf-news' ),
			'value'       => array(
				esc_html__( 'Default', 'edgtf-news' )   => '',
				esc_html__( 'Thumbnail', 'edgtf-news' ) => 'thumbnail',
				esc_html__( 'Medium', 'edgtf-news' )    => 'medium',
				esc_html__( 'Large', 'edgtf-news' )     => 'large',
				esc_html__( 'Landscape', 'edgtf-news' ) => 'mediadesk_edge_image_landscape',
				esc_html__( 'Portrait', 'edgtf-news' )  => 'mediadesk_edge_image_portrait',
				esc_html__( 'Square', 'edgtf-news' )    => 'mediadesk_edge_image_square',
				esc_html__( 'Full', 'edgtf-news' )      => 'full',
				esc_html__( 'Custom', 'edgtf-news' )    => 'custom'
			),
			'description' => esc_html__( 'Choose image size', 'edgtf-news' ),
			'group'       => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'custom_image_width',
			'heading'     => esc_html__( 'Custom Image Width', 'edgtf-news' ),
			'description' => esc_html__( 'Enter image width in px', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'image_size', 'value' => 'custom' ),
			'group'       => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'custom_image_height',
			'heading'     => esc_html__( 'Custom Image Height', 'edgtf-news' ),
			'description' => esc_html__( 'Enter image height in px', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'image_size', 'value' => 'custom' ),
			'group'       => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_categories',
			'heading'    => esc_html__( 'Display Categories', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_excerpt',
			'heading'    => esc_html__( 'Display Excerpt', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'excerpt_length',
			'heading'     => esc_html__( 'Max. Excerpt Length', 'edgtf-news' ),
			'description' => esc_html__( 'Enter max of words that can be shown for excerpt', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( '', 'yes' ) ),
			'group'       => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_date',
			'heading'    => esc_html__( 'Display Date', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'date_format',
			'heading'    => esc_html__( 'Publication Date Format', 'edgtf-news' ),
			'value'      => array(
				esc_html__( 'Default', 'edgtf-news' )               => '',
				esc_html__( 'Time from Publication', 'edgtf-news' ) => 'difference',
				esc_html__( 'Date of Publication', 'edgtf-news' )   => 'published'
			),
			'dependency' => array( 'element' => 'display_date', 'value' => array( '', 'yes' ) ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_author',
			'heading'    => esc_html__( 'Display Author', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_comments',
			'heading'    => esc_html__( 'Display Comments', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_like',
			'heading'    => esc_html__( 'Display Like', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_views',
			'heading'    => esc_html__( 'Display Views', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_share',
			'heading'    => esc_html__( 'Display Share', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_hot_trending_icons',
			'heading'    => esc_html__( 'Display Hot/Trending Icons', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Post Item', 'edgtf-news' ),
		);
		
		// Post Options - end
		
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

/**
 * Pagination Group Visual Composer Options for Shortcodes
 */
if ( ! function_exists( 'edgtf_news_get_pagination_shortcode_params' ) ) {
	/**
	 * Function that returns array of pagination predefined params formatted for Visual Composer
	 *
	 * @return array of params
	 *
	 */
	function edgtf_news_get_pagination_shortcode_params( $exclude_options = array() ) {
		$params_array = array();
		
		// Pagination options - start
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'display_pagination',
			'heading'     => esc_html__( 'Display Pagination', 'edgtf-news' ),
			'value'       => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'save_always' => true,
			'group'       => esc_html__( 'Pagination', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'pagination_type',
			'heading'     => esc_html__( 'Pagination Type', 'edgtf-news' ),
			'value'       => array(
				esc_html__( 'Standard', 'edgtf-news' )        => 'standard',
				esc_html__( 'Simple Link', 'edgtf-news' )     => 'simple-link',
				esc_html__( 'Load More', 'edgtf-news' )       => 'load-more',
				esc_html__( 'Infinite Scroll', 'edgtf-news' ) => 'infinite-scroll'
			),
			'save_always' => true,
			'dependency'  => array( 'element' => 'display_pagination', 'value' => array( 'yes' ) ),
			'group'       => esc_html__( 'Pagination', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'pagination_numbers_amount',
			'heading'     => esc_html__( 'Amount of Navigation Numbers', 'edgtf-news' ),
			'description' => esc_html__( 'Enter a number that will limit pagination numbers amount', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'pagination_type', 'value' => array( '', 'standard' ) ),
			'group'       => esc_html__( 'Pagination', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'pagination_simple_link',
			'heading'     => esc_html__( 'Custom Link', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'pagination_type', 'value' => array( 'simple-link' ) ),
			'group'       => esc_html__( 'Pagination', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'pagination_simple_link_label',
			'heading'     => esc_html__( 'Custom Link Label', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'pagination_type', 'value' => array( 'simple-link' ) ),
			'group'       => esc_html__( 'Pagination', 'edgtf-news' ),
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'pagination_simple_link_top_margin',
			'heading'     => esc_html__( 'Custom Link Top Margin (px)', 'edgtf-news' ),
			'dependency'  => array( 'element' => 'pagination_type', 'value' => array( 'simple-link' ) ),
			'group'       => esc_html__( 'Pagination', 'edgtf-news' ),
		);
		
		// Pagination Options - End
		
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

/**
 * Slider Settings Group Visual Composer Options for Shortcodes (Carousels and Sliders)
 */
if ( ! function_exists( 'edgtf_news_get_slider_shortcode_params' ) ) {
	/**
	 * Function that returns array of slider settings predefined params formatted for Visual Composer
	 *
	 * @return array of params
	 *
	 */
	function edgtf_news_get_slider_shortcode_params( $exclude_options = array() ) {
		$params_array = array();
		
		// Slider Settings Options - start
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'number_of_visible_items',
			'heading'     => esc_html__( 'Number Of Visible Items', 'edgtf-news' ),
			'value'       => array(
				esc_html__( 'One', 'edgtf-core' )   => '1',
				esc_html__( 'Two', 'edgtf-core' )   => '2',
				esc_html__( 'Three', 'edgtf-core' ) => '3',
				esc_html__( 'Four', 'edgtf-core' )  => '4',
				esc_html__( 'Five', 'edgtf-core' )  => '5',
				esc_html__( 'Six', 'edgtf-core' )   => '6'
			),
			'save_always' => true,
			'group'       => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'enable_loop',
			'heading'     => esc_html__( 'Enable Slider Loop', 'edgtf-news' ),
			'value'       => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'save_always' => true,
			'group'       => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'dropdown',
			'param_name'  => 'enable_autoplay',
			'heading'     => esc_html__( 'Enable Slider Autoplay', 'edgtf-news' ),
			'value'       => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'save_always' => true,
			'group'       => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'slider_speed',
			'heading'     => esc_html__( 'Slide Duration', 'edgtf-core' ),
			'description' => esc_html__( 'Default value is 5000 (ms)', 'edgtf-core' ),
			'group'       => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'        => 'textfield',
			'param_name'  => 'slider_speed_animation',
			'heading'     => esc_html__( 'Slide Animation Duration', 'edgtf-core' ),
			'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'edgtf-core' ),
			'group'       => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_navigation',
			'heading'    => esc_html__( 'Display Navigation', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		$params_array[] = array(
			'type'       => 'dropdown',
			'param_name' => 'display_pagination',
			'heading'    => esc_html__( 'Display Pagination', 'edgtf-news' ),
			'value'      => array_flip( mediadesk_edge_get_yes_no_select_array() ),
			'group'      => esc_html__( 'Slider Settings', 'edgtf-news' )
		);
		
		// Slider Settings Options - end
		
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

if ( ! function_exists( 'edgtf_news_get_widget_params_from_VC' ) ) {
	function edgtf_news_get_widget_params_from_VC( $params_array ) {
		$widget_params_array = array();
		$i                   = 0;
		
		foreach ( $params_array as $one_parameter_array ) {
			$widget_params_array[ $i ] = array();
			
			if ( $one_parameter_array['type'] == 'autocomplete' ) {
				$widget_params_array[ $i ]['type'] = 'textfield';
			} else {
				$widget_params_array[ $i ]['type'] = $one_parameter_array['type'];
			}
			
			$widget_params_array[ $i ]['title'] = $one_parameter_array['heading'];
			$widget_params_array[ $i ]['name']  = $one_parameter_array['param_name'];
			
			if ( isset( $one_parameter_array['description'] ) ) {
				$widget_params_array[ $i ]['description'] = $one_parameter_array['description'];
			}
			
			if ( isset( $one_parameter_array['value'] ) && is_array( $one_parameter_array['value'] ) && count( $one_parameter_array['value'] ) ) {
				$widget_params_array[ $i ]['options'] = array_flip( $one_parameter_array['value'] );
			}
			
			$i ++;
		}
		
		return $widget_params_array;
	}
}