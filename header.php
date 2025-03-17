<?php

global $tpl_engine;
global $qdi_config;
global $wp;
$current_url = home_url($wp->request);
$site_url = get_site_url();

$current_id = get_the_ID();

$main_menu = wp_nav_menu(array(
  'menu' => 'Pincipal',
  'depth' => 0,
  'container' => '',
  'menu_class' => 'c-main-menu__list',
  'echo' => false,
  'walker' => new Main_Menu_Walker()
));

$brand_image_url = (lvt_get_option_values('brands', 'logoHeader') != null)? lvt_get_option_values('brands', 'logoHeader') : '';
$open_account_link = (lvt_get_option_values('accountlink', 'openaccount') !== null) ? lvt_get_option_values('accountlink', 'openaccount') : false;
$access_account_link = (lvt_get_option_values('accountlink', 'accessaccount') !== null) ? lvt_get_option_values('accountlink', 'accessaccount') : false;
$page_parent = wp_get_post_parent_id($current_id);

$meta = lvt_get_meta_values();

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

  <title><?php bloginfo('name');?> | <?php echo $title; ?></title>


  <?php $tpl_engine->partial('template/favicons'); ?>
  <link rel="preload" href="<?php bloginfo('template_url'); ?>/public/css/font-import.css?ver=<?php echo THEME_VERSION; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/public/css/font-import.css?ver=<?php echo THEME_VERSION; ?>"></noscript>
  <style>
    <?php
      if((ENV == 'production')) {
        echo file_get_contents(TEMPLATEPATH . '/public/css/inline.min.css');
      } else {
        echo file_get_contents(TEMPLATEPATH . '/public/css/inline.css');
      }
    ?>
  </style>
  <?php if (ENV == 'production'): ?>
    <link rel="preload" role="production-styles" href="<?php bloginfo('template_url'); ?>/public/css/main.min.css?ver=<?php echo THEME_VERSION; ?>" as="style"  onload="this.rel='stylesheet'">
    <noscript><link role="production-styles" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/public/css/main.min.css?ver=<?php echo THEME_VERSION; ?>"></noscript>
  <?php else: ?>
    <link rel="preload" href="<?php bloginfo('template_url'); ?>/public/css/main.css?ver=<?php echo THEME_VERSION; ?>" as="style"  onload="this.rel='stylesheet'">
  <?php endif; ?>

  <script async src="<?php bloginfo('template_url'); ?>/public/js/preload/loadCSS.js"></script>

  <?php $tpl_engine->partial('template/scripts'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class($add_to_body_class); ?> data-scroll-container>
<header class="o-header">
    <div class="s-container s-container--header">
      <div class="o-header__content">
        <div class="o-header__left">
          <div class="logo">
            <a href="<?= site_url() ?>">
              <img src="<?php echo $brand_image_url; ?>" alt="MonteBravo">
            </a>
          </div>

          
          
          <div class="hamburguer-menu">
            <div class="close">
              <?php $tpl_engine->svg('hamburguer-menu') ?>
            </div>
            
            <div class="open">
              <?php $tpl_engine->svg('x-menu') ?>
            </div>
          </div>
          <nav class="menu-desk">
            <?php echo $main_menu; ?>
          </nav>

          <a class="o-header__open-account-link" href="<?php echo $open_account_link; ?>">Abra sua conta</a>

          <?php if (!is_mobile()) :?>
            <a class="o-header__access-account" href="<?php echo $$access_account_link; ?>">
              <span>Acesse sua conta</span>

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M21.751 15.3643V17.3591C21.751 19.5683 19.9601 21.3591 17.751 21.3591H6.74257C4.53343 21.3591 2.74257 19.5683 2.74257 17.3591V6.35071C2.74257 4.14157 4.53343 2.35071 6.74257 2.35071H17.751C19.9601 2.35071 21.751 4.14157 21.751 6.35071V8.38479M16.927 9.06903L19.7505 11.8614L16.927 14.6308M18.9731 11.8287H9.74089" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
  <main id="main" class="main">

