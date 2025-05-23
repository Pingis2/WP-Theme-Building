<?php

// include scripts

function titles() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'titles');

function my_css_and_js() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/css/cooltheme.css', array(), '1.0', 'all');    wp_enqueue_script(
        'main-js',
        get_template_directory_uri(), '/js/app.js',
        NULL,
        '1.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'my_css_and_js');

// Full site edit support

function mytheme_setup() {
    add_theme_support('block-bases-theme');
}

add_action('after_setup_theme', 'mytheme_setup');

// Menus

function cool_theme_setup() {

    add_theme_support('menus');

    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
    register_nav_menu('widget-posts', 'Widget Posts');

}

add_action('init', 'cool_theme_setup');

// Theme support
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('html5', array('search-form'));

add_theme_support('post-formats', array('aside', 'image', 'video'));

// Sidebar function

function awesome_widget_setup() {
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'class' => 'widget-posts',
            'description' => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="%2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );
}

function latest_posts_widget() {
    register_sidebar(
        array(
            'name' => 'Latest Posts',
            'id' => 'latest-posts',
            'class' => 'widget-posts',
            'description' => 'Latest Posts Sidebar',
            'before_widget' => '<aside id="%1$s" class="%2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );
}

add_action('widgets_init', 'awesome_widget_setup');
add_action('widgets_init', 'latest_posts_widget');

// Custom Header

function mytheme_register_patterns() {
    register_block_pattern(
        'my-cool-theme/header',
        array(
            'title' => __('Header', 'my-cool-theme'),
            'description' => __('A header with a title and a button.', 'Block pattern description', 'my-cool-theme'),
            'content' => file_get_contents( get_template_directory() . 'patterns/header.html' ),
            'categories' => array('header'),
        )
    );

    register_block_pattern(
        'my-cool-theme/intro-text',
        array(
            'title' => __('Intro Text', 'my-cool-theme'),
            'description' => __('An introductory text with a title and a button.', 'Block pattern description', 'my-cool-theme'),
            'content' => file_get_contents( get_template_directory() . 'patterns/intro-text.html' ),
            'categories' => array('intro-text')
        )
    );

    register_block_pattern(
        'my-cool-theme/footer',
        array(
            'title' => __('Footer', 'my-cool-theme'),
            'description' => __('A footer with a title and a button.', 'Block pattern description', 'my-cool-theme'),
            'content' => file_get_contents( get_template_directory() . 'patterns/footer.html' ),
            'categories' => array('footer'),
        )
    );
}

add_action('init', 'mytheme_register_patterns');

// Head function

function awesome_remove_version() {
    return '';
}

add_filter('the_generator', 'awesome_remove_version');

//Custom Post Type

function awesome_post_type() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'add_new' => 'Add Project Item',
        'all_items' => 'All Items',
        'add_new_item' => 'Add Item',
        'edit_item' => 'Edit Item',
        'new_item' => 'New Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Projects',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent Item'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'projects',
            'with_front' => false,
            'pages' => true,
            'feeds' => true,
            'inherit' => true,
        ),
        'capability_type' => 'post',
        'hierarchical' => false,
        'show_in_rest' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            'comments',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false,
        'template' => array(
            array('core/paragraph', array(
                'placeholder' => 'Add the project description here...',
            )),
        ),
        'template_lock' => 'all',
    );

    register_post_type('projects', $args);
}

add_action('init', 'awesome_post_type');

// Custom Taxonomy

function awesome_custom_taxonomies() {

    // add new taxonomy hierarchical
    $labels = array(
        'name' => 'Fields',
        'singular_name' => 'Field',
        'search_items' => 'Search Fields',
        'all_items' => 'All Fields',
        'parent_item' => 'Parent Field',
        'parent_item_colon' => 'Parent Field:',
        'edit_item' => 'Edit Field',
        'update_item' => 'Update Field',
        'add_new_item' => 'Add New Field',
        'new_item_name' => 'New Field Name',
        'menu_name' => 'Field'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'field')
    );

    // register_taxonomy('field', array('projects'), $args);

    // add new taxonomy NOT hierarchical
    register_taxonomy('language', 'projects', array(
        'label' => 'Language',
        'rewrite' => array('slug' => 'language'),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));
}

add_action('init', 'awesome_custom_taxonomies');

// Custom Term Function

function aweseme_get_terms($postID, $term) {
    $terms_list = wp_get_post_terms($postID, $term);
    $output = '';

    $i = 0;
    foreach($terms_list as $term) { 
        $i++;
        if($i > 1) { $output .= ', '; }
        $output .= '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
    }

    return $output;
}

function remove_max_srcset_image_width( $max_width ) {
    return false;
}

add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

function wdo_disable_srcset( $sources ) {
    return false;
}

add_filter( 'wp_calculate_image_srcset', 'wdo_disable_srcset' );

// Search Filter


function modify_search_query($query) {
    if ($query->is_search() && !is_admin()) {
        $query->set('post_type', ['projects']);
    }
}


//add_action('pre_get_posts', 'modify_search_query');

// Comments support for custom post types

function enable_comments_rest_support() {
    global $wp_post_types;
    if (isset($wp_post_types['projects'])) {
        $wp_post_types['projects']->show_in_rest = true;
        $wp_post_types['projects']->supports[] = 'comments';
    }
}

add_action('init', 'enable_comments_rest_support', 11);

// Add custom taxonomy column to the admin dashboard for 'projects'
function add_language_column($columns) {
    $columns['language'] = __('Language', 'my-cool-theme'); // Add a new column for the 'Language' taxonomy
    return $columns;
}
add_filter('manage_projects_posts_columns', 'add_language_column');

// Populate the 'Language' column with the assigned terms
function populate_language_column($column, $post_id) {
    if ($column === 'language') {
        $terms = get_the_terms($post_id, 'language'); // Get the terms for the 'language' taxonomy
        if (!empty($terms) && !is_wp_error($terms)) {
            $term_links = array_map(function($term) {
                return sprintf('<a href="%s">%s</a>', esc_url(get_edit_term_link($term->term_id, 'language')), esc_html($term->name));
            }, $terms);
            echo implode(', ', $term_links); // Display the terms as links
        } else {
            echo __('No Language Assigned', 'my-cool-theme'); // Fallback if no terms are assigned
        }
    }
}
add_action('manage_projects_posts_custom_column', 'populate_language_column', 10, 2);

add_filter( 'wp_is_application_passwords_available', '__return_true' );

/*
add_action('rest_api_init', function () {
    register_rest_field('projects', 'language', [
        'get_callback' => function ($object) {
            return wp_get_post_terms($object['id'], 'language', ['fields' => 'slugs']);
        },
    ]);
});
*/

function enqueue_filter_script() {
    wp_enqueue_script('post-filter', get_theme_file_uri('/js/filter.js'), ['jquery'], null, true);
    wp_localize_script('post-filter', 'wpApiSettings', ['root' => esc_url_raw(rest_url())]);
}
add_action('wp_enqueue_scripts', 'enqueue_filter_script');

add_action('rest_api_init', function () {
    register_rest_field('projects', 'language', array(
        'get_callback' => function ($post) {
            $terms = wp_get_post_terms($post['id'], 'language');
            return !empty($terms) ? $terms : null;
        },
    ));
});

add_filter('rest_project_query', function ($args, $request) {
    if (isset($request['language'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'language',
                'field'    => 'slug',
                'terms'    => $request['language'],
            ),
        );
    }
    return $args;
}, 10, 2);

// Custom Api Endpoint

function my_awesome_func( $data ) {
    $posts = get_posts( array(
        'post_type' => 'projects',
        'author' => $data['id'],
        'numberposts' => -1,
    ));

    if ( empty( $posts ) ) {
        return new WP_Error( 'no_author', 'Invalid author', array( 'status' => 404 ) );
    }

    return array_map(function($post) {
        return $post->post_title;
    }, $posts);
}

add_action('rest_api_init', function () {
    register_rest_route( 'my-endpoint/v1', '/author/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'my_awesome_func',
        'args' => array(
            'id' => array(
                'validate_callback' => function($param, $request, $key) {
                    return is_numeric($param);
                }
            )
        ),
        'permission_callback' => function () {
            return true;
        }
    ));
});