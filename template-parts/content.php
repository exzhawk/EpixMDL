<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EpixMDL
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mdl-grid mdl-grid--no-spacing mdl-shadow--2dp' ); ?>>
	<?php if ( ! is_single() ): ?>
		<header class="">
			<?php the_post_thumbnail( 'w320h320' ); ?>
		</header>
	<?php endif; ?>
	<div class="mdl-card">
		<div class="mdl-card__title entry-header">
			<?php the_title( '<h2 class="mdl-card__title-text entry-title">', '</h2>' ) ?>
		</div>
		<?php $post_tags = get_the_tags();
		if ( $post_tags ) : ?>
			<div class="mdl-card__supporting-text">
				<?php foreach ( $post_tags as $tag ) : ?>
					<a href="<?php echo get_term_link( $tag ); ?>" class="tag-chip">
				<span class="mdl-chip">
					<span class="mdl-chip__text"><?php echo $tag->name; ?></span>
				</span>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="mdl-card__supporting-text entry-content mdl-color-text--grey-800">
			<?php is_single() ? the_content() : the_excerpt(); ?>
		</div><!-- .entry-content -->
		<span class="flex-padding"></span>
		<div class="mdl-card__actions entry-footer mdl-grid">
			<?php
			$post_cat = get_the_category()[0];
			?>
			<a href="<?php echo get_term_link( $post_cat ); ?>" class="mdl-button md-js-button md-js-ripple-effect">
				<i class="material-icons">label</i><?php echo $post_cat->name; ?>
			</a>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="mdl-button md-js-button md-js-ripple-effect"
			   rel="bookmark">
				<i class="material-icons">update</i>
				<time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
					<?php echo esc_html( get_the_date() ) ?>
				</time>
			</a>
			<a href="<?php echo get_permalink() . '#comments'; ?>" class="mdl-button md-js-button md-js-ripple-effect">
				<i class="material-icons">comment</i><?php echo get_comments_number(); ?> comment
			</a>
			<?php if ( ! is_single() ): ?>
				<span class="flex-padding"></span>
				<a href="<?php echo get_permalink(); ?>" class="mdl-button md-js-button md-js-ripple-effect">
					read more<i class="material-icons">expand_more</i>
				</a>
			<?php endif; ?>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
