<?php 
    get_header();
    $post = get_post();
?>

<main class="post">
    <div class="container">
        <?php 
            $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true));
            $postThumb = get_the_post_thumbnail_url(get_the_ID(), ($i == 0) ? 'large' : 'medium');
        ?>
        <div class="details">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
            <span><?= !empty(get_the_author_meta('first_name', $post->post_author))
                        ? get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author)
                        : get_the_author_meta('nicename', $post->post_author)?></span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
            <span><?= get_the_date('d/m/Y', get_the_ID()) ?></span>
        </div>
        <?php if (in_category('analises-games', get_the_ID()) && !empty(get_post_meta(get_the_ID(), 'one_game_cover_url', true))) : ?>
            <div class="info-board">
                <h1><?= get_the_title() ?></h1>
                <img class="game-cover" src="<?= get_post_meta(get_the_ID(), 'one_game_cover_url', true) ?>" alt="Cover">
                <div class="info-content">
                    <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_year', true))): ?>
                    <span>Ano</span>
                    <p><?= get_post_meta(get_the_ID(), 'one_game_info_year', true) ?></p>
                    <hr>
                    <?php endif; ?>
                    <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_publisher', true))): ?>
                    <span>Publisher</span>
                    <p><?= get_post_meta(get_the_ID(), 'one_game_info_publisher', true) ?></p>
                    <hr>
                    <?php endif; ?>
                    <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_developer', true))): ?>
                    <span>Developer</span>
                    <p><?= get_post_meta(get_the_ID(), 'one_game_info_developer', true) ?></p>
                    <hr>
                    <?php endif; ?>
                    <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_genre', true))): ?>
                    <span>Gênero</span>
                    <p><?= get_post_meta(get_the_ID(), 'one_game_info_genre', true) ?></p>
                    <hr>
                    <?php endif; ?>
                    <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_platforms', true))): ?>
                    <span>Plataformas</span>
                    <p><?= get_post_meta(get_the_ID(), 'one_game_info_platforms', true) ?></p>
                    <hr>
                    <?php endif; ?>
                </div>
            </div>        
        <?php elseif (!empty($podcast_mp3_thumb) || !empty($postThumb)) : ?>
            <img src="<?= !empty($podcast_mp3_thumb) 
                            ? $podcast_mp3_thumb
                            : $postThumb ?>" alt="">
        <?php endif; ?>
        <div class="content">
            <?php get_template_part('elements/tags_container'); ?>
            <?php if (!in_category('analises-games', get_the_ID())) : ?>
                <h1><?= get_the_title() ?></h1>
            <?php endif; ?>
            <?php
                if (in_category('podcast', $postId)) :
                    $anchorMp3 = trim(get_post_meta(get_the_ID(), 'anchor_mp3_url', true)) ?? null;                
                    if (strpos($post->post_content, 'podcasters.spotify.com') != true && !empty($anchorMp3)) :
            ?>
                        <audio controls>
                            <source src="<?= $anchorMp3 ?>">
                        </audio>
            <?php
                    endif;
                endif;
            ?>            
            <?= get_the_content() ?>
        </div>
        <?php get_template_part('parts/comments'); ?>
    </div>
</main>

<?php get_footer(); ?>
