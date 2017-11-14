<?php
$show_related = mediadesk_edge_options()->getOptionValue('blog_single_related_posts') == 'yes' ? true : false;
$related_posts_options = array(
    'posts_per_page' => 3
);
$related_posts = mediadesk_edge_get_blog_related_post_type(get_the_ID(), $related_posts_options);
$related_posts_image_size = isset($related_posts_image_size) ? $related_posts_image_size : 'full';
?>
<?php if($show_related) { ?>
    <div class="edgtf-related-posts-holder clearfix">
            <?php if ( $related_posts && $related_posts->have_posts() ) : ?>
                <h2 class="edgtf-related-posts-title"><?php esc_html_e('You may also like', 'mediadesk' ); ?></h2>
                <div class="edgtf-related-posts-inner clearfix">
                    <?php while ( $related_posts->have_posts() ) : $related_posts->the_post();
	                    $image_meta          = get_post_meta( get_the_ID(), 'edgtf_blog_list_featured_image_meta', true );
	                    ?>
                        <div class="edgtf-related-post">
                            <div class="edgtf-related-post-inner">
                                <div class="edgtf-related-post-image">
	                                <?php if ( has_post_thumbnail() || ! empty( $image_meta ) ) { ?>
		                                <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			                                <?php if ( ! empty( $image_meta ) ) { ?>
				                                <img itemprop="image" class="edgtf-custom-post-image" src="<?php echo esc_url( $image_meta ); ?>" alt="<?php esc_html_e( 'Related Post Image', 'mediadesk' ); ?>" />
			                                <?php } else { ?>
				                                <?php the_post_thumbnail($related_posts_image_size); ?>
			                                <?php } ?>
		                                </a>
	                                <?php } ?>
                                </div>
	                            <div class="edgtf-post-info edgtf-post-info-top">
		                            <?php mediadesk_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params); ?>
		                            <?php mediadesk_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params); ?>
	                            </div>
                                <h3 itemprop="name" class="entry-title edgtf-post-title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	                            <div class="edgtf-post-info edgtf-post-info-bottom">
		                            <?php mediadesk_edge_get_module_template_part('templates/parts/post-info/like', 'blog', '', $params); ?>
		                            <?php mediadesk_edge_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params); ?>
	                            </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            wp_reset_postdata();
            ?>
    </div>
<?php } ?>