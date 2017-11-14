<?php
$share_type       = isset( $share_type ) ? $share_type : 'list';
$allow_icon_label = isset( $allow_icon_label ) ? $allow_icon_label : '';
?>
<?php if(mediadesk_edge_options()->getOptionValue('enable_social_share') === 'yes' && mediadesk_edge_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="edgtf-blog-share">
        <?php echo mediadesk_edge_get_social_share_html(array('type' => $share_type, 'allow_icon_label' => $allow_icon_label)); ?>
    </div>
<?php } ?>