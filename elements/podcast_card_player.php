<?php 
    if (!empty($args['post'])) :
        $post = $args['post'];
        $postThumb = get_the_post_thumbnail_url($post->ID, 'medium');
        $podcast_mp3_thumb = trim(get_post_meta($post->ID, 'podcast_mp3_thumb', true));
        if (empty($podcast_mp3_thumb))
            $podcast_mp3_thumb = trim(get_post_meta($post->ID, 'one_podcast_cover_url', true));
        if (empty($podcast_mp3_thumb))
            $podcast_mp3_thumb = trim(get_post_meta($post->ID, 'episode_cover', true));
?>
    <div class="card-player">
        <div class="row">
            <a href="<?= get_permalink($post->ID) ?>" class="column" style="background-image: url(<?= !empty($podcast_mp3_thumb) 
                                                                    ? $podcast_mp3_thumb
                                                                    : (!empty($postThumb)
                                                                        ? $postThumb
                                                                        : get_template_directory_uri() . '/assets/img/default-image.png') ?>);"></a>
            <div class="column">
                <?php get_template_part('elements/tags_container', null, [
                    'post_id' => $post->ID
                ]); ?>
                <h3><?= get_the_title($post->ID) ?></h3>
                <?php get_template_part('elements/podcast_player', null, [
                    'post_id' => $post->ID,
                    'hide_controls' => true
                ]); ?>
            </div>
        </div>
    </div>
<?php endif; ?>