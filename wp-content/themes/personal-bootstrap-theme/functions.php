<?php

/**
 * Version: 1.0
 * Date: 2021/10/21
 * Developers: Grupo Glorium
 * Developers URI: https://glorium.com.br
 * Description: Developers Grupo Glorium - All Rights Reserved <a target="_blank" href="https://glorium.com.br">Grupo Glorium</a> 2021
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}
add_theme_support( 'post-thumbnails' );
add_action('init', 'mysql_set_sql_mode_traditional', -1);
function mysql_set_sql_mode_traditional()
{
	global $wpdb;
	$wpdb->query("SET SESSION sql_mode = 'TRADITIONAL'");
	$wpdb->query("SET SESSION sql_mode = 'NO_ZERO_DATE'");
	$wpdb->query("SET SESSION sql_mode = 'NO_ZERO_IN_DATE'");
}

// Default
$adm = '/adm/functions/default/';
get_template_part($adm . 'get');
// get_template_part($adm . 'ajax');
get_template_part($adm . 'page');
get_template_part($adm . 'styles');
get_template_part($adm . 'scripts');
// get_template_part($adm . 'variables');

// // Ajax
// $ajax = '/adm/functions/ajax/';
// get_template_part($ajax . 'documentos');


// // Documentos
// $doc = '/adm/functions/documentos/';
// get_template_part($doc . 'arquivos');
// get_template_part($doc . 'posts');
// get_template_part($doc . 'validate');


// // Documentos
// $pag = '/adm/functions/pagination/';
// get_template_part($pag . 'bootstrap');