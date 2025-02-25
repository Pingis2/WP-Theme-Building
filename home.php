<?php get_header() ?>

<h2>Check all the recent posts</h2>

<?php 
    $args = array(
        'posts_per_page' => 3,
    );
    query_posts($args);

    while(have_posts()) {
        the_post();?>
        <div>
            <div class="content">
                <a href="<?php the_permalink()?>">
                    <h3><?php the_title() ?></h3>
                </a>
                <?php echo 'THIS IS THE FORMAT: ' . get_post_format(); ?>
                <?php get_template_part('content', get_post_format()); ?>
                <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail') ?></div>
                <p><?php the_date() ?> <?php the_author() ?></p>
                <small><?php the_category('') ?> <?php the_tags() ?></small>
            </div>
            <hr>
        </div>
    <?php }
    wp_reset_query();
?>

<div class="pagination-older">
    <?php next_posts_link('Older Posts >') ?>
</div>

<div class="pagination-newer">
    <?php previous_posts_link('< Newer Posts') ?>
</div>

<?php get_footer() ?>