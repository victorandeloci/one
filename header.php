<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= is_front_page() ? bloginfo('name') : get_the_title() ?></title>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/plugins.min.css?v=1.4.0">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css?v=1.4.0">

    <script src="<?= get_template_directory_uri() ?>/plugins.min.js?v=1.4.0" charset="utf-8" defer></script>
    <script src="<?= get_template_directory_uri() ?>/main.min.js?v=1.4.0" charset="utf-8" defer></script>
  </head>
  <body>
    <nav>
      <div class="container">
        <a class="logo" id="home" alt="<?php echo get_bloginfo(); ?>" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="PS Logo"> </a>
        <div class="mobile-btn" id="headerBtn">
          <i class="fas fa-bars"></i>
        </div>
        <?php wp_nav_menu(array( 'theme_location' => 'header-menu')); ?>
      </div>
    </nav>
