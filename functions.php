<?php
/**
 * EpixMDL functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EpixMDL
 */

if ( ! function_exists( 'epixmdl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function epixmdl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EpixMDL, use a find and replace
		 * to change 'epixmdl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'epixmdl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'epixmdl' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'audio',
			'quote',
			'status',
			'gallery',
			'link',
		) );
		add_image_size( 'w320h320', 320, 320, true );
	}
endif;
add_action( 'after_setup_theme', 'epixmdl_setup' );

if ( ! function_exists( 'epixmdl_comment' ) ) :
	function epixmdl_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
	<li <?php comment_class( "mdl-list__item mdl-list__item--three-line" ) ?> id="<?php comment_ID() ?>">
		<span class="mdl-list__item-primary-content comment-body">
			<a href="<?php echo get_comment_author_url() ?>">
				<?php echo get_avatar( $comment, 40, '', '', array( 'class' => 'mdl-list__item-avatar', ) ); ?>
			</a>
			<a href="<?php echo get_comment_author_url() ?>">
				<span><?php echo get_comment_author() ?></span>
			</a>
			<span>@</span>
			<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
				<time datetime="<?php comment_time( 'c' ); ?>">
					<?php echo get_comment_date() . '&nbsp;' . get_comment_time(); ?>
				</time>
			</a>
			<span class="mdl-list__item-text-body comment-content">
				<?php comment_text(); ?>
			</span>
		</span>
		<span class="mdl-list__item-secondary-content">
			 <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">reply</i></a>
		</span>

		<?php
	}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function epixmdl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'epixmdl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'epixmdl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'epixmdl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function epixmdl_scripts() {
	wp_enqueue_script( 'epixmaterialwp-google-md-script', 'https://code.getmdl.io/1.2.1/material.min.js', array(), '20161005', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'epixmdl_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
