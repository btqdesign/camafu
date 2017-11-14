<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$edgtf_sidebar_layout = mediadesk_edge_sidebar_layout();

get_header();
mediadesk_edge_get_title();
get_template_part( 'slider' );

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<div class="edgtf-grid-row edgtf-grid-medium-gutter">
				<div <?php echo mediadesk_edge_get_content_sidebar_class(); ?>>
					<?php mediadesk_edge_woocommerce_content(); ?>
				</div>
				<?php if ( $edgtf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo mediadesk_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<?php mediadesk_edge_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>