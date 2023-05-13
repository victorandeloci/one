<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= bloginfo('name') ?></title>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/plugins.min.css?v=2.0.0">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css?v=2.0.0">

    <script src="<?= get_template_directory_uri() ?>/plugins.min.js?v=2.0.0" charset="utf-8" defer></script>
    <script src="<?= get_template_directory_uri() ?>/main.min.js?v=2.0.0" charset="utf-8" defer></script>
  </head>
  <body>
    <header class="<?= (is_single() || is_page()) ? 'back-filled' : '' ?>">
      <?php the_custom_logo(); ?>
    </header>
