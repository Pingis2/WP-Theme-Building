<?php get_header(); ?>

<div id="primary" class="container">
    <main id="main" class="site-main" role="main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">Sorry, page not found</h1>
            </header>

            <div class="page-content">
                <h2>It looks like was nothing was found at this location. Maybe try one of the links below or search</h2>
                <?php get_search_form(); ?>
                <?php the_widget('WP_Widget_Recent_Posts'); ?>
                <div class="widget widget_categories">
                    <h3>Check the most used categories</h3>
                    <ul>
                        <?php
                            wp_list_categories(array(
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'show_count' => 1,
                                'title_li' => '',
                                'number' => 5
                            ));
                        ?>
                    </ul>

                    <?php the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content"); ?>

                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>