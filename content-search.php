<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2><?php the_title() ?></h2>

    <?php if(has_post_thumbnail() ): ?>
        <div class="thumbnail"><?php the_post_thumbnail('thumbnail') ?></div>
    <?php endif; ?>
    <?php the_excerpt(); ?>
</div>