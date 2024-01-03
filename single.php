<?php 
    get_header();
    $post = get_post();
?>

<main class="post <?= in_category('analises-games', get_the_ID()) ? 'review' : '' ?>">
    <div class="container">
        <?php
            $postThumb = get_the_post_thumbnail_url(get_the_ID());
            $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true));
            if (empty($podcast_mp3_thumb))
                $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'episode_cover', true));
            if (empty($podcast_mp3_thumb))
                $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'one_podcast_cover_url', true));            
        ?>
        <?php get_template_part('elements/post_details'); ?>
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
                    <?php endif; ?>
                </div>
            </div>            
        <?php 
            elseif (!empty(trim(get_post_meta(get_the_ID(), 'fvideoUrl', true)))) :
                $fvideoUrl = trim(get_post_meta(get_the_ID(), 'fvideoUrl', true));
                $ytVideoId = oneGetYoutubeIdFromUrl($fvideoUrl);
        ?>
            <iframe 
                class="embed-video"
                src="https://www.youtube.com/embed/<?= $ytVideoId ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
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
                if (in_category('podcast', get_the_ID()))
                    get_template_part('elements/podcast_player');
            ?>
            <?= get_the_content() ?>
        </div>
        <?php if (in_category('analises-games', get_the_ID()) && !empty(get_post_meta(get_the_ID(), 'one_game_review_score_value', true))): ?>
            <div class="game-score">
                <div class="score-container" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/logo_base_empty.png' ?>);">
                    <span><?= get_post_meta(get_the_ID(), 'one_game_review_score_value', true) ?></span>
                </div>
                <div class="score-definition">
                    <p><?= getGRSD(get_post_meta(get_the_ID(), 'one_game_review_score_value', true)) ?></p>
                </div>
            </div>
        <?php endif; ?>
        <?php get_template_part('parts/comments'); ?>
    </div>
</main>

<?php get_footer(); ?>
