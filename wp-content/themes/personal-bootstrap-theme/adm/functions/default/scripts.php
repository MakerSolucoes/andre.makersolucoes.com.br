<?php
function ms_footer_scripts()
{
	$ms['post_type']        = get_post_type();
	$ms['slug']                = get_post_field('post_name', get_post());

	$ms_directory            = get_template_directory_uri() . '/adm/assets/';
	$ms_directory_modules    = get_template_directory_uri() . '/adm/assets/vendor/';

	wp_enqueue_script('purecounter',			$ms_directory_modules . 'purecounter/purecounter.js',						array(),				false, true);
	wp_enqueue_script('bootstrap',			$ms_directory_modules . 'bootstrap/js/bootstrap.bundle.min.js',						array(),				false, true);
	wp_enqueue_script('glightbox',			$ms_directory_modules . 'glightbox/js/glightbox.min.js',						array(),				false, true);
	wp_enqueue_script('isotope',			$ms_directory_modules . 'isotope-layout/isotope.pkgd.min.js',						array(),				false, true);
	wp_enqueue_script('swiper',			$ms_directory_modules . 'swiper/swiper-bundle.min.js',						array(),				false, true);
	wp_enqueue_script('waypoints',			$ms_directory_modules . 'waypoints/noframework.waypoints.js',						array(),				false, true);
	wp_enqueue_script('php-email-form',			$ms_directory_modules . 'php-email-form/validate.js',						array(),				false, true);
	wp_enqueue_script('style',			$ms_directory . 'js/main.js',						array(),				false, true);

}
add_action('wp_enqueue_scripts', 'ms_footer_scripts');