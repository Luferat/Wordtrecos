<?php

add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 * Registrando slots de widgets.
 *
 */
function arphabet_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Home aside 1',
        'id'            => 'home_aside_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'arphabet_widgets_init');
