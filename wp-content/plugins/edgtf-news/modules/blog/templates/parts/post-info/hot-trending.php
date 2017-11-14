<?php
$display_hot_trending_icons = isset( $display_hot_trending_icons ) && $display_hot_trending_icons !== '' ? $display_hot_trending_icons : 'yes';

$trending = get_post_meta( get_the_ID(), 'edgtf_news_post_trending_meta', true ) == 'yes' ? true : false;
$hot      = get_post_meta( get_the_ID(), 'edgtf_news_post_hot_meta', true ) == 'yes' ? true : false;

if ( $display_hot_trending_icons == 'yes' && ( $trending || $hot ) ) {
	$hot_link      = mediadesk_edge_options()->getOptionValue( 'hot_posts_archive' );
	$trending_link = mediadesk_edge_options()->getOptionValue( 'trending_posts_archive' );
	?>
	<div class="edgtf-post-info-hot-trending">
		<?php if ( $trending ) { ?>
			<div class="edgtf-post-info-trending">
				<?php if ( ! empty( $trending_link ) ) { ?>
					<a itemprop="url" class="edgtf-post-info-trending-link" href="<?php echo esc_url( $trending_link ); ?>">
						<span class="edgtf-news-ht-icon edgtf-news-trending"></span>
					</a>
				<?php } else { ?>
					<span class="edgtf-news-ht-icon edgtf-news-trending"></span>
				<?php } ?>
			</div>
		<?php } ?>
		<?php if ( $hot ) { ?>
			<div class="edgtf-post-info-hot">
				<?php if ( ! empty( $hot_link ) ) { ?>
					<a itemprop="url" class="edgtf-post-info-hot-link" href="<?php echo esc_url( $hot_link ); ?>">
						<span class="edgtf-news-ht-icon edgtf-news-hot"></span>
					</a>
				<?php } else { ?>
					<span class="edgtf-news-ht-icon edgtf-news-hot"></span>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
<?php } ?>