<?php 
    $thumbnail = trim(get_post_meta(get_the_ID(), 'one_highlight_thumb_url', true));
    if (empty($thumbnail))
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
?>
<a 
    href="<?= get_permalink() ?>"
    class="highlight-item"
    draggable="false" 
    style="background-image: url(<?= !empty($thumbnail) 
                                        ? $thumbnail
                                        : (get_template_directory_uri() . '/assets/img/default-image.png') ?>);">
    <div class="overlay"></div>
    <div class="content">
        <h3><?= get_the_title() ?></h3>
        <hr>
        <p><?= excerpt(15) ?></p>
    </div>
</a>