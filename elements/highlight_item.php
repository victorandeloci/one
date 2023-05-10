<?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
<a 
    href="<?= get_permalink() ?>"
    class="highlight-item"
    style="background-image: url(<?= !empty($thumbnail) 
                                        ? $thumbnail
                                        : (get_template_directory_uri() . '/assets/img/default-image.png') ?>);">
    <div class="overlay"></div>
    <div class="content">
        <h3><?= get_the_title() ?></h3>
        <p><?= excerpt(15) ?></p>
    </div>
</a>