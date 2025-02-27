<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8" <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
    
<header>
    <a href="<?php echo home_url(); ?>">
        <div class="header-logo-container">
            <img
                src="<? echo get_template_directory_uri() . '/assets/LifeLabSci-logo.jpg'; ?>" 
                alt="LifeLabSci logo" 
                class="header-logo"
            >
            <p class="header-title">LifeLabSci</p>
        </div>  
    </a>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'primary')) ?>

        <div class="search-container">
            <?php get_search_form() ?>
        </div>  
    </nav>

</header>