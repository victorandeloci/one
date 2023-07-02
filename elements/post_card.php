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
        <div class="post-details">
            <?php if (in_category('textos')) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                <span><?= !empty(get_the_author_meta('first_name', $post->post_author))
                            ? get_the_author_meta('first_name', $post->post_author) . ' ' . get_the_author_meta('last_name', $post->post_author)
                            : get_the_author_meta('nicename', $post->post_author) ?></span>
            <?php elseif (in_category('podcast') && !empty(trim(get_post_meta(get_the_ID(), 'episode_duration', true)))) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                <span><?= trim(get_post_meta(get_the_ID(), 'episode_duration', true)) ?></span>
            <?php endif; ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0c13.3 0 24 10.7 24 24V64H296V24c0-13.3 10.7-24 24-24s24 10.7 24 24V64h40c35.3 0 64 28.7 64 64v16 48V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V192 144 128C0 92.7 28.7 64 64 64h40V24c0-13.3 10.7-24 24-24zM400 192H48V448c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V192zM329 297L217 409c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47 95-95c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
            <span><?= get_the_date('d/m/Y', get_the_ID()) ?></span>
        </div>
        <a href="<?= get_permalink() ?>">
            <h2><?= get_the_title() ?></h2>
        </a>
    </div>
</div>