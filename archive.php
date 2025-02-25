<?php get_header() ?>

<h2>Check all the recent posts</h2>

<?php 
    while(have_posts()) {
        the_post();?>
        <header>
            <?php 
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>'); 
            ?>
        </header>           
            <?php get_template_part('content', 'archive') ?>
            <div class="row">
                <?php the_posts_navigation() ?>
            </div>
    <?php }
?>

<div class="pagination-older">
    <?php next_posts_link('Older Posts >') ?>
</div>

<div class="pagination-newer">
    <?php previous_posts_link('< Newer Posts') ?>
</div>

<?php get_sidebar() ?>

<?php get_footer() ?>