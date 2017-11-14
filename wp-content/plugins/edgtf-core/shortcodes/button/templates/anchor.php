<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php mediadesk_edge_inline_style($button_styles); ?> <?php mediadesk_edge_class_attribute($button_classes); ?> <?php echo mediadesk_edge_get_inline_attrs($button_data); ?> <?php echo mediadesk_edge_get_inline_attrs($button_custom_attrs); ?>>
    <span class="edgtf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo mediadesk_edge_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>