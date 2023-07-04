<?php
// functions.php
function luferatone_register_menus()
{
    register_nav_menus(
        array(
            'main-menu' => 'Menu Principal'
        )
    );
}
add_action('init', 'luferatone_register_menus');

function luferatone_add_home_link($items, $args)
{
    if ($args->theme_location == 'main-menu') {
        $home_link = '<li class="menu-item"><a href="' . esc_url(home_url('/')) . '">Início</a></li>';
        $items = $home_link . $items;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'luferatone_add_home_link', 10, 2);

function luferatone_customize_register($wp_customize)
{
    // Adicionar seção de configurações do logotipo
    $wp_customize->add_section(
        'luferatone_logo_section',
        array('title' => 'Logotipo', 'priority' => 30,
        )
    );

    // Adicionar configuração para upload do logotipo
    $wp_customize->add_setting(
        'luferatone_logo_setting',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    // Adicionar controle para upload do logotipo
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'luferatone_logo_control',
            array(
                'label' => 'Upload do logotipo',
                'section' => 'luferatone_logo_section',
                'settings' => 'luferatone_logo_setting',
            )
        )
    );
}
add_action('customize_register', 'luferatone_customize_register');