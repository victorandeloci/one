<?php 
    /* Template Name: RPG */
    get_header();
?>

<main id="rpg">
    <div class="banner" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/city_blur.jpeg);">
        <div class="decoration top" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/stripe_orange.png);"></div>
        <img src="<?= get_template_directory_uri() ?>/assets/img/personagens.png" alt="Personagens">
        <div class="decoration bottom" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/stripe_brown.png);"></div>
    </div>
    <div class="logo-container">
        <h1><?= get_the_title() ?></h1>
    </div>
</main>

<?php get_footer(); ?>