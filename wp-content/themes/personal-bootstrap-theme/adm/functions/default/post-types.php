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
        'menu_icon' => 'dashicons-',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
        'taxonomies' => array('category', 'post_tag'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio')
    );
    register_post_type('portfolio', $args_portfolio);
}

add_action('init', 'ms_register_posts_types');

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_645f8bff539c4',
        'title' => 'Clientes',
        'fields' => array(
            array(
                'key' => 'field_645f8c0d0c626',
                'label' => 'Informações Gerais',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'left',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_645f8c190c627',
                'label' => 'Status',
                'name' => 'status',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_645f8c300c628',
                'label' => 'Url',
                'name' => 'url',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'clientes',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;
