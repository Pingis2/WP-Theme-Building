<?php get_header() ?>

<h1>Welcome to LifeLabSci</h1>

<?php if( have_posts() ):
    while( have_posts() ): the_post(); ?>
        <h2><?php the_title() ?></h2>
        <?php the_content() ?>
    <?php endwhile;
endif;
?>

<?php
    //print the first post

    /*
    $args_cat = array(
        'include' => '8, 9, 10'
    );

    $categories = get_categories($args_cat);
    foreach($categories as $category):

        $args = array(
            'type' => 'post',
            'posts_per_page' => 1,
            'category__in' => $category->term_id,
            'category__not_in' => array(11),
        );
        $lastBlog = new WP_Query($args);
    
        if( $lastBlog->have_posts() ):
            while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
                <h2><?php the_title() ?></h2>
                <?php get_template_part('content', 'featured'); ?>
            <?php endwhile;
        endif;
        wp_reset_postdata();

    endforeach
    */
?>

<?php 
    //print other 2 posts not the first one

/*
     $otherPosts = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'offset' => 1
    ));

    if( $otherPosts->have_posts()):
        while( $otherPosts->have_posts()): $otherPosts->the_post(); ?>
            <h3><?php the_title() ?></h3>
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile;
    endif;
    wp_reset_postdata();
    */
?>

<hr>


<?php 
/*
    //print only tutorials

    $args = array(
        'type' => 'post',
        'posts_per_page' => 2,
        'offset' => 1
    );
    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
            <h2><?php the_title() ?></h2>
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile;
    endif;
    wp_reset_postdata();
*/
?>



<?php get_sidebar() ?>

<?php get_footer() ?>