<?php 
    /* Template Name: Contato */
    get_header();
    $post = get_post();
?>

<main class="post page">
    <div class="container">
        <div class="content">
            <h1><?= get_the_title() ?></h1>
            <?= get_the_content() ?>            
        </div>
        <?php get_template_part('elements/social_links'); ?>
    </div>
</main>

<?php get_footer(); ?>
