<?php

if ( ! function_exists( 'mediadesk_edge_get_blog_list_types_options' ) ) {
	function mediadesk_edge_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'mediadesk_edge_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'mediadesk_edge_blog_options_map' ) ) {
	function mediadesk_edge_blog_options_map() {
		$blog_list_type_options = mediadesk_edge_get_blog_list_types_options();
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'mediadesk' ),
				'icon'  => 'fa fa-files-o'
			)
		);

		$mediadesk_custom_sidebars = mediadesk_edge_get_custom_sidebars();
		
		/**
		 * Blog Author
		 */
		$panel_blog_author = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_author_lists',
				'title' => esc_html__( 'Blog Author Pages', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'author_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Author Pages', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a sidebar layout for author pages', 'mediadesk' ),
				'default_value' => '',
				'parent'        => $panel_blog_author,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mediadesk' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
				)
			)
		);
		
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_admin_field(
				array(
					'name'        => 'author_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Author Pages', 'mediadesk' ),
					'description' => esc_html__( 'Choose a sidebar to display on author pages. Default sidebar is "Sidebar Page"', 'mediadesk' ),
					'parent'      => $panel_blog_author,
					'options'     => mediadesk_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'mediadesk' )
			)
		);
		
		$blog_list_type_options = array_merge( $blog_list_type_options, array('archive-page' => esc_html__( 'Predefined Layout', 'mediadesk' ) ) );
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'mediadesk' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'mediadesk' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mediadesk' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
				)
			)
		);
		
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'mediadesk' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'mediadesk' ),
					'parent'      => $panel_blog_lists,
					'options'     => mediadesk_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'mediadesk' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'mediadesk' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'mediadesk' ),
					'full-width' => esc_html__( 'Full Width', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'mediadesk' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'mediadesk' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'mediadesk' ),
					'three' => esc_html__( '3 Columns', 'mediadesk' ),
					'four'  => esc_html__( '4 Columns', 'mediadesk' ),
					'five'  => esc_html__( '5 Columns', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'mediadesk' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'mediadesk' ),
				'default_value' => 'normal',
				'options'       => mediadesk_edge_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'mediadesk' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'mediadesk' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'mediadesk' ),
					'original' => esc_html__( 'Original', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'mediadesk' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'mediadesk' ),
					'load-more'       => esc_html__( 'Load More', 'mediadesk' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'mediadesk' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'mediadesk' )
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'mediadesk' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'mediadesk' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'hot_posts_archive',
				'label'  => esc_html__( 'Set Archive Link for Hot Posts', 'mediadesk' ),
				'parent' => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'   => 'text',
				'name'   => 'trending_posts_archive',
				'label'  => esc_html__( 'Set Archive Link for Trending Posts', 'mediadesk' ),
				'parent' => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'mediadesk' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'mediadesk' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mediadesk' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediadesk' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediadesk' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediadesk' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediadesk' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediadesk' )
				)
			)
		);
		
		if ( count( $mediadesk_custom_sidebars ) > 0 ) {
			mediadesk_edge_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'mediadesk' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'mediadesk' ),
					'parent'      => $panel_blog_single,
					'options'     => mediadesk_edge_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'mediadesk' ),
				'parent'        => $panel_blog_single,
				'options'       => mediadesk_edge_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'mediadesk' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'mediadesk' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'mediadesk' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'mediadesk' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'mediadesk' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);
		
		$blog_single_navigation_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'mediadesk' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'mediadesk' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'mediadesk' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);
		
		$blog_single_author_info_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'mediadesk' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'mediadesk' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'mediadesk_edge_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_blog_options_map', 13 );
}