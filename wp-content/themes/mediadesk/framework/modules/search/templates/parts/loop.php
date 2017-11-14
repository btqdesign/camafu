<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	$image_meta          = get_post_meta( get_the_ID(), 'edgtf_blog_list_featured_image_meta', true );
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="edgtf-post-content">
	        <?php if ( has_post_thumbnail() || ! empty( $image_meta ) ) { ?>
		        <div class="edgtf-post-image">
			        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				        <?php if ( ! empty( $image_meta ) ) {
				        	$small_image_version = mediadesk_edge_resize_image( null, $image_meta, 196, 140 );
				        	?>
					        <img itemprop="image" class="edgtf-custom-post-image" src="<?php echo esc_url( $small_image_version['img_url'] ); ?>" alt="<?php esc_html_e( 'Blog List Featured Image', 'mediadesk' ); ?>" />
				        <?php } else { ?>
					        <?php the_post_thumbnail( array(196, true) ); ?>
				        <?php } ?>
			        </a>
		        </div>
	        <?php } ?>
	        <div class="edgtf-post-title-area <?php if ( ! has_post_thumbnail() ) { echo esc_attr( 'edgtf-no-thumbnail' ); } ?>">
		        <div class="edgtf-post-title-area-inner">
			        <h4 itemprop="name" class="edgtf-post-title entry-title">
				        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			        </h4>
			        <div class="edgtf-post-info">
				        <div class="edgtf-post-info-author">
					        <a itemprop="author" class="edgtf-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
						        <?php the_author_meta('display_name'); ?>
					        </a>
				        </div>
				        <div itemprop="dateCreated" class="edgtf-post-info-date entry-date published updated">
					        <?php the_time(get_option('date_format')); ?>
						    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(mediadesk_edge_get_page_id()); ?>"/>
				        </div>
			        </div>
			        <?php
			        $edgtf_my_excerpt = get_the_excerpt();
			        
			        if ( ! empty( $edgtf_my_excerpt ) ) { ?>
				        <p itemprop="description" class="edgtf-post-excerpt"><?php echo wp_trim_words( esc_html( $edgtf_my_excerpt ), 30 ); ?></p>
			        <?php } ?>
		        </div>
	        </div>
        </div>
    </article>
<?php endwhile; ?>
<?php else: ?>
	<p class="edgtf-blog-no-posts"><?php esc_html_e( 'No posts were found.', 'mediadesk' ); ?></p>
<?php endif; ?>