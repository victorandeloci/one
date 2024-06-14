<?php 
    get_header();
    $post = get_post();
?>

<main class="post page">
    <div class="container">
        <div class="content">
            <h1><?= get_the_title() ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
