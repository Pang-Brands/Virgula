<?php

global $tpl_engine;
global $qdi_config;
global $wp;
$current_url = home_url($wp->request);
$site_url = get_site_url();

$current_id = get_the_ID();

$main_menu = wp_nav_menu(array(
  'menu' => 'Principal',
  'depth' => 0,
  'container' => '',
  'menu_class' => 'c-main-menu__list',
  'echo' => false,
));

$title = get_the_title();

$add_to_body_class = '';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="HandheldFriendly" content="true">
  <meta http-equiv="X-UA-Compatible" content="IE=9">
  <meta http-equiv="X-UA-TextLayoutMetrics" content="gdi" />
  <meta name="theme-color" content="#fff">
  <meta name="format-detection" content="telephone=no">

  <link rel="preload" href="<?php bloginfo('template_url'); ?>/public/css/font-import.css?ver=<?php echo THEME_VERSION; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/public/css/font-import.css?ver=<?php echo THEME_VERSION; ?>">
  </noscript>
  <style>
    <?php
    if ((ENV == 'production')) {
      echo file_get_contents(TEMPLATEPATH . '/public/css/inline.min.css');
    } else {
      echo file_get_contents(TEMPLATEPATH . '/public/css/inline.css');
    }
    ?>
  </style>
  <?php if (ENV == 'production'): ?>
    <link rel="preload" role="production-styles" href="<?php bloginfo('template_url'); ?>/public/css/main.min.css?ver=<?php echo THEME_VERSION; ?>" as="style" onload="this.rel='stylesheet'">
    <noscript>
      <link role="production-styles" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/public/css/main.min.css?ver=<?php echo THEME_VERSION; ?>">
    </noscript>
  <?php else: ?>
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/public/css/main.css?ver=<?php echo THEME_VERSION; ?>" as="style" onload="this.rel='stylesheet'">
  <?php endif; ?>

  <script async src="<?php bloginfo('template_url'); ?>/public/js/preload/loadCSS.js"></script>

  <?php $tpl_engine->partial('template/scripts'); ?>
  <?php wp_head(); ?>
</head>


<body <?php body_class($add_to_body_class); ?>>
  <?php wp_body_open(); ?>
  <header class="o-header">
    <div class="s-container s-container--header">
      <div class="o-header__content">
        <div class="hamburguer-menu ">
          <div class="open">
            <?php $tpl_engine->svg('hamburguer') ?>
          </div>
          <div class="close">
            <?php $tpl_engine->svg('close') ?>
          </div>
        </div>
        <div class="menu">
          <?= $main_menu ?>
        </div>
      </div>
    </div>
  </header>
  <main id="main" class="main">