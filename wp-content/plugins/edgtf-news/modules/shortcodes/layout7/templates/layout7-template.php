<div class="edgtf-news-item edgtf-layout7-item edgtf-item-space">
	<div class="edgtf-ni-content">
		<?php if ( isset($info_below_title) && $info_below_title === 'yes' ) { ?>
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'title', '', $params ); ?>
			<div class="edgtf-ni-info edgtf-ni-info-bottom">
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/category', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/date', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/author', '', $params ); ?>
			</div>
		<?php } else {
			$info_styles = '';
			if ( isset ( $post_info_top_bottom_margin ) && $post_info_top_bottom_margin !== '' ) {
				$info_styles .= 'margin-bottom: ' . mediadesk_edge_filter_px( $post_info_top_bottom_margin ) . 'px;';
			}
			?>
			<div class="edgtf-ni-info edgtf-ni-info-top" <?php mediadesk_edge_inline_style( $info_styles ); ?>>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/category', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/date', '', $params ); ?>
			</div>
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'title', '', $params ); ?>
			<?php if ( isset($display_author) && $display_author === 'yes' ) { ?>
				<div class="edgtf-ni-info edgtf-ni-info-bottom">
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/author', '', $params ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>