<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EpixMDL
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area mdl-card mdl-shadow--2dp">

	<?php
	if ( have_comments() ) : ?>
		<ul class="mdl-list comment-list">
			<?php
			wp_list_comments( array(
				'callback' => 'epixmdl_comment',
			) );
			?>
		</ul>
	<?php endif; // Check for have_comments().
	?>
	<div id="respond" class="mdl-card__supporting-text">
		<form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform"
		      class="comment-form mdl-grid">
			<div class="comment-text-wrapper mdl-cell mdl-cell--4-col">
				<label class="mdl-button mdl-js-button mdl-button--icon" for="author">
					<i class="material-icons">person</i>
				</label>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-author">
					<input class="mdl-textfield__input" type="text" id="author" name="author" required>
					<label class="mdl-textfield__label" for="author">Name</label>
				</div>
			</div>
			<div class="comment-text-wrapper mdl-cell mdl-cell--4-col">
				<label class="mdl-button mdl-js-button mdl-button--icon" for="email">
					<i class="material-icons">email</i>
				</label>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-email">
					<input class="mdl-textfield__input" type="email" id="email" name="email" required>
					<label class="mdl-textfield__label" for="email">Email</label>
				</div>
			</div>
			<div class="comment-text-wrapper mdl-cell mdl-cell--4-col">
				<label class="mdl-button mdl-js-button mdl-button--icon" for="url">
					<i class="material-icons">link</i>
				</label>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-url">
					<input class="mdl-textfield__input" type="text" id="url" name="url">
					<label class="mdl-textfield__label" for="url">Website</label>
				</div>
			</div>
			<div class="comment-text-wrapper mdl-cell mdl-cell--12-col">
				<label class="mdl-button mdl-js-button mdl-button--icon" for="url">
					<i class="material-icons">link</i>
				</label>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-comment">
					<textarea class="mdl-textfield__input" rows="3" id="comment" name="comment" required></textarea>
					<label class="mdl-textfield__label" for="comment">Content</label>
				</div>
			</div>
			<input name="submit" type="submit" id="submit" class="mdl-button mdl-js-button mdl-button--primary submit">
			<?php echo get_comment_id_fields(); ?>
		</form>
	</div>
</div><!-- #comments -->
