<?php

get_header();
mediadesk_edge_get_title();
get_template_part( 'slider' );

$post_template = mediadesk_edge_get_meta_field_intersect( 'news_post_template', get_the_ID() );;

if ( have_posts() ) : while ( have_posts() ) : the_post();
	//Get blog single type and load proper helper
	edgtf_news_include_blog_helper_functions( $post_template );
	
	//Action added for applying module specific filters that couldn't be applied on init
	do_action( 'mediadesk_edge_action_blog_single_loaded' );
	
	//Get classes for holder and holder inner
	$edgtf_holder_params = edgtf_news_get_holder_params_blog();
	?>
	<div class="<?php echo esc_attr( $edgtf_holder_params['holder'] ); ?>">
		<?php do_action( 'mediadesk_edge_action_after_container_open' ); ?>
		
		<div class="<?php echo esc_attr( $edgtf_holder_params['inner'] ); ?>">
			<?php edgtf_news_get_blog_single( $post_template ); ?>
		</div>
		
		<?php do_action( 'mediadesk_edge_action_before_container_close' ); ?>
	</div>
<?php endwhile; endif;

get_footer(); ?>