
<?php 
    while(have_posts()) {
        the_post();?>
        <div>
            <div class="content">
                <?php echo 'THIS IS THE FORMAT: ' . get_post_format(); ?>
                <?php get_template_part('content', get_post_format()); ?>
                <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail') ?></div>
                <p><?php the_date() ?> <?php the_author() ?></p>
            </div>
            <hr>
        </div>
    <?php }
?>