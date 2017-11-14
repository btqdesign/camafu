<div class="edgtf-news-item edgtf-layout4-item edgtf-item-space">
	<div class="edgtf-ni-inner">
		<div class="edgtf-ni-image-holder">
			<div class="edgtf-ni-image-inner">
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'image', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/hot-trending', '', $params ); ?>
			</div>
		</div>
		<div class="edgtf-ni-content">
			<div class="edgtf-ni-content-inner">
				<div class="edgtf-ni-info edgtf-ni-info-top">
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/category', '', $params ); ?>
					<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/date', '', $params ); ?>
				</div>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'title', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'excerpt', '', $params ); ?>
			</div>
			<div class="edgtf-ni-info edgtf-ni-info-bottom">
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/like', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/comments', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/share', '', $params ); ?>
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/read-more', '', $params ); ?>
			</div>
		</div>
	</div>
</div>