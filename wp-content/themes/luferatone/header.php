<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>

        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if (get_theme_mod('luferatone_logo_setting')) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('luferatone_logo_setting')); ?>" alt="Logotipo de <?php bloginfo('name'); ?>">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/felogo.png" alt="Logotipo de <?php bloginfo('name'); ?>">
                <?php endif; ?>
            </a>
        </div>
        <!--
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1> 
        <p>
            <?php bloginfo('description'); ?>
        </p>
        -->
    </header>

    <nav>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'menu'
            )
        );
        ?>
    </nav>