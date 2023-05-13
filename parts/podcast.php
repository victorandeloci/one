<section id="podcast">
    <div class="container">
        <h2 class="subtitle">Podcast</h2>
        <div class="selector">
            <select class="podcast-select" name="Podcasts Selector">
                <option value="">Selecione um episódio</option>
                <?php
                    $args = [
                        'post_type' => 'post',
                        'category_name' => 'podcast',
                        'order' => 'DESC',
                        'hide_empty'=> 1,
                        'depth' => 1,
                        'posts_per_page' => -1
                    ];

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) :
                            $query->the_post();
                ?>
                            <option title="<?php the_title(); ?>" value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                <?php
                        endwhile;
                    endif;
                ?>
            </select>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
        </div>
        <?php
            $args = [
                'post_type' => 'post',
                'category_name' => 'podcast',
                'order' => 'DESC',
                'posts_per_page' => 13
            ];

            wp_reset_query();
            $query = new WP_Query($args);

            if ($query->have_posts()):
        ?>
                <div class="items">
                    <?php
                        $i = 0;
                        while ($query->have_posts()):
                            $query->the_post();
                    ?>
                        <div class="podcast-item">
                            <?php 
                                $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true));
                                $postThumb = get_the_post_thumbnail_url(get_the_ID(), ($i == 0) ? 'large' : 'medium');
                            ?>
                            <a 
                                href="<?= get_permalink() ?>" 
                                class="podcast-ep"
                                title="<?= get_the_title() ?>"
                                style="background-image: url(<?= !empty($podcast_mp3_thumb) 
                                                                    ? $podcast_mp3_thumb
                                                                    : (!empty($postThumb)
                                                                        ? $postThumb
                                                                        : get_template_directory_uri() . '/assets/img/default-image.png') ?>);"
                            ></a>
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
        <?php endif; ?>
    </div>
</section>