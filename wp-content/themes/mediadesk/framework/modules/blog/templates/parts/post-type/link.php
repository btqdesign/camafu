<?php
$title_tag = isset($link_tag) ? $link_tag : 'h5';
$post_link_meta = get_post_meta(get_the_ID(), "edgtf_post_link_link_meta", true );

if(mediadesk_edge_get_blog_module() == 'list') {
    $post_link = get_the_permalink();
} else {
    if(!empty($post_link_meta)) {
        $post_link = esc_html($post_link_meta);
    }
}
?>
<div class="edgtf-post-link-holder">
	<div class="edgtf-post-mark">
		<span class="fa fa-link edgtf-link-mark"></span>
	</div>
	<<?php echo esc_attr($title_tag);?> itemprop="name" class="edgtf-link-title edgtf-post-title">
	<?php echo get_the_title(); ?>
</<?php echo esc_attr($title_tag);?>>
	<?php if(isset($post_link) && $post_link != '') { ?>
		<a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>" target="_blank"></a>
	<?php } ?>
</div>