<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-image-holder">
		<?php mediadesk_edge_get_module_template_part('templates/parts/image', 'blog', '', $part_params); ?>
		<div class="edgtf-post-image-info">
			<div class="edgtf-post-image-info-table">
				<div class="edgtf-post-image-info-table-cell">
					<div class="edgtf-news-post-info-above-title">
						<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
						<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
					</div>
					<?php mediadesk_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
					<div class="edgtf-news-post-info-below-title">
						<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-main">
				<?php
					$content = get_the_content();
					echo do_shortcode( $content );
				?>
				<?php do_action( 'mediadesk_edge_action_single_link_pages' ); ?>
			</div>
			<div class="edgtf-post-info-bottom clearfix">
				<div class="edgtf-post-info-bottom-left">
					<?php mediadesk_edge_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', array('allow_icon_label' => 'yes') ); ?>
				</div>
				<div class="edgtf-post-info-bottom-right">
					<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
				</div>
			</div>
		</div>
	</div>
</article>