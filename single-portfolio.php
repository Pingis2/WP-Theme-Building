<?php

/*
    Template Name: Page No Title
*/
    get_header() 
?>

<?php 
    while(have_posts()) {
        the_post(); ?>
        <div>
            <div class="content">
                <h1><?php the_title() ?></h1>
                <p><?php the_date() ?> <?php the_author() ?></p>
                <?php the_post_thumbnail() ?>
                <div><?php the_content() ?></div>
                <small><?php 
                    $terms_list = wp_get_post_terms($post->ID, 'field');
                    $i = 0;
                    foreach($terms_list as $term) { 
                        $i++;
                        if($i > 1) echo ', ';
                        echo $term->name;
                    }
                ?> ||<?php 
                    $terms_list = wp_get_post_terms($post->ID, 'software');
                    $i = 0;
                    foreach($terms_list as $term) { 
                        $i++;
                        if($i > 1) echo ', ';
                        echo $term->name;
                    }
                ?> || <?php edit_post_link() ?>
                </small>
                <?php the_content() ?>
            </div>

            <div class="row">
                <div class="pagination-newer">
                    <?php previous_post_link() ?>
                </div>
                <div class="pagination-older">
                    <?php next_post_link() ?>
                </div>
            </div>
        </div>
    <?php }
?>

<?php get_footer() ?>