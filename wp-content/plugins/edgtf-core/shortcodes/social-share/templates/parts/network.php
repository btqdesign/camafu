<li class="edgtf-<?php echo esc_html($name) ?>-share">
	<a itemprop="url" class="edgtf-share-link" href="#" onclick="<?php echo esc_attr($link); ?>">
		<?php if ($custom_icon !== '') { ?>
			<img itemprop="image" src="<?php echo esc_url($custom_icon); ?>" alt="<?php echo esc_html($name); ?>" />
		<?php } else { ?>
			<span class="edgtf-social-network-icon <?php echo esc_attr($icon); ?>"></span>
			<?php if ($allow_label) { ?>
				<span class="edgtf-social-network-label"><?php echo esc_html(str_replace('_', ' ', $name)); ?></span>
			<?php } ?>
		<?php } ?>
	</a>
</li>