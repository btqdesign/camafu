<div class="edgtf-section-title-holder <?php echo esc_attr($holder_class); ?>" <?php mediadesk_edge_inline_style($holder_style); ?>>
    <div class="edgtf-section-title-inner">
	    <?php if(!empty($title)) { ?>
		    <h1 class="edgtf-st-title">
			    <span><?php echo esc_html($title); ?></span>
		    </h1>
		    <span class="edgtf-separator-sign"></span>
		<?php } ?>

        <?php if(!empty($subtitle)) { ?>
            <h3 class="edgtf-st-subtitle">
	            <span><?php echo esc_html($subtitle); ?></span>
            </h3>
	        <span class="edgtf-separator-sign"></span>
        <?php } ?>

		<?php if(!empty($button_txt)) { ?>
			<div class="edgtf-link-holder">
				<a itemprop="link" href="<?php echo ! empty($button_link) ? esc_url($button_link) : '#'; ?>" class="edgtf-btn edgtf-btn-simple edgtf-btn-custom-hover-color" target="<?php echo esc_attr($target); ?>">
					<?php echo esc_html($button_txt); ?>
					<?php echo mediadesk_edge_icon_collections()->renderIcon('ion-arrow-right-c', 'ion_icons'); ?>
				</a>
			</div>
		<?php } ?>
    </div>
</div>