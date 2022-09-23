<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= is_front_page() ? bloginfo('name') : get_the_title() ?></title>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/plugins.min.css?v=1.3.3">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css?v=1.3.3">

    <script src="<?= get_template_directory_uri() ?>/plugins.min.js?v=1.3.3" charset="utf-8" defer></script>
    <script src="<?= get_template_directory_uri() ?>/main.min.js?v=1.3.3" charset="utf-8" defer></script>
  </head>
  <body>
    <nav>
      <div class="container">
        <a class="logo" id="home" alt="<?php echo get_bloginfo(); ?>" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="PS Logo"> </a>
        <div class="mobile-btn" id="headerBtn">
          <i class="fas fa-bars"></i>
        </div>
        <ul class="menu" id="navMenu">
          <li class="menu-item"><a id="home" alt="<?php echo get_bloginfo(); ?>" href="<?php echo get_home_url(); ?>">Home</a></li>
          <li class="menu-item">
            <a alt="Podcasts" class="post menu-link" href="<?php echo get_home_url(); ?>/podcasts/">Podcasts</a>
            <ul class="submenu">
              <li class="menu-item"><a alt="PlayerCast" slug="playercast" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/playercast/">PlayerCast</a></li>
              <li class="menu-item"><a alt="PS News" slug="psnews" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/psnews/">PS News</a></li>
              <li class="menu-item"><a alt="BKP" slug="bkp" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/bkp/">BKP</a></li>
            </ul>
          </li>
          <li class="menu-item">
  			  <a alt="Textos" slug="textos" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/textos/">Textos</a>
          <ul class="submenu">
          <li class="menu-item"><a slug="analises-games" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/analises-games/">Análises</a></li>
          <li class="menu-item"><a slug="artigos" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/artigos/">Artigos</a></li>
            <li class="menu-item"><a slug="filmes-series" class="category-item menu-link" href="<?php echo get_home_url(); ?>/category/filmes-series/">Filmes e Séries</a></li>
          </ul>
    			</li>
              <li class="menu-item"><a target="_blank" rel="nofollow noreferrer" alt="Vídeos" slug="videos" class="category-item menu-link" href="https://www.youtube.com/playerselecttv">Vídeos</a></li>
    			<li class="menu-item"><a alt="Equipe" class="menu-link post" href="<?php echo get_home_url(); ?>/equipe/">Equipe</a></li>
        </ul>
      </div>
    </nav>
