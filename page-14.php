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
                <h1>This is my static title</h1>
                <p><?php the_date() ?> <?php the_author() ?></p>
                <div><?php the_content() ?></div>
            </div>
            <hr>
        </div>
    <?php }
?>

<?php get_footer() ?>