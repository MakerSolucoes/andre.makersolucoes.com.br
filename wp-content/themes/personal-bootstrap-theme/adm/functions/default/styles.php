<?php
function ms_header_css()
{

    $ms['post_type']        = get_post_type();
    $ms['slug']                = get_post_field('post_name', get_post());
    // Filtro por usuário
    $ms_directory            = get_template_directory_uri() . '/adm/assets/';
    $ms_directory_modules    = get_template_directory_uri() . '/adm/assets/vendor/';

    wp_enqueue_style('bootstrap',             $ms_directory_modules . 'bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons',             $ms_directory_modules . 'bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('boxicons',             $ms_directory_modules . 'boxicons/css/boxicons.min.css');
    wp_enqueue_style('glightbox',             $ms_directory_modules . 'glightbox/css/glightbox.min.css');
    wp_enqueue_style('remixicon',             $ms_directory_modules . 'remixicon/remixicon.css');
    wp_enqueue_style('swiper',             $ms_directory_modules . 'swiper/swiper-bundle.min.css');
    wp_enqueue_style('style',             $ms_directory . '/css/style.css');

    
    // if ($ms['post_type'] == 'documentos') {
    //     wp_enqueue_style('documentos',             $ms_directory . 'documentos/css/style.css');
    // }
}
add_action('wp_enqueue_scripts', 'ms_header_css');