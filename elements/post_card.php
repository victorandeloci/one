<?php 
    $postThumb = get_the_post_thumbnail_url(get_the_ID(), (isset($args['index']) && $args['index'] == 0) ? 'large' : 'medium');
    $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true));
        if (empty($podcast_mp3_thumb))
            $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'one_podcast_cover_url', true));
        if (empty($podcast_mp3_thumb))
            $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'episode_cover', true));
?>
<div class="post-card <?= !empty($podcast_mp3_thumb) ? 'podcast-ep' : '' ?>">
    <a 
        href="<?= get_permalink() ?>"
        class="thumb"
        title="<?= get_the_title() ?>"
        style="background-image: url(<?= !empty($podcast_mp3_thumb)
                                            ? $podcast_mp3_thumb
                                            : (!empty($postThumb)
                                                ? $postThumb
                                                : get_template_directory_uri() . '/assets/img/default-image.png') ?>);"
    ></a>
    <div class="content">
        <?php get_template_part('elements/tags_container'); ?>
        <a href="<?= get_permalink() ?>">
            <h2><?= get_the_title() ?></h2>
        </a>
    </div>
</div>