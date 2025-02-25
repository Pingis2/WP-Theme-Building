<div>
    <div class="content">
        <a href="<?php the_permalink()?>">
            <h3><?php the_title() ?></h3>
        </a>
        <?php get_template_part('content', get_post_format()); ?>
        <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail') ?></div>
        <p><?php the_date() ?> <?php the_author() ?></p>
        <small><?php the_category('') ?> <?php the_tags() ?></small>
        <div><?php the_excerpt(); ?></div>
    </div>
    <hr>
</div>