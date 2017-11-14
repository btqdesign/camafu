<?php

if ( ! function_exists( 'edgtf_news_reaction_taxonomy_register' ) ) {
	function edgtf_news_reaction_taxonomy_register() {
		
		if ( edgtf_news_theme_installed() ) {
			$labels = array(
				'name'              => esc_html__( 'News Reactions', 'edgtf-news' ),
				'singular_name'     => esc_html__( 'News Reaction', 'edgtf-news' ),
				'search_items'      => esc_html__( 'Search News Reactions', 'edgtf-news' ),
				'all_items'         => esc_html__( 'All News Reactions', 'edgtf-news' ),
				'parent_item'       => esc_html__( 'Parent News Reaction', 'edgtf-news' ),
				'parent_item_colon' => esc_html__( 'Parent News Reaction:', 'edgtf-news' ),
				'edit_item'         => esc_html__( 'Edit News Reaction', 'edgtf-news' ),
				'update_item'       => esc_html__( 'Update News Reaction', 'edgtf-news' ),
				'add_new_item'      => esc_html__( 'Add New News Reaction', 'edgtf-news' ),
				'new_item_name'     => esc_html__( 'New News Reaction Name', 'edgtf-news' ),
				'menu_name'         => esc_html__( 'News Reactions', 'edgtf-news' )
			);
			
			register_taxonomy( 'news-reaction', 'post', array(
				'hierarchical'       => false,
				'labels'             => $labels,
				'show_ui'            => true,
				'query_var'          => true,
				'show_admin_column'  => false,
				'show_in_quick_edit' => false,
				'meta_box_cb'        => false,
				'rewrite'            => array( 'slug' => 'news-reaction' )
			) );
		}
	}
	
	add_action( 'init', 'edgtf_news_reaction_taxonomy_register', 0 );
}

if ( ! function_exists( 'edgtf_news_reaction_taxonomy_archive' ) ) {
	function edgtf_news_reaction_taxonomy_archive( $archive ) {
		
		if ( is_tax( 'news-reaction' ) ) {
			return EDGE_NEWS_REACTIONS_PATH . '/archive-reactions.php';
		}
		
		return $archive;
	}
	
	add_filter( 'archive_template', 'edgtf_news_reaction_taxonomy_archive' );
}

if ( ! function_exists( 'edgtf_news_reaction_html' ) ) {
	function edgtf_news_reaction_html( $post_ID = '' ) {
		if ( $post_ID == '' ) {
			$post_ID = get_the_ID();
		}
		
		$all_reactions = get_terms( array(
			'taxonomy'   => 'news-reaction',
			'hide_empty' => false
		) );
		
		$html = '';
		if ( is_array( $all_reactions ) && count( $all_reactions ) ) {
			
			$html .= '<div class="edgtf-news-reactions-holder">';
			$html .= '<h3 class="edgtf-news-reactions-title">' . esc_html__( 'What\'s your reaction?', 'edgtf-news' ) . '</h3>';
			$html .= '<div class="edgtf-news-reactions" data-post-id="' . get_the_ID() . '">';
			
			foreach ( $all_reactions as $reaction ) {
				$reaction_params = array();
				
				$reaction_params['id']             = $reaction->term_taxonomy_id;
				$reaction_params['name']           = $reaction->name;
				$reaction_params['slug']           = $reaction->slug;
				$reaction_params['image']          = get_term_meta( $reaction->term_taxonomy_id, 'reaction_image', true );
				$reaction_params['reaction_value'] = get_post_meta( $post_ID, 'edgtf_news_reaction_' . $reaction->slug, true );
				
				if ( $reaction_params['reaction_value'] === '' ) {
					$reaction_params['reaction_value'] = 0;
				}
				
				$reaction_params['reacted'] = '';
				if ( isset( $_COOKIE[ 'edgtf-reaction-' . $reaction->slug . '_' . $post_ID ] ) ) {
					$reaction_params['reacted'] = 'reacted';
				}
				
				$html .= edgtf_news_get_template_part( 'template/reaction', 'reactions', '', $reaction_params );
			}
			
			$html .= '</div>'; //closing edgtf-news-reactions
			$html .= '</div>'; //closing edgtf-news-reactions-holder
		}
		
		echo $html;
	}
	
	add_action( 'mediadesk_edge_action_after_article_content', 'edgtf_news_reaction_html', 10 );
}

if ( ! function_exists( 'edgtf_news_reaction_update' ) ) {
	function edgtf_news_reaction_update() {
		
		if ( isset( $_POST['reaction_slug'] ) ) {
			$slug    = $_POST['reaction_slug'];
			$post_ID = $_POST['post_ID'];
			if ( isset( $_COOKIE[ 'edgtf-reaction-' . $slug . '_' . $post_ID ] ) ) {
				return;
			} else {
				$count = get_post_meta( $post_ID, 'edgtf_news_reaction_' . $slug, true );
				if ( $count === '' ) {
					update_post_meta( $post_ID, 'edgtf_news_reaction_' . $slug, 1 );
					setcookie( 'edgtf-reaction-' . $slug . '_' . $post_ID, $post_ID, time() * 20, '/' );
				} else {
					$count ++;
					update_post_meta( $post_ID, 'edgtf_news_reaction_' . $slug, $count );
					setcookie( 'edgtf-reaction-' . $slug . '_' . $post_ID, $post_ID, time() * 20, '/' );
				}
			}
		}
		
		exit;
	}
	
	add_action( 'wp_ajax_edgtf_news_reaction_update', 'edgtf_news_reaction_update' );
	add_action( 'wp_ajax_nopriv_edgtf_news_reaction_update', 'edgtf_news_reaction_update' );
}