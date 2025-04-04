<?php get_header(); ?>
<div class="ctfc-content">
    <?php
    while (have_posts()) : the_post();
        the_title('<h1>', '</h1>');
        the_content();
    endwhile;
    ?>
</div>
<?php get_footer(); ?>
