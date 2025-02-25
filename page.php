<?php get_header() ?>

<?php 
    while(have_posts()) {
        the_post(); ?>
        <div>
            <div class="page-content">
                <?php the_content() ?>
            </div>
        </div>
    <?php }
?>

<?php get_footer() ?>