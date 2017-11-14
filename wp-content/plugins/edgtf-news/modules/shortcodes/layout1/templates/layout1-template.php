<div class="edgtf-news-item edgtf-layout1-item edgtf-item-space">
	<div class="edgtf-ni-image-holder">
		<?php echo edgtf_news_get_shortcode_inner_template_part( 'image', '', $params ); ?>
		<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/hot-trending', '', $params ); ?>
	</div>
	<div class="edgtf-ni-content">
		<div class="edgtf-ni-info edgtf-ni-info-top">
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/date', '', $params ); ?>
		</div>
		<?php echo edgtf_news_get_shortcode_inner_template_part( 'title', '', $params ); ?>
		<?php echo edgtf_news_get_shortcode_inner_template_part( 'excerpt', '', $params ); ?>
		<div class="edgtf-ni-info edgtf-ni-info-bottom">
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/like', '', $params ); ?>
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/comments', '', $params ); ?>
			<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/share', '', $params ); ?>
		</div>
	</div>
</div>