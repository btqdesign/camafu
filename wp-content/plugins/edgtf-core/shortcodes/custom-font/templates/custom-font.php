<<?php echo esc_attr( $title_tag ); ?> class="edgtf-custom-font-holder <?php echo esc_attr( $holder_classes ); ?>" <?php mediadesk_edge_inline_style( $holder_styles ); ?> <?php echo mediadesk_edge_get_inline_attrs( $holder_data ); ?>>
	<?php echo wp_kses_post( $title ); ?>
</<?php echo esc_attr( $title_tag ); ?>>