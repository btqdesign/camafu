<?php

mediadesk_edge_get_single_post_format_html($blog_single_type);

do_action('mediadesk_edge_action_after_article_content');

mediadesk_edge_get_module_template_part('templates/parts/single/single-navigation', 'blog');

mediadesk_edge_get_module_template_part('templates/parts/single/author-info', 'blog');

mediadesk_edge_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

mediadesk_edge_get_module_template_part('templates/parts/single/comments', 'blog');