<?php
    $args = [
        'post_type' => 'post',
        'category_name' => 'podcast',
        'order' => 'DESC',
        'posts_per_page' => 13
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()):
?>

    <section id="podcast">
        <div class="container">
            <h2 class="subtitle">Podcast</h2>
            <div class="items">
                <?php
                    $i = 0;
                    while ($query->have_posts()):
                        $query->the_post();
                ?>
                    <div class="podcast-item">
                        <a href="<?= get_permalink() ?>" title="<?= get_the_title() ?>">
                            <?php 
                                $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true));
                                $postThumb = get_the_post_thumbnail_url(get_the_ID(), ($i == 0) ? 'large' : 'medium');
                            ?>
                            <img src="<?= !empty($podcast_mp3_thumb) 
                                            ? $podcast_mp3_thumb
                                            : (!empty($postThumb)
                                                ? $postThumb
                                                : get_template_directory_uri() . '/assets/img/default-image.png') ?>" alt="">
                        </a>
                        <?php if ($i == 0): ?>
                            <div class="content">
                                <?php get_template_part('elements/tags_container'); ?>
                                <h2><?= get_the_title() ?></h2>
                                <?= get_the_content() ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php
                        $i++; 
                    endwhile;
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>