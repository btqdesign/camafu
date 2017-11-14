<?php
$tags = get_the_tags();
?>
<?php if($tags) { ?>
<div class="edgtf-tags-holder">
	<span class="edgtf-tags-label"><?php esc_html_e('Tags:', 'mediadesk'); ?></span>
	<div class="edgtf-tags"><?php the_tags('', ', ', ''); ?></div>
</div>
<?php } ?>