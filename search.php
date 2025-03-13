
<?php get_header(); ?>

<h1 class="search-results-text">Showing Search Results for: <?php echo get_search_query(); ?></h1>

<?php if (have_posts()) : ?>
    <ul class="search-query-results">
        <?php while (have_posts()) : the_post(); ?>
            <li class="search-result-item">
                <a href="<?php the_permalink(); ?>">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </a>
                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
                <?php the_excerpt() ?>
            </li>
        <?php endwhile; ?>
    </ul>

<?php else : ?>
    <p>No results found.</p>
<?php endif; ?>

<?php get_footer(); ?>