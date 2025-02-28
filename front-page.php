<?php get_header() ?>

<section>
    <div class="intro-container">
        <article class="intro-text">
        In the state-of-the-art laboratories of LifeLabSci, a team of brilliant scientists stands on the brink of a historic breakthrough.
        Clad in white lab coats and safety goggles, they work meticulously, analyzing glowing samples under a high-powered microscope.
        One researcher carefully updates the periodic table, marking the addition of a newly discovered element, while digital screens
        around them display atomic structures and streams of complex data.<br><br>

        With cutting-edge equipment, including mass spectrometers and particle accelerators,
        LifeLabSci is pushing the boundaries of scientific exploration. 
        Each calculation, every test, brings them one step closer to unlocking the secrets
        of the universe. The discovery of a new element is not just an achievement—it is a
        testament to human curiosity and relentless innovation.
        </article>
        <div class="image-container">
            <img 
                src="<?php echo get_template_directory_uri() . '/assets/scientists_discovering_elements.jpg' ?>" 
                alt="Scientists discovering elements"
                class="intro-img"
            >
        </div>
    </div>
</section>

<section>
    <div class="posts-container">
        <div class="latest-posts">
        <h2 class="latest-posts-title">Latest Posts</h2>
        <div class="posts">
            <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                );
                $latest_posts = new WP_Query($args);

                if( $latest_posts->have_posts() ):
                    while( $latest_posts->have_posts() ): $latest_posts->the_post(); ?>
                    <div class="post-container">
                        <a href="<?php the_permalink() ?>">
                            <h3 class="post-title"><?php the_title() ?></h3>
                            <?php the_post_thumbnail( 'medium', array('class' => 'post-image')) ?>
                        </a>
                        <div class="categories">
                            <?php 
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        echo '<a class="category-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    
                    <?php endwhile;
                endif;
            ?>
        </div>
        </div>

        <hr>

        <?php get_sidebar() ?>
    </div>
</section>

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

<?php get_footer() ?>