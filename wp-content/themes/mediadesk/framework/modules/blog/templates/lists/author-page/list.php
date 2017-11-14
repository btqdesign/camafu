<?php
$social_networks   = mediadesk_edge_core_plugin_installed() ? mediadesk_edge_get_user_custom_fields() : false;
$display_author_social = mediadesk_edge_options()->getOptionValue('blog_single_author_social') === 'no' ? false : true;
?>
<div class="<?php echo esc_attr( $blog_classes ) ?>" <?php echo esc_attr( $blog_data_params ) ?>>
	<div class="edgtf-blog-holder-inner">
		<div class="edgtf-unique-author-layout clearfix">
			<div class="edgtf-author-description">
				<div class="edgtf-author-description-image">
					<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
						<?php echo mediadesk_edge_kses_img(get_avatar(get_the_author_meta( 'ID' ), 144)); ?>
					</a>
				</div>
				<div class="edgtf-author-description-text">
					<p class="edgtf-author-name vcard author">
						<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
					<span class="fn">
						<span class="edgtf-author-name-label"><?php esc_html_e('About the Author /', 'mediadesk'); ?></span>
						<span class="edgtf-author-name-title"><?php
							if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
								echo esc_html(get_the_author_meta('first_name')) . " " . esc_html(get_the_author_meta('last_name'));
							} else {
								echo esc_html(get_the_author_meta('display_name'));
							}
							?></span>
					</span>
						</a>
					</p>
					<?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email'))){ ?>
						<p itemprop="email" class="edgtf-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
					<?php } ?>
					<?php if(get_the_author_meta('description') != "") { ?>
						<div class="edgtf-author-text">
							<p itemprop="description"><?php echo esc_html(get_the_author_meta('description')); ?></p>
						</div>
					<?php } ?>
					<?php if($display_author_social) { ?>
						<?php if(is_array($social_networks) && count($social_networks)){ ?>
							<div class="edgtf-author-social-icons clearfix">
								<?php foreach($social_networks as $network){ ?>
									<a itemprop="url" href="<?php echo esc_attr($network['link'])?>" target="_blank">
										<?php echo mediadesk_edge_icon_collections()->renderIcon($network['class'], 'font_elegant'); ?>
									</a>
								<?php }?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<?php
			$layout_params = array();
			
			/***** Get current author page ID and meta boxes options from author admin panel *****/
			$layout_params['author_id'] = esc_attr( mediadesk_edge_get_current_object_id() );
			$layout_params['posts_per_page'] = intval( get_option( 'posts_per_page' ) );
			$layout_params['column_number'] = '2';
			$layout_params['space_between_items'] = 'medium';
			$layout_params['title_tag'] = 'h3';
			$layout_params['display_pagination'] = 'yes';
			$layout_params['pagination_type'] = 'standard';
			echo mediadesk_edge_execute_shortcode( 'edgtf_layout2', $layout_params ); ?>
		</div>
	</div>
</div>