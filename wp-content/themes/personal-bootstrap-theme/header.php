<?php

/**
 * Version: 1.0
 * Date: 2020/06/27 | 2021/09/23
 * Developers: Grupo Glorium
 * Developers URI: https://glorium.com.br
 * Description: Developers Grupo Glorium - All Rights Reserved <a target="_blank" href="https://glorium.com.br">Grupo Glorium</a> 2020
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$ms = array();
$ms['slug']			= get_post_field('post_name', get_post());
$ms['post_type']	= get_post_type();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <!-- <meta content="" name="description">
  <meta content="" name="keywords"> -->

  <!-- Favicons -->
  <?php if(!empty(get_field('favicon', 'options'))){ ?>
  <link href="<?php echo get_field('favicon', 'options');?>" rel="icon">
  <link href="<?php echo get_field('favicon', 'options');?>" rel="apple-touch-icon">
  <?php } ?>
  <!-- =======================================================
  * Template Name: Personal - v4.7.0
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="ef-page-<?php echo $ms['slug']; ?>">