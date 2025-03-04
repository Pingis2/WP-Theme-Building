<?php get_header() ?>

<h2>Check all the recent posts</h2>

<?php 
    $args = array(
        'posts_per_page' => 5,
    );
    query_posts($args);

    while(have_posts()) {
        the_post();?>
        <div>
            <div class="content">
                <div class="thumbnail-img"><?php the_post_thumbnail('medium', array('class' => 'post-thumbnail')) ?></div>
                <div class="title-text">
                    <a href="<?php the_permalink()?>">
                        <h3 class="post-title-blog"><?php the_title() ?></h3>
                    </a>
                    <?php the_content() ?>
                </div>
                <div class="post-info">
                    <p class="upload-date">Upload date: <?php the_time('F j, Y') ?></p>
                    <div class="categories-blog">
                        <?php 
                            echo 'Tags: ';
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                foreach ( $categories as $category ) {
                                    echo '<a class="blog-category-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                                }
                            }
                        ?>
                    </div>
                </div>
                
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