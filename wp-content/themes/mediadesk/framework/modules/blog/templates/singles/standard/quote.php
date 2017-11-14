<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<?php mediadesk_edge_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
		</div>
	</div>
	<div class="edgtf-post-info-above-title">
		<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
		<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
		<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
	</div>
	<div class="edgtf-post-additional-content">
		<?php the_content(); ?>
		<?php do_action('mediadesk_edge_action_single_link_pages'); ?>
	</div>
	<div class="edgtf-post-info-bottom clearfix">
		<div class="edgtf-post-info-bottom-left">
			<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
		</div>
		<div class="edgtf-post-info-bottom-right">
			<?php mediadesk_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
		</div>
	</div>
</article>