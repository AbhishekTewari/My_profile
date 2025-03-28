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

// Custom post type 
function create_custom_post_type() {
    $labels = array(
        'name'               => _x( 'Projects', 'post type general name', 'textdomain' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'textdomain' ),
        'menu_name'          => _x( 'Projects', 'admin menu', 'textdomain' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'textdomain' ),
        'add_new'            => _x( 'Add New', 'project', 'textdomain' ),
        'add_new_item'       => __( 'Add New Project', 'textdomain' ),
        'new_item'           => __( 'New Project', 'textdomain' ),
        'edit_item'          => __( 'Edit Project', 'textdomain' ),
        'view_item'          => __( 'View Project', 'textdomain' ),
        'all_items'          => __( 'All Projects', 'textdomain' ),
        'search_items'       => __( 'Search Projects', 'textdomain' ),
        'parent_item_colon'  => __( 'Parent Projects:', 'textdomain' ),
        'not_found'          => __( 'No projects found.', 'textdomain' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', 'textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'show_in_rest'       => true, // Enable support for Gutenberg Editor
    );

    register_post_type( 'project', $args );

    create_projects_hierarchical_taxonomy();
}
add_action( 'init', 'create_custom_post_type' );


function create_projects_hierarchical_taxonomy() {
  $labels = array(
    'name' => _x( 'Project Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Project', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Project Category' ),
    'all_items' => __( 'All Project Category' ),
    'parent_item' => __( 'Parent Project' ),
    'parent_item_colon' => __( 'Parent Project:' ),
    'edit_item' => __( 'Edit Project' ), 
    'update_item' => __( 'Update Project' ),
    'add_new_item' => __( 'Add New Project' ),
    'new_item_name' => __( 'New Project Name' ),
    'menu_name' => __( 'Project Category' ),
  );    
  
  register_taxonomy('project_category',array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project_category' ),
  ));
  
}

