<?php if($max_num_pages > 1) { ?>
	<div class="edgtf-blog-pag-loading">
		<div class="edgtf-blog-pag-bounce1"></div>
		<div class="edgtf-blog-pag-bounce2"></div>
		<div class="edgtf-blog-pag-bounce3"></div>
	</div>
	<div class="edgtf-blog-pag-load-more">
		<?php
        if(mediadesk_edge_core_plugin_installed()) {
			echo mediadesk_edge_get_button_html(
                apply_filters(
                    'mediadesk_edge_filter_blog_template_load_more_button',
                    array(
                        'link' => 'javascript: void(0)',
                        'size' => 'large',
                        'text' => esc_html__('Load more', 'mediadesk'),
	                    'icon_pack' => 'ion_icons',
	                    'ion_icon'  => 'ion-arrow-right-c'
			        )
                )
            );
        } else { ?>
            <a itemprop="url" href="javascript:void(0)" target="_self" class="edgtf-btn edgtf-btn-large edgtf-btn-solid">
                <span class="edgtf-btn-text">
                    <?php echo esc_html__('Load more', 'mediadesk'); ?>
                    <?php echo mediadesk_edge_icon_collections()->renderIcon('ion-arrow-right-c', 'ion_icons'); ?>
                </span>
            </a>
		<?php } ?>
	</div>
<?php }