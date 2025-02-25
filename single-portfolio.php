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
                <small><?php the_category('') ?> || <?php the_tags() ?> || <?php edit_post_link() ?></small>
            </div>
            <hr>

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