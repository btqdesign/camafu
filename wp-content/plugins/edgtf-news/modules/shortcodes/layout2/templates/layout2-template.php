<div class="edgtf-news-item edgtf-layout2-item edgtf-item-space">
	<div class="edgtf-ni-inner">
		<div class="edgtf-ni-image-holder">
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'image', '', $params ); ?>
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/hot-trending', '', $params ); ?>
		</div>
		<div class="edgtf-ni-content">
			<?php if ( ( isset( $display_categories ) && $display_categories === 'yes' ) || ( isset( $display_date ) && $display_date === 'yes' ) ) {
				$info_styles = '';
				if ( isset ( $post_info_top_bottom_margin ) && $post_info_top_bottom_margin !== '' ) {
					$info_styles .= 'margin-bottom: ' . mediadesk_edge_filter_px( $post_info_top_bottom_margin )	. 'px;';
				}
				?>
				<div class="edgtf-ni-info edgtf-ni-info-top" <?php mediadesk_edge_inline_style( $info_styles ); ?>>
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/category', '', $params ); ?>
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/date', '', $params ); ?>
				</div>
			<?php } ?>
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'title', '', $params ); ?>
			<?php if ( ( isset( $display_like ) && $display_like === 'yes' ) || ( isset( $display_comments ) && $display_comments === 'yes' ) || ( isset( $display_read_more ) && $display_read_more === 'yes' ) ) { ?>
				<div class="edgtf-ni-info edgtf-ni-info-bottom">
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/like', '', $params ); ?>
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/comments', '', $params ); ?>
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/read-more', '', $params ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>