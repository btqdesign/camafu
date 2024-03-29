<?php do_action('mediadesk_edge_action_before_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action( 'mediadesk_edge_action_after_sticky_menu_html_open' ); ?>
    <div class="edgtf-sticky-holder">
        <?php if($sticky_header_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class=" edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            mediadesk_edge_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
						<?php mediadesk_edge_get_sticky_menu('edgtf-sticky-nav'); ?>
						<?php if(is_active_sidebar('edgtf-sticky-right')) : ?>
                            <?php dynamic_sidebar('edgtf-sticky-right'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php do_action( 'mediadesk_edge_action_before_sticky_menu_html_close' ); ?>
</div>

<?php do_action('mediadesk_edge_action_after_sticky_header'); ?>