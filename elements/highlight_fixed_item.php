<?php  $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
<a 
    href="<?= trim(get_post_meta(get_the_ID(), 'one_fixed_highlight_url', true)) ?>"
    class="highlight-item"
    draggable="false"
    target="_blank"
    rel="noopener nofollow"
    style="background-image: url(<?= !empty($thumbnail) 
                                        ? $thumbnail
                                        : (get_template_directory_uri() . '/assets/img/default-image.png') ?>);">
    <?php if (!empty(trim(get_post_meta(get_the_ID(), 'one_fixed_highlight_show_info', true))) && (bool) trim(get_post_meta(get_the_ID(), 'one_fixed_highlight_show_info', true)) == true) : ?>
        <div class="overlay"></div>
        <div class="content">
            <h3><?= get_the_title() ?></h3>
            <hr>
            <p><?= get_the_excerpt() ?></p>
        </div>
    <?php else : ?>
        <div class="icon-container">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 32C32 14.3 46.3 0 64 0H320c17.7 0 32 14.3 32 32s-14.3 32-32 32H290.5l11.4 148.2c36.7 19.9 65.7 53.2 79.5 94.7l1 3c3.3 9.8 1.6 20.5-4.4 28.8s-15.7 13.3-26 13.3H32c-10.3 0-19.9-4.9-26-13.3s-7.7-19.1-4.4-28.8l1-3c13.8-41.5 42.8-74.8 79.5-94.7L93.5 64H64C46.3 64 32 49.7 32 32zM160 384h64v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V384z"/></svg>
        </div>
    <?php endif; ?>
</a>