<div class="edgtf-news-item edgtf-layout5-item edgtf-item-space">
	<div class="edgtf-ni-item-inner">
		<?php echo edgtf_news_get_shortcode_inner_template_part( 'image', '', $params ); ?>
		<div class="edgtf-ni-content">
			<div class="edgtf-ni-content-wrapper">
				<div class="edgtf-ni-content-inner">
					<div class="edgtf-ni-info edgtf-ni-info-top">
						<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/category', '', $params ); ?>
						<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/date', '', $params ); ?>
					</div>
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'title', '', $params ); ?>
					<div class="edgtf-ni-info edgtf-ni-info-bottom">
						<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/author', '', $params ); ?>
						<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/comments', '', $params ); ?>
						<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/like', '', $params ); ?>
						<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/review', '', $params ); ?>
					</div>
				</div>
			</div>
		</div>
		<a itemprop="url" class="edgtf-ni-item-link" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
</div>