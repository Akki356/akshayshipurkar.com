<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package nouveau
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

?>

<div id="comments" class="comments-area">

<?php if ( post_password_required() ) { return; } ?>

<section id="comments" class="themeform">

	<?php if ( have_comments() ) : global $wp_query; ?>

		<h3 class="heading"><?php comments_number( __( 'No Responses', 'nouveau' ), __( '1 Response', 'nouveau' ), __( '% Responses', 'nouveau' ) ); ?></h3>
		<ul class="comment-tabs group">
		<?php $comments_by_type = &separate_comments($comments); ?>

			<li class="active"><a href="#commentlist-container"><i class="fa fa-comments"></i><?php echo count($comments_by_type['comment']); ?> <?php _e( 'Comments', 'nouveau' ); ?></a></li>
			<li><a href="#pinglist-container"><i class="fa fa-share"></i><?php echo count($comments_by_type['pings']); ?> <?php _e( 'Track/Pingbacks', 'nouveau' ); ?></a></li>
		</ul>

		<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<div id="commentlist-container" class="comment-tab">

			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=96&type=comment' ); ?>
			</ol><!--/.commentlist-->

			<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
			<nav class="comments-nav group">
				<div class="nav-previous"><?php previous_comments_link(); ?></div>
				<div class="nav-next"><?php next_comments_link(); ?></div>
			</nav><!--/.comments-nav-->
			<?php endif; ?>

		</div>
		<?php } ?>

		<?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>
		<div id="pinglist-container" class="comment-tab" style="display: none;">

			<ol class="pinglist">
				<?php // not calling wp_list_comments twice, as it breaks pagination
				$pings = $comments_by_type['pings'];
				foreach ($pings as $ping) { ?>
					<li class="ping">
						<div class="ping-link"><?php comment_author_link($ping); ?></div>
						<div class="ping-meta"><?php comment_date( get_option( 'date_format' ), $ping ); ?></div>
						<div class="ping-content"><?php comment_text($ping); ?></div>
					</li>
				<?php } ?>
			</ol><!--/.pinglist-->

		</div>
		<?php } ?>

	<?php else: // if there are no comments yet ?>

		<?php if (comments_open()) : ?>
			<!-- comments open, no comments -->
		<?php else : ?>
			<!-- comments closed, no comments -->
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( comments_open() ) { comment_form(); } ?>
</section><!--/#comments-->   
</div><!-- #comments -->
