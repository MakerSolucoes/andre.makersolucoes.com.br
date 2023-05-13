<?php

function get_clientes_callback(){
    $args = array(
        'post_type' => 'clientes',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $clientes = new WP_Query($args);
    $clientes_array = array();
    while($clientes->have_posts()){
        $clientes->the_post();
        $id = get_the_ID();
        $title = get_the_title();
        $content = get_the_content();
        $thumbnail = get_the_post_thumbnail_url($id, 'large');
        $clientes_array[] = array(
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'thumbnail' => $thumbnail,
            'url' => get_field('url', $id),
            'status' => get_field('status', $id),
            'telefones' => get_field('telefones', $id)
        );
    }
    return $clientes_array;
}

function prefix_register_custom_route() {
    register_rest_route('wp/v2', '/clientes', array(
        'methods' => 'GET',
        'callback' => 'get_clientes_callback',
    ));
    register_rest_route('wp/v2', '/options', array(
        'methods' => 'GET',
        'callback' => 'get_options_callback',
    ));
}
add_action('rest_api_init', 'prefix_register_custom_route');
