<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-heading">
			<?php mediadesk_edge_get_module_template_part( 'templates/parts/post-type/video', 'blog', '', $part_params ); ?>
		</div>
		<div class="edgtf-post-text">
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
			<div class="edgtf-post-text-main">
				<?php the_content(); ?>
				<?php do_action( 'mediadesk_edge_action_single_link_pages' ); ?>
			</div>
			<div class="edgtf-author-description-wrapper">
				<?php mediadesk_edge_get_module_template_part( 'templates/parts/single/author-info', 'blog' ); ?>
			</div>
			<div class="edgtf-post-info-bottom clearfix">
				<div class="edgtf-post-info-bottom-left">
					<?php echo edgtf_news_get_blog_part( 'parts/post-info/share', 'templates', '', array( 'allow_icon_label' => 'yes' ) ); ?>
				</div>
				<div class="edgtf-post-info-bottom-right">
					<?php echo edgtf_news_get_blog_part( 'parts/post-info/tags', 'templates', '', $part_params ); ?>
				</div>
			</div>
		</div>
	</div>
</article>