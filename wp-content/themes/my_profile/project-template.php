<?php
    /**
    * Template Name: Projects Template
    */
?>
<?php get_header(); ?>
    <?php 
       $categories = get_terms(array(
        'taxonomy'   => 'project_category', // Default WordPress category taxonomy
        'hide_empty' => true, // Set to false to get empty categories too
        'parent'     => 0,
        'object_ids' => get_posts(array(
            'post_type'      => 'project',
            'numberposts'    => -1,
            'fields'         => 'ids', // Get only post IDs
        )),
    ));

    if( !empty( $categories ) ){
        
        echo '<div class="main-wrap">';
        foreach( $categories as $key => $value )
        {
            $image_arr = get_field( "category_image", "project_category_".$value->term_id);
            $image_url = "";
            if( is_array( $image_arr ) && !empty( $image_arr ) && isset( $image_arr['url'] ) )
            {
                $image_url = $image_arr['url'];
            }
            ?>

            <div class="card_info_column">
                <div class="image_column">
                    <img src="<?php echo $image_url; ?>">
                </div>
                <div class="project_title_desc">
                    <h2><?php echo $value->name; ?></h2> <a href="<?php echo site_url().'/project_category/'.$value->slug ?>" target="_blank" class="explore-button">Explore Projects</a>
                    <p><?php echo $value->description; ?></p>
                </div>
            </div>
        <?php }
        echo "</div>";   
    }else{
        echo "Parent Ctaegory is not Available";
    }

    ?>
<?php get_footer(); ?>