<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000">
    <title><?= wp_title() ?></title>

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/plugins.min.css?v=<?= ONE_VERSION ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css?v=<?= ONE_VERSION ?>">

    <script src="<?= get_template_directory_uri() ?>/plugins.min.js?v=<?= ONE_VERSION ?>" charset="utf-8" defer></script>
    <script type="text/javascript">
      const siteUrl = '<?= get_site_url() ?>';
      const apiUrl = '<?= get_site_url() ?>/wp-admin/admin-ajax.php';
      const themeDirUrl = '<?= get_template_directory_uri(); ?>';
    </script>
    <script src="<?= get_template_directory_uri() ?>/main.min.js?v=<?= ONE_VERSION ?>" charset="utf-8" defer></script>
  </head>
  <body>
    <header class="<?= (is_single() || is_page() || is_404()) ? 'back-filled' : '' ?>">
      <?php the_custom_logo(); ?>
    </header>
