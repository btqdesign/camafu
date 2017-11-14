<?php
$image_size          = isset( $image_size ) ? $image_size : 'full';
$image_meta          = get_post_meta( get_the_ID(), 'edgtf_blog_list_featured_image_meta', true );
$has_featured        = ! empty( $image_meta ) || has_post_thumbnail();
$blog_list_image_src = ! empty( $image_meta ) && mediadesk_edge_blog_item_has_link() ? $image_meta : '';
?>

<?php if ( $has_featured ) { ?>
	<div class="edgtf-post-image">
		<?php if ( mediadesk_edge_blog_item_has_link() ) { ?>
			<a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php } ?>
			<?php if ( ! empty( $blog_list_image_src ) ) { ?>
				<img itemprop="image" class="edgtf-custom-post-image" src="<?php echo esc_url( $blog_list_image_src ); ?>" alt="<?php esc_html_e( 'Blog List Featured Image', 'mediadesk' ); ?>" />
			<?php } else { ?>
				<?php the_post_thumbnail( $image_size ); ?>
			<?php } ?>
		<?php if ( mediadesk_edge_blog_item_has_link() ) { ?>
			</a>
		<?php } ?>
		<?php do_action('mediadesk_edge_action_blog_inside_image_tag')?>
	</div>
<?php } ?>