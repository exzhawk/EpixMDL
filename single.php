<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EpixMDL
 */

get_header(); ?>

    <div id="primary" class="content-area  mdl-cell mdl-cell--8-col">

        <?php
        while (have_posts()) : the_post();

            get_template_part('template-parts/content', get_post_format());

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </div><!-- #primary -->
<?php get_sidebar(); ?>
    </div>
<?php

get_footer();
