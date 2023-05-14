<?php

function ms_register_posts_types(){
    $args = array(
        'public' => true,
        'label' => 'Clientes',
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
        'taxonomies' => array(null),
        'has_archive' => true,
        'rewrite' => array('slug' => 'clientes')
    );
    register_post_type('clientes', $args);

    $args_portfolio = array(
        'public' => true,
        'label' => 'Portfólio',
        'menu_icon' => 'dashicons-welcome-view-site',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
        'taxonomies' => array('category', 'post_tag'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio')
    );
    register_post_type('portfolio', $args_portfolio);
}

add_action('init', 'ms_register_posts_types');

