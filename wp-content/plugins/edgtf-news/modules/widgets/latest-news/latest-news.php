<?php

class EdgefNewsClassLatestNews extends EdgefNewsPhpClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_latest_news_widget',
			esc_html__( 'Edge Latest News Widget', 'edgtf-news' ),
			array( 'description' => esc_html__( 'Display Latest News', 'edgtf-news' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'title',
				'title' => esc_html__( 'Title', 'edgtf-news' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'edgtf-news' ),
				'options' => mediadesk_edge_get_title_tag( true, array('span' => 'span') )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'number_of_posts',
				'title' => esc_html__( 'Number of Posts', 'edgtf-news' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'order_by',
				'title'   => esc_html__( 'Order By', 'edgtf-news' ),
				'options' => array(
					'latest'       => esc_html__( 'Latest', 'edgtf-news' ),
					'random'       => esc_html__( 'Random', 'edgtf-news' ),
					'random_today' => esc_html__( 'Random Posts Today', 'edgtf-news' ),
					'comments'     => esc_html__( 'Most Commented', 'edgtf-news' ),
					'title'        => esc_html__( 'Title', 'edgtf-news' ),
					'popular'      => esc_html__( 'Popular', 'edgtf-news' ),
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'order',
				'title'       => esc_html__( 'Order', 'edgtf-news' ),
				'description' => esc_html__( 'Choose order when Title order by is chosen', 'edgtf-news' ),
				'options'     => mediadesk_edge_get_query_order_array()
			),
			array(
				'type'        => 'textfield',
				'name'        => 'category',
				'title'       => esc_html__( 'Category Slug', 'edgtf-news' ),
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'edgtf-news' ),
			),
			array(
				'type'        => 'textfield',
				'name'        => 'post_in',
				'title'       => esc_html__( 'Include Posts', 'edgtf-news' ),
				'description' => esc_html__( 'Enter the IDs of the posts you want to display', 'edgtf-news' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'post_not_in',
				'title'       => esc_html__( 'Exclude Posts', 'edgtf-news' ),
				'description' => esc_html__( 'Enter the IDs of the posts you want to exclude', 'edgtf-news' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'slideshow_speed',
				'title'       => esc_html__( 'Slideshow Speed', 'edgtf-news' ),
				'description' => esc_html__( 'Set the speed of the slideshow cycling, in milliseconds. Default value is 5000.', 'edgtf-news' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'animation_speed',
				'title'       => esc_html__( 'Slide Animation Speed', 'edgtf-news' ),
				'description' => esc_html__( 'Set the speed of animations, in milliseconds. Default value is 600.', 'edgtf-news' ),
			),
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		if ( $instance['title_tag'] == '' ) {
			$instance['title_tag'] = 'span';
		}
		
		$query_array = array();
		
		if ( ! empty( $instance['number_of_posts'] ) && $instance['number_of_posts'] !== '' ) {
			$query_array['posts_per_page'] = $instance['number_of_posts'];
		}
		
		if ( ! empty( $instance['order_by'] ) && $instance['order_by'] !== '' ) {
			
			switch ( $instance['order_by'] ) {
				case 'latest':
					$query_array['orderby'] = 'date';
					break;
				case 'random':
					$query_array['orderby'] = 'rand';
					break;
				case 'random_today':
					$query_array['orderby']  = 'rand';
					$query_array['year']     = date( 'Y' );
					$query_array['monthnum'] = date( 'n' );
					$query_array['day']      = date( 'j' );
					break;
				case 'comments':
					$query_array['orderby'] = 'comment_count';
					$query_array['order']   = 'DESC';
					break;
				case 'title':
					$query_array['orderby'] = 'title';
					if ( ! empty( $instance['order'] ) && $instance['order'] !== '' ) {
						$query_array['order'] = $instance['order'];
					}
					break;
				case 'popular':
					$query_array['meta_key'] = 'edgtf_count_post_views_meta';
					$query_array['orderby']  = 'meta_value_num';
					$query_array['order']    = 'DESC';
					break;
			}
		}
		
		if ( ! empty( $instance['category'] ) && $instance['category'] !== '' ) {
			$query_array['category_name'] = $instance['category'];
		}
		
		if ( ! empty( $instance['post_in'] ) && $instance['post_in'] !== '' ) {
			$query_array['post__in'] = explode( ",", $instance['post_in'] );
		}
		
		if ( ! empty( $instance['post_not_in'] ) && $instance['post_not_in'] !== '' ) {
			$query_array['post__not_in'] = $instance['post_not_in'];
		}
		
		$query_array['post_status'] = 'publish'; //to ensure that ajax call will not return 'private' posts
		
		$data = array();
		
		if ( ! empty( $instance['slideshow_speed'] ) && $instance['slideshow_speed'] !== '' ) {
			$data['data-slider-speed'] = $instance['slideshow_speed'];
		}
		
		if ( ! empty( $instance['animation_speed'] ) && $instance['animation_speed'] !== '' ) {
			$data['data-slider-speed-animation'] = $instance['animation_speed'];
		}

		$data['data-enable-navigation'] = 'no';
		
		$queryResult = new \WP_Query( $query_array );
		?>
		<div class="widget edgtf-news-latest-news-widget">
			<?php if ( ! empty( $instance['title'] ) ) { ?>
				<div class="edgtf-news-lnw-title-holder">
					<<?php echo esc_attr( $instance['title_tag'] ); ?> itemprop="name" class="entry-title edgtf-news-lnw-title">
						<?php echo esc_html( $instance['title'] ); ?>
					</<?php echo esc_attr( $instance['title_tag'] ); ?>>
				</div>
			<?php } ?>
			<?php if ( $queryResult->have_posts() ): ?>
				<div class="edgtf-news-lnw-slider-holder">
					<ul class="edgtf-news-lnw-slider edgtf-owl-slider" <?php echo mediadesk_edge_get_inline_attrs( $data ); ?>>
						<?php while ( $queryResult->have_posts() ) : $queryResult->the_post(); ?>
							<li class="edgtf-news-lnw-slide">
								<a itemprop="url" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php else: ?>
				<div class="edgtf-news-messsage">
					<p><?php esc_html_e( 'No posts were found.', 'edgtf-news' ); ?></p>
				</div>
			<?php endif;

			wp_reset_postdata();
			?>
		</div>
		<?php
	}
}