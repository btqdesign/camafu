<div class="edgtf-news-item edgtf-video-layout1-item edgtf-item-space">
	<div class="edgtf-news-item-inner">
		<div class="edgtf-news-video-holder">
			<?php
			if ( $video_type == 'social_networks' ) {
				echo wp_oembed_get( esc_url( $video_link ) );
			} else if ( $video_type == 'self' ) { ?>
				<div class="edgtf-self-hosted-video-holder">
					<div class="edgtf-video-wrap">
						<video class="edgtf-self-hosted-video" poster="<?php echo esc_url( $video_image ); ?>" preload="auto">
							<?php if ( ! empty( $video_link ) ) { ?> <source type="video/mp4" src="<?php echo esc_url( $video_link ); ?>"> <?php } ?>
							<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo esc_url( $flash_media ); ?>">
								<param name="movie" value="<?php echo esc_url( $flash_media ); ?>"/>
								<param name="flashvars" value="controls=true&file=<?php echo esc_url( $video_link ); ?>" />
								<img itemprop="image" src="<?php echo esc_url( $video_image ); ?>" width="1920" height="800" title="<?php esc_attr_e( 'No video playback capabilities', 'mediadesk' ); ?>" alt="<?php esc_html_e( 'Video Thumb', 'mediadesk' ); ?>"/>
							</object>
						</video>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="edgtf-ni-content">
			<div class="edgtf-ni-info edgtf-ni-info-top">
				<?php echo edgtf_news_get_shortcode_inner_template_part( 'post-info/category', '', $params ); ?>
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
</div>