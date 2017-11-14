<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="edgtf-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="edgtf-comment-holder-inner">
				<h2 class="edgtf-comments-title"><?php esc_html_e( 'Comments', 'mediadesk' ); ?></h2>
				<div class="edgtf-comments">
					<ul class="edgtf-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'mediadesk_edge_comment' ), apply_filters( 'mediadesk_edge_filter_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'mediadesk' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$edgtf_commenter = wp_get_current_commenter();
		$edgtf_req       = get_option( 'require_name_email' );
		$edgtf_aria_req  = ( $edgtf_req ? " aria-required='true'" : '' );
		
		$edgtf_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Leave a comment', 'mediadesk' ),
			'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h2>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'mediadesk' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'mediadesk' ),
			'label_submit'         => esc_html__( 'Post Comment', 'mediadesk' ),
			'comment_field'        => apply_filters( 'mediadesk_edge_filter_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_html__( 'Comment', 'mediadesk' ) . '" name="comment" cols="45" rows="6" aria-required="true"></textarea>' ),
			'comment_notes_before' => '<h5 class="edgtf-comment-notes">' . esc_html__( 'Add your comment here', 'mediadesk' ) . '</h5>',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'mediadesk_edge_filter_comment_form_default_fields', array(
				'author' => '<div class="edgtf-grid-row edgtf-grid-small-gutter"><div class="edgtf-grid-col-6"><input id="author" name="author" placeholder="' . esc_html__( 'Name', 'mediadesk' ) . '" type="text" value="' . esc_attr( $edgtf_commenter['comment_author'] ) . '"' . $edgtf_aria_req . ' /></div>',
				'email'  => '<div class="edgtf-grid-col-6"><input id="email" name="email" placeholder="' . esc_html__( 'Email', 'mediadesk' ) . '" type="text" value="' . esc_attr( $edgtf_commenter['comment_author_email'] ) . '"' . $edgtf_aria_req . ' /></div></div>',
				'url'    => '<input id="url" name="url" placeholder="' . esc_html__( 'Website', 'mediadesk' ) . '" type="text" value="' . esc_attr( $edgtf_commenter['comment_author_url'] ) . '" size="30" maxlength="200" />'
			) )
		);
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="edgtf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $edgtf_show_comment_form = apply_filters('mediadesk_edge_filter_show_comment_form_filter', true);
    if($edgtf_show_comment_form) {
    ?>
        <div class="edgtf-comment-form clearfix">
	        <?php comment_form( $edgtf_args ); ?>
        </div>
    <?php } ?>
<?php } ?>	