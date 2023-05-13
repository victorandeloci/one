<a 
    href="<?= get_permalink() ?>"
    class="post-card"
    title="<?= get_the_title() ?>"
>
    <?php 
        $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true));
        $postThumb = get_the_post_thumbnail_url(get_the_ID(), ($i == 0) ? 'large' : 'medium');
    ?>
    <img src="<?= !empty($podcast_mp3_thumb) 
                    ? $podcast_mp3_thumb
                    : (!empty($postThumb)
                        ? $postThumb
                        : get_template_directory_uri() . '/assets/img/default-image.png') ?>" alt="">
    <div class="content">
        <?php get_template_part('elements/tags_container'); ?>
        <h2><?= get_the_title() ?></h2>
    </div>
    
</a>