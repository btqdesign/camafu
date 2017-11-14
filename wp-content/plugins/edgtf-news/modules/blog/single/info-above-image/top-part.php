<div class="edgtf-news-post-top-holder">
	<div class="edgtf-news-post-top-holder-info">
		<div class="edgtf-news-post-info-above-title">
			<?php echo edgtf_news_get_blog_part( 'parts/post-info/category', 'templates', '', $part_params ); ?>
			<?php echo edgtf_news_get_blog_part( 'parts/post-info/date', 'templates', '', $part_params ); ?>
		</div>
		<?php echo edgtf_news_get_blog_part( 'parts/title', 'templates', '', $part_params ); ?>
		<div class="edgtf-news-post-info-below-title">
			<?php echo edgtf_news_get_blog_part( 'parts/post-info/author', 'templates', '', $part_params ); ?>
		</div>
	</div>
	<div class="edgtf-news-post-top-holder-image">
		<?php echo edgtf_news_get_blog_part( 'parts/image', 'templates', '', $part_params ); ?>
		<?php echo edgtf_news_get_blog_part( 'parts/post-info/hot-trending', 'templates' ); ?>
	</div>
</div>