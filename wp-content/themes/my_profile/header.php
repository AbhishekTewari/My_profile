<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if( !wp_is_mobile() ){ 
        get_template_part('templates/desktop', 'header');        
    }
    else{
        get_template_part('templates/mobile', 'header');     
    } ?>

<div class="<?php echo get_post_field('post_name') ? esc_attr(get_post_field('post_name')) . '-page-class' : ''; ?>">
<!-- Your content here -->
</div>

    <div class="at-main-content" data-page="<?php echo get_post_field('post_name') ? esc_attr(get_post_field('post_name')): ''; ?>"> <!-- main content div start -->