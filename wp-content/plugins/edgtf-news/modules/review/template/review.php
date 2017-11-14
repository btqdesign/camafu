<div class="edgtf-news-review-item">
	<div class="edgtf-review-item-title">
		<?php echo esc_html( $title ); ?>
	</div>
	<div class="edgtf-review-item-value">
		<?php echo edgtf_news_get_template_part( 'template/stars', 'review', '', array( 'style' => $stars_style ) ); ?>
	</div>
</div>