<?php
//registering primary menu start.
function my_profile_at_setup() {
    add_theme_support('title-tag');
    register_nav_menus(array(
        'primary' => __('Main Menu', 'my_profile_at'),
    ));
}
add_action('after_setup_theme', 'my_profile_at_setup');
//registering primary menu ends.

// Enqueue scripts initially when site load(header).
function my_profile_at_assets() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('header_css', get_template_directory_uri().'/css/header/header.css');
    wp_enqueue_style('contact_us', get_template_directory_uri().'/css/contact-us.css');
}
add_action('wp_enqueue_scripts', 'my_profile_at_assets');
// Enqueue scripts initially when site load(header) ENDS.


// Enqueue js .
function my_profile_at_js() {
    wp_enqueue_script('header_js', get_template_directory_uri().'/js/header.js',array('jquery'), '', false);
    wp_enqueue_script('common_js', get_template_directory_uri().'/js/at_common.js',array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'my_profile_at_js');
// Enqueue js ENDS.


// Enable featured images in WordPress
function enable_featured_images() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
}
add_action('after_setup_theme', 'enable_featured_images');

// ALL CF7 form validation sarts //
// require_once( get_template_directory() . "/cf7-form-validation.php" );

add_filter('wpcf7_validate_text*', 'strip_html_from_cf7_fields', 10, 2);
add_filter('wpcf7_validate_text', 'strip_html_from_cf7_fields', 10, 2);

function strip_html_from_cf7_fields( $result, $tag ) {
    $name = $tag->name;
    $value = isset( $_POST[ $name ]) ? $_POST[ $name ] : '';
    // Strip all HTML tags
    $value = wp_strip_all_tags( $value );

    // Update POST data with clean value
    $_POST[$name] = $value;

    // Validate if field is required
    if ( !empty( $value ) && ( $tag->type == "text*" || $tag->type == "text" ) ) {
        $regex = '/<[^>]*>|[^\w\s.,]/g';
        if ( preg_match( $regex, $value ) ) {
            $result->invalidate( $tag, "Field contains special charators or HTML tags." );
        }
    }

    return $result;
}

