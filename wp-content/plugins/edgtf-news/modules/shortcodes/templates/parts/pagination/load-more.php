<?php if ( $query_result->max_num_pages > 1 ) { ?>
	<div class="edgtf-news-pag-loading">
		<div class="edgtf-news-pag-bounce1"></div>
		<div class="edgtf-news-pag-bounce2"></div>
		<div class="edgtf-news-pag-bounce3"></div>
	</div>
	<div class="edgtf-news-load-more-pagination">
		<?php
		if ( mediadesk_edge_core_plugin_installed() ) {
			echo mediadesk_edge_get_button_html(
				apply_filters(
					'edgtf_news_shortcodes_load_more',
					array(
						'link' => 'javascript: void(0)',
						'size' => 'large',
						'text' => esc_html__( 'Load more', 'edgtf-news' ),
						'icon_pack' => 'ion_icons',
						'ion_icon'  => 'ion-arrow-right-c',
						'class'    => 'edgtf-btn-custom-hover-color'
					)
				)
			);
		} else { ?>
			<a itemprop="url" href="javascript:void(0)" target="_self" class="edgtf-btn edgtf-btn-large edgtf-btn-solid">
                <span class="edgtf-btn-text"><?php echo esc_html__( 'Load more', 'edgtf-news' ); ?></span>
				<?php echo mediadesk_edge_icon_collections()->renderIcon('ion-arrow-right-c', 'ion_icons'); ?>
			</a>
		<?php } ?>
	</div>
<?php }