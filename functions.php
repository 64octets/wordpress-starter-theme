<?php
/**
 * Alpha functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alpha
 */


// Enable Google jQuery CDN
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


if ( ! function_exists( 'alpha_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alpha_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Alpha, use a find and replace
	 * to change 'alpha' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alpha', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in primary location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'alpha' ),
	) );

	// This theme uses wp_nav_menu() in secondary location.
	register_nav_menus( array(
		'secondary' => esc_html__( 'Secondary', 'alpha' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alpha_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // alpha_setup
add_action( 'after_setup_theme', 'alpha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alpha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alpha_content_width', 640 );
}
add_action( 'after_setup_theme', 'alpha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alpha_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alpha' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alpha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alpha_scripts() {

	wp_enqueue_style( 'alpha-style', get_stylesheet_uri() );
	wp_enqueue_script( 'alpha-all-min-js', get_template_directory_uri() . '/js/all.min.js', array(), '20130150', true );
    wp_register_style( 'social-style', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), null, null );

    wp_enqueue_style( 'social-style' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alpha_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


/**
 * Load CMB2 Custom Meta Boxes
 */
//require get_template_directory() . '/custom-boxes.php';

// Enable Dashicons in front end

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}

// Check for theme updates
//require 'theme-update-checker.php';
//$example_update_checker = new ThemeUpdateChecker(	'alpha', 'https://alphatheme.com/info.json' );




function alpha_customizer_social_media_array() {
	$social_sites = array('twitter', 'facebook', 'flickr', 'pinterest', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');
	return $social_sites;
}

function alpha_signup_customizer($wp_customize){

	$wp_customize->add_section('footer_settings_section', array(
	  'title'          => __('Footer settings', 'alpha')
	 ));

	$wp_customize->add_section( 'alpha_social_settings', array(
			'title'    => __('Social media icons', 'alpha')
	));


	$wp_customize->add_setting('ga_setting', array(
	 'default'     => 'UA-XXXXX-XX',
 	 'sanitize_callback' => 'esc_textarea',

	 ));
	$wp_customize->add_control('ga_setting', array(
	 'label'   => 'Google Analytics Code:',
	 'section' => 'footer_settings_section',
	 'type'    => 'text'
	));


	$wp_customize->add_setting( 'alpha_logo', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alpha_logo', array(
		'label'    => __( 'Logo', 'alpha' ),
		'section'  => 'title_tagline',
		'settings' => 'alpha_logo',
	)));


	$wp_customize->add_setting( 'alpha_share_image', array(
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alpha_share_image', array(
		'label'    => 'Default share image',
		'description' =>  'This image shows if there isn’t a feature image.',
		'section'  => 'title_tagline',
		'settings' => 'alpha_share_image',
	)));


	$wp_customize->add_setting('formurl_setting', array(
	 'default'     => 'Add your MailChimp for form action URL here',
	 'sanitize_callback' => 'esc_url'
	 ));
	$wp_customize->add_control('formurl_setting', array(
	 'label'   => 'Form action URL:',
	 'section' => 'footer_settings_section',
	 'type'    => 'text'
	));

	$wp_customize->add_setting('formblurb_setting', array(
	 'default'     => 'Add some text here.',
	 'sanitize_callback' => 'alpha_sanitize_text',
	 'transport' => 'refresh',
	 ));
	$wp_customize->add_control('formblurb_setting', array(
	 'label'   => 'Signup form blurb text:',
	 'section' => 'footer_settings_section',
	 'type'    => 'textarea'
	));

	$wp_customize->add_setting('showform_setting', array(
	 'default'     => 0,
	 'sanitize_callback' => 'alpha_sanitize_checkbox'

	 ));
	$wp_customize->add_control('showform_setting', array(
	 'label'   => 'Show signup form',
	 'section' => 'footer_settings_section',
	 'type'    => 'checkbox',
	));

	$social_sites = alpha_customizer_social_media_array();

	foreach($social_sites as $social_site) {

		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'alpha' ),
				'section'  => 'alpha_social_settings',
				'type'     => 'text'		));

	}


function alpha_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input, array( 'strong' => array(), 'a' => array('href') ) ) );
}

function alpha_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

} add_action('customize_register', 'alpha_signup_customizer');



function alpha_social_media_icons() {
    $social_sites = alpha_customizer_social_media_array();

    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }

        if ( ! empty( $active_sites ) ) {

            echo '<ul class="social-icons">';

            foreach ( $active_sites as $active_site ) {

	            /* setup the class */
		        $class = 'fa fa-' . $active_site;

                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo esc_url( get_theme_mod( $active_site ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email', 'alpha'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s', 'alpha'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
        }
}
