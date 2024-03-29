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
        <a href="<?= $args['item']->link ?>" target="_blank" rel="noopener noreferrer" title="<?= $args['item']->title ?>">
            <img src="<?= (!empty($imageUrl)) ? $imageUrl : get_template_directory_uri() . '/assets/img/default-image.png' ?>" alt="<?= $args['item']->title ?>">
        </a>
        <div class="content">
            <a href="<?= $args['item']->link ?>" target="_blank" rel="noopener noreferrer" title="<?= $args['item']->title ?>">
                <h3><?= $args['item']->title ?></h3>
            </a>
            <p><?= substr(strip_tags($args['item']->description), 0, 96) . '...' ?></p>
            <a href="<?= $args['item']->link ?>" target="_blank" rel="noopener noreferrer" title="<?= $args['item']->title ?>">Leia mais</a>
        </div>
    </div>
<?php endif; ?>
