<?php

if ( ! function_exists( 'mediadesk_edge_social_options_map' ) ) {
	function mediadesk_edge_social_options_map() {

	    $page = '_social_page';
		
		mediadesk_edge_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'mediadesk' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_panel_social_networks, #edgtf_panel_show_social_share_on'
				),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = mediadesk_edge_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'mediadesk' ),
				'hidden_property' => 'enable_social_share',
				'hidden_value'    => 'no'
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'mediadesk' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'mediadesk' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'mediadesk' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'mediadesk' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('mediadesk_edge_action_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = mediadesk_edge_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'mediadesk' ),
				'hidden_property' => 'enable_social_share',
				'hidden_value'    => 'no'
			)
		);
		
		/**
		 * Facebook
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_facebook_share_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_facebook_share_container',
				'hidden_property' => 'enable_facebook_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_twitter_share_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_twitter_share_container',
				'hidden_property' => 'enable_twitter_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'mediadesk' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * Google Plus
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'google_plus_title',
				'title'  => esc_html__( 'Share on Google Plus', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_google_plus_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Google Plus', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_google_plus_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_google_plus_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_google_plus_container',
				'hidden_property' => 'enable_google_plus_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'google_plus_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_google_plus_container
			)
		);
		
		/**
		 * Linked In
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_linkedin_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_linkedin_container',
				'hidden_property' => 'enable_linkedin_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_tumblr_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_tumblr_container',
				'hidden_property' => 'enable_tumblr_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_pinterest_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_pinterest_container',
				'hidden_property' => 'enable_pinterest_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		mediadesk_edge_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'mediadesk' )
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_vk_container'
				),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_vk_container',
				'hidden_property' => 'enable_vk_share',
				'hidden_value'    => 'no',
				'parent'          => $panel_social_networks
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'mediadesk' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'EDGEF_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = mediadesk_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'mediadesk' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			mediadesk_edge_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'EDGEF_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = mediadesk_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'mediadesk' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			mediadesk_edge_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = mediadesk_edge_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'mediadesk' ),
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'mediadesk' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'mediadesk' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_enable_open_graph_container'
				),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = mediadesk_edge_add_admin_container(
			array(
				'name'            => 'enable_open_graph_container',
				'hidden_property' => 'enable_open_graph',
				'hidden_value'    => 'no',
				'parent'          => $panel_open_graph
			)
		);
		
		mediadesk_edge_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => EDGE_ASSETS_ROOT . '/img/open_graph.jpg',
				'label'         => esc_html__( 'Default Share Image', 'mediadesk' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'mediadesk' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('mediadesk_edge_action_social_options', $page);
	}
	
	add_action( 'mediadesk_edge_action_options_map', 'mediadesk_edge_social_options_map', 18 );
}