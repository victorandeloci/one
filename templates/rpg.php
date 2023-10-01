<?php 
    /* Template Name: RPG */
    get_header(null, ['schema' => 'orange']);
    $page = get_post();
    $pageContent = get_the_content($page->ID);
?>

<main id="rpg">
    <section class="banner" style="background-image: url(<?= trim(get_post_meta(get_the_ID(), 'rpg_banner_back', true)) ?>);">
        <div class="decoration top" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/stripe_orange.png);"></div>
        <img src="<?= trim(get_post_meta(get_the_ID(), 'rpg_banner_image', true)) ?>" alt="Banner">
        <div class="decoration bottom" style="background-image: url(<?= get_template_directory_uri() ?>/assets/img/stripe_brown.png);"></div>
    </section>
    <section class="logo-container">
        <h1><?= get_the_title() ?></h1>
        <div class="podcast-links">
            <a target="_blank" rel="noopener nofollow" href="https://open.spotify.com/show/6blXIFhndm9IURdUCUqyDW" title="Spotify" class="spotify">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm100.7 364.9c-4.2 0-6.8-1.3-10.7-3.6-62.4-37.6-135-39.2-206.7-24.5-3.9 1-9 2.6-11.9 2.6-9.7 0-15.8-7.7-15.8-15.8 0-10.3 6.1-15.2 13.6-16.8 81.9-18.1 165.6-16.5 237 26.2 6.1 3.9 9.7 7.4 9.7 16.5s-7.1 15.4-15.2 15.4zm26.9-65.6c-5.2 0-8.7-2.3-12.3-4.2-62.5-37-155.7-51.9-238.6-29.4-4.8 1.3-7.4 2.6-11.9 2.6-10.7 0-19.4-8.7-19.4-19.4s5.2-17.8 15.5-20.7c27.8-7.8 56.2-13.6 97.8-13.6 64.9 0 127.6 16.1 177 45.5 8.1 4.8 11.3 11 11.3 19.7-.1 10.8-8.5 19.5-19.4 19.5zm31-76.2c-5.2 0-8.4-1.3-12.9-3.9-71.2-42.5-198.5-52.7-280.9-29.7-3.6 1-8.1 2.6-12.9 2.6-13.2 0-23.3-10.3-23.3-23.6 0-13.6 8.4-21.3 17.4-23.9 35.2-10.3 74.6-15.2 117.5-15.2 73 0 149.5 15.2 205.4 47.8 7.8 4.5 12.9 10.7 12.9 22.6 0 13.6-11 23.3-23.2 23.3z"/></svg>
            </a>
            <a target="_blank" rel="noopener nofollow" href="https://podcasts.apple.com/br/podcast/playercast-rpg/id1584865683" title="Apple Podcasts" class="apple">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>
            </a>
            <a target="_blank" rel="noopener nofollow" href="https://www.google.com/podcasts?feed=aHR0cHM6Ly9hbmNob3IuZm0vcy82OTdkZjNkNC9wb2RjYXN0L3Jzcw==" title="Google Podcasts" class="google">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
            </a>
            <a target="_blank" rel="noopener nofollow" href="https://anchor.fm/s/697df3d4/podcast/rss" title="Feed RSS" class="rss">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 64C0 46.3 14.3 32 32 32c229.8 0 416 186.2 416 416c0 17.7-14.3 32-32 32s-32-14.3-32-32C384 253.6 226.4 96 32 96C14.3 96 0 81.7 0 64zM0 416a64 64 0 1 1 128 0A64 64 0 1 1 0 416zM32 160c159.1 0 288 128.9 288 288c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-123.7-100.3-224-224-224c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
            </a>
        </div>
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
            <?php
                $seasons = get_post_meta($page->ID, 'rpg_show_season');
                foreach ($seasons as $seasonNumber) :
            ?>
                <h2 class="subtitle">Temporada <?= $seasonNumber ?></h2>
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
                                'value' => $seasonNumber
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
            <?php endforeach; ?>
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