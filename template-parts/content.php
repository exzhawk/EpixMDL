<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EpixMDL
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mdl-grid mdl-grid--no-spacing mdl-shadow--2dp'); ?>>
    <?php if (!is_single()): ?>
        <header class="">
            <?php the_post_thumbnail('w320h320'); ?>
        </header>
    <?php endif; ?>
    <div class="mdl-card">
        <div class="mdl-card__title entry-header">
            <?php the_title('<h2 class="mdl-card__title-text entry-title">', '</h2>') ?>
        </div>
        <?php $post_tags = get_the_tags();
        if ($post_tags) {
            ?>
            <div class="mdl-card__supporting-text">
                <?php foreach ($post_tags as $tag) {
                    printf('<a href="%1$s" class="tag-chip"><span class="mdl-chip"><span class="mdl-chip__text">%2$s</span></span></a>',
                        get_term_link($tag), $tag->name);
                } ?>
            </div>
        <?php }; ?>
        <div class="mdl-card__supporting-text entry-content mdl-color-text--grey-800">
            <?php is_single()?the_content():the_excerpt();
            ?>
        </div><!-- .entry-content -->
        <span class="flex-padding"></span>
        <div class="mdl-card__actions entry-footer mdl-grid">
            <?php
            $post_cat = get_the_category()[0];
            printf('<a href="%1$s" class="mdl-button md-js-button md-js-ripple-effect"><i class="material-icons">label</i>%2$s</a>',
                get_term_link($post_cat), $post_cat->name);

            printf('<a href ="%1$s" class="mdl-button md-js-button md-js-ripple-effect" rel="bookmark">
                    <i class="material-icons">update</i>
                    <time class="entry-date published updated" datetime="%2$s">%3$s</time></a>',
                esc_url(get_permalink()), esc_attr(get_the_date('c')), esc_html(get_the_date()));
            printf('<a href="%1$s" class="mdl-button md-js-button md-js-ripple-effect"><i class="material-icons">comment</i>%2$s comment</a>',
                get_permalink() . '#comments', get_comments_number());
            ?>
            <span class="flex-padding"></span>
            <?php
            printf('<a href="%1$s" class="mdl-button md-js-button md-js-ripple-effect">read more<i class="material-icons">expand_more</i></a>',
                get_permalink());
            ?>
        </div><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->
