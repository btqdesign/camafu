<div class="edgtf-counter-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="edgtf-counter-inner">
		<?php if(!empty($digit)) { ?>
			<span class="edgtf-counter <?php echo esc_attr($type) ?>" <?php echo mediadesk_edge_get_inline_style($counter_styles); ?>><?php echo esc_html($digit); ?></span>
		<?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="edgtf-counter-title" <?php echo mediadesk_edge_get_inline_style($counter_title_styles); ?>>
				<?php echo esc_html($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<p class="edgtf-counter-text" <?php echo mediadesk_edge_get_inline_style($counter_text_styles); ?>><?php echo esc_html($text); ?></p>
		<?php } ?>
	</div>
</div>