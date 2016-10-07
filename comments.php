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
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->
		<ul class="mdl-list comment-list">
			<?php
			wp_list_comments( array(
				'callback' => 'epixmdl_comment',
			) );
			?>
		</ul>
	<?php endif; // Check for have_comments().
	comment_form();
	?>
	<div id="respond" class="mdl-card__supporting-text">
		<form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform"
		      class="comment-form">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-author">
				<input class="mdl-textfield__input" type="text" id="author">
				<label class="mdl-textfield__label" for="author">Name</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-email">
				<input class="mdl-textfield__input" type="text" id="email">
				<label class="mdl-textfield__label" for="email">Email</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-url">
				<input class="mdl-textfield__input" type="text" id="url">
				<label class="mdl-textfield__label" for="url">Website</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label comment-form-comment">
				<textarea class="mdl-textfield__input" rows= "3" id="comment" ></textarea>
				<label class="mdl-textfield__label" for="comment">Content</label>
			</div>
			<button name="submit" type="submit" id="submit" class="mdl-button mdl-js-button mdl-button--primary submit">
				submit
			</button>
		</form>
	</div>
</div><!-- #comments -->
