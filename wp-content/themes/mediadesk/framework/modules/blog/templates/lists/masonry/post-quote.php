<?php
$post_classes[] = 'edgtf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<?php mediadesk_edge_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
		</div>
	</div>
</article>