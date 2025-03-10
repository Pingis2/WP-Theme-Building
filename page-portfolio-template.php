<?php

/*
    Template Name: Portfolio template
*/
    //get_header() 
?>

<?php 

    $args = array('post_type' => 'portfolio', 'posts_per_page' => 3);
    $loop = new WP_Query($args);

    while( $loop->have_posts()) {
        $loop->the_post(); ?>

        <?php get_template_part('content', 'archive') ?>
        
    <?php }
?>

<?php echo do_shortcode('[oxilab_flip_box  id="1"]'); ?>

<?php //get_footer() ?>
