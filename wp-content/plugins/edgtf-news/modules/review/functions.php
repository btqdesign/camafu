<?php

foreach ( glob( EDGE_NEWS_REVIEW_PATH . '/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'edgtf_news_review_html' ) ) {
	function edgtf_news_review_html( $post_ID = '' ) {
		if ( $post_ID == '' ) {
			$post_ID = get_the_ID();
		}
		
		$html = '';
		
		$review_titles  = get_post_meta( get_the_ID(), 'edgtf_review_title', true );
		$review_values  = get_post_meta( get_the_ID(), 'edgtf_review_value', true );
		$review_summary = get_post_meta( get_the_ID(), 'edgtf_review_summary', true );
		$review_average = get_post_meta( get_the_ID(), 'edgtf_news_review_average', true );
		
		if ( $review_average !== '' ) {
			
			$review_average_params['style'] = 'width: ' . ( $review_average * 20 ) . '%'; //20 is 100/5, calculating percent
			
			$review_holder_title = esc_html__( 'Review', 'edgtf-news' );
			if ( count( $review_values ) > 1 ) {
				$review_holder_title = esc_html__( 'Reviews', 'edgtf-news' );
			}
			
			$html .= '<div class="edgtf-news-reviews-holder">';
			$html .= '<div class="edgtf-news-review-title-holder">';
			$html .= '<h2 class="edgtf-news-review-title">' . esc_html( $review_holder_title ) . '</h2>';
			$html .= '<div class="edgtf-news-review-average">';
			$html .= '<span class="edgtf-news-review-no">' . $review_average . '</span>';
			$html .= edgtf_news_get_template_part( 'template/stars', 'review', '', $review_average_params );
			$html .= '</div>';
			$html .= '</div>'; //closing edgtf-news-review-title-holder
			$html .= '<div class="edgtf-news-reviews">';
			
			for ( $i = 0; $i < count( $review_values ); $i ++ ) {
				if ( $review_values[ $i ] !== '' ) {
					
					
					$review_params = array();
					
					$review_params['title']       = $review_titles[ $i ];
					$review_params['stars_style'] = 'width: ' . ( $review_values[ $i ] * 20 ) . '%'; //20 is 100/5, calculating percent
					
					$html .= edgtf_news_get_template_part( 'template/review', 'review', '', $review_params );
				}
			}
			
			$html .= '</div>'; //closing edgtf-news-reviews
			
			if ( $review_summary !== '' ) {
				$html .= '<div class="edgtf-news-review-summary-holder">';
				$html .= '<h2 class="edgtf-news-summary-title">' . esc_html__( 'Summary', 'edgtf-news' ) . '</h2>';
				$html .= '<div class="edgtf-news-review-summary">';
				$html .= esc_html( $review_summary );
				$html .= '</div>';
				$html .= '</div>';
			}
			
			$html .= '</div>'; //closing edgtf-news-reviews-holder
		}
		
		echo $html;
	}
	
	add_action( 'mediadesk_edge_action_after_article_content', 'edgtf_news_review_html', 5 );
}

if ( ! function_exists( 'edgtf_news_save_review' ) ) {
	/**
	 * Function that saves meta box to postmeta table
	 *
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function edgtf_news_save_review( $post_id, $post ) {
		$current_review = get_post_meta( $post_id, 'edgtf_news_review_average', true );
		
		$review_values  = get_post_meta( $post_id, 'edgtf_review_value', true );
		$review_average = '';
		
		if ( is_array( $review_values ) && count( $review_values ) ) {
			$sum   = 0;
			$count = 0;
			
			foreach ( $review_values as $value ) {
				if ( $value !== '' ) {
					//prevent values higher then 5 and lower then 1
					$value = $value > 5 ? 5 : $value;
					$value = $value < 1 ? 1 : $value;
					
					$sum += $value;
					$count ++;
				}
			}
			
			if ( $count != 0 ) {
				$review_average = round( $sum / $count, 2 );
			}
		}
		
		if ( $current_review !== $review_average ) {
			update_post_meta( $post_id, 'edgtf_news_review_average', $review_average );
		}
	}
	
	add_action( 'save_post', 'edgtf_news_save_review', 5, 2 ); //action needs to be after save meta fields with 1 priority
}