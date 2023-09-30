<?php 
    /* Template Name: RPG */
    get_header(null, ['schema' => 'orange']);
    $page = get_post();
    $pageContent = get_the_content($page->ID);
?>

<main id="rpg">
    <section class="banner" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/city_blur.jpeg);">
        <div class="decoration top" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/stripe_orange.png);"></div>
        <img src="<?= get_template_directory_uri() ?>/assets/img/personagens.png" alt="Personagens">
        <div class="decoration bottom" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/stripe_brown.png);"></div>
    </section>
    <section class="logo-container">
        <h1><?= get_the_title() ?></h1>
        <div class="container">
            <?= trim(get_post_meta(get_the_ID(), 'resume', true)) ?>
        </div>
    </section>
    <section class="main-post-container">
        <?php
            $mainPostUrl = trim(get_post_meta(get_the_ID(), 'rpg_main_post', true));
            if (!empty($mainPostUrl)) {
                $mainPostId = url_to_postid($mainPostUrl);
                if (!empty($mainPostId)) {
                    $mainPost = get_post($mainPostId);
                    get_template_part('elements/podcast_card_player', null, [
                        'post' => $mainPost
                    ]);
                }
            }
        ?>
    </section>
    <section class="post-list">
        <div class="container">
            <h2 class="subtitle">Ouça a temporada 1</h2>
            <div class="podcast-items">
                <?php
                    wp_reset_query();

                    $queryArgs = [
                        'post_type' => 'post',
                        'category_name'=> 'rpg',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                        'meta_query' => [
                            'relation' => 'AND',
                            [
                            'key' => 'episode_type',
                            'compare' => '==',
                            'value' => 'full'
                            ],
                            [
                            'key' => 'episode_season',
                            'compare' => '==',
                            'value' => '1'
                            ]
                        ]
                    ];

                    $query = new WP_Query($queryArgs);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('elements/podcast_item');
                        }
                    }
                ?>
            </div>
        </div>       
    </section>
    <section class="page-content">
        <div class="container">
            <div class="content">
                <?= $pageContent ?>            
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>