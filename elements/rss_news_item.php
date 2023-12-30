<?php if (!empty($args['item'])) : ?>
    <div class="rss-news-item">
        <?php
            $imageUrl = '';
            $defaultImageUrl = $args['item']->children('media', true)->content->attributes()->url;

            if (!empty($defaultImageUrl)) {
                $pureUrl = explode('?', $defaultImageUrl)[0];
                if (!empty($pureUrl)) {
                    $imageUrl = $pureUrl . '?width=200&quality=80';
                }
            }
        ?>
            <img src="<?= (!empty($imageUrl)) ? $imageUrl : get_template_directory_uri() . '/assets/img/default-image.png' ?>" alt="<?= $args['item']->title ?>">
        <div class="content">
            <h3><?= $args['item']->title ?></h3>
            <span><?= date('d/m/Y', strtotime($args['item']->pubDate)) ?></span>
        </div>
    </div>
<?php endif; ?>