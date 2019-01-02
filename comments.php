<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html_x( 'یک پاسخ به &ldquo;%s&rdquo;', 'comments title', 'flat-personal-blog' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s پاسخ به &ldquo;%2$s&rdquo;',
						'%1$s پاسخ به &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'flat-personal-blog'
					) ),
					per_number( esc_html( number_format_i18n( $comments_number ) ) ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => __( 'پاسخ', 'flat-personal-blog' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'بعدی', 'flat-personal-blog' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'قبلی', 'flat-personal-blog' ) . '</span>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'دیدگاه‌ها بسته شده‌اند.', 'flat-personal-blog' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
