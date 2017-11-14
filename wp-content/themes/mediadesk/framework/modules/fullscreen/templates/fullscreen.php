<div class="edgtf-fullscreen-area">
	<div class="edgtf-fullscreen-holder">
		<div class="edgtf-fullscreen-close-holder">
			<a class="edgtf-fullscreen-close" href="#" target="_self">
				<?php echo mediadesk_edge_icon_collections()->renderIcon( 'icon_close', 'font_elegant' ); ?>
			</a>
		</div>
		<div class="edgtf-fullscreen-left edgtf-news-skin-light" <?php mediadesk_edge_inline_style($left_style); ?>>
			<?php if ( ! empty( $post_id ) ) { ?>
				<div class="edgtf-layout10-item edgtf-news-holder edgtf-news-skin-light">
					<div class="edgtf-ni-content">
						<div class="edgtf-ni-info edgtf-ni-info-top">
							<div class="edgtf-post-info-category">
								<?php the_category( ', ', '', $post_id ); ?>
							</div>

							<div itemprop="dateCreated" class="edgtf-post-info-date entry-date published updated">
								<?php
									$difference   = human_time_diff( get_the_time( 'U', $post_id ), current_time( 'timestamp' ) ) . esc_html__( ' ago', 'mediadesk' );
								?>
								<a itemprop="url" href="<?php the_permalink($post_id) ?>">
									<?php echo esc_html( $difference ); ?>
								</a>
							</div>
						</div>

						<h1 class="entry-title edgtf-post-title">
							<a itemprop="url" href="<?php the_permalink($post_id) ?>"><?php echo get_the_title( $post_id ); ?></a>
						</h1>

						<div class="edgtf-ni-info edgtf-post-info-below-title">
							<div class="edgtf-post-info-author">
								<span class="edgtf-post-info-author-text">
									<?php esc_html_e( 'By', 'mediadesk' ); ?>
								</span>
								<a itemprop="author" class="edgtf-post-info-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<?php the_author_meta( 'display_name' ); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="edgtf-fullscreen-right">
			<?php if ( ! empty( $title ) ) { ?>
				<div class="edgtf-fullscreen-title">
					<<?php echo esc_attr($title_tag) ?>>
					<?php echo esc_html( $title ); ?>
				</<?php echo esc_attr($title_tag) ?>>
				</div>
			<?php } ?>
			<?php if ( ! empty( $nav_1 ) ) {
				wp_nav_menu( array( 'menu' => esc_attr( $nav_1 ), 'container_class' => 'edgtf-fullscreen-nav-1' ) );
			} ?>
			<?php if ( ! empty( $nav_2 ) ) {
				wp_nav_menu( array( 'menu' => esc_attr( $nav_2 ), 'container_class' => 'edgtf-fullscreen-nav-2' ) );
			} ?>
		</div>
	</div>
</div>