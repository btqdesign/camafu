<?php do_action('mediadesk_edge_action_before_mobile_navigation'); ?>

<nav class="edgtf-mobile-nav">
    <div class="edgtf-grid">
        <?php wp_nav_menu(array(
            'theme_location' => 'mobile-navigation' ,
            'container'  => '',
            'container_class' => '',
            'menu_class' => '',
            'menu_id' => '',
            'fallback_cb' => 'top_navigation_fallback',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'walker' => new MediaDeskClassMobileNavigationWalker()
        )); ?>
    </div>
</nav>

<?php do_action('mediadesk_edge_action_after_mobile_navigation'); ?>