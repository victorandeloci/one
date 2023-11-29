<?php 
    get_header();
    $eventPost = get_post(get_the_ID());
    $postThumb = get_the_post_thumbnail_url(get_the_ID());
?>

<main class="post event" style="background-image: url(<?= $postThumb ?>);">
    <div class="container">
        <div class="event-details">
            <?php
                $logoUrl = get_post_meta(get_the_ID(), 'one_custom_thumbnail_url', true);
                if (!empty($logoUrl)) :
            ?>
                <img src="<?= $logoUrl ?>" alt="Event Logo" class="event-logo">
            <?php endif; ?>
            <div class="event-post-details">
                <h1><?= $eventPost->post_title ?></h1>
                <hr>
                <p><?= get_the_excerpt($eventPost->ID) ?></p>
            </div>
        </div>
        <div class="content">      
            <?php
                $podcastTag = get_post_meta($eventPost->ID, 'one_podcast_tag_value', true);
                if (!empty($podcastTag)):

                    $args = [
                        'post_type' => 'post',
                        'category_name' => 'podcast',
                        'order' => 'ASC',
                        'tag' => $podcastTag,
                        'posts_per_page' => 3
                    ];

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
            ?>
                        <h2 class="subtitle">Episódios marcados em <span>#<?= $podcastTag ?></span></h2>
                        <div class="podcast-items event-podcast-content">
                            <?php
                                while($query->have_posts()) {
                                    $query->the_post();
                                    get_template_part('elements/podcast_item');
                                }
                            ?>
                        </div>
            <?php
                    endif;
                endif;
            ?>
            <?php if (!empty($eventPost->post_content)) : ?>
                <div class="event-post-content">
                    <?= $eventPost->post_content ?>
                </div>
            <?php endif; ?>
            <?php
                $instagramEmbed_1 = get_post_meta($eventPost->ID, 'one_instagram_data_1', true);
                $instagramEmbed_2 = get_post_meta($eventPost->ID, 'one_instagram_data_2', true);

                    if (!empty($instagramEmbed_1) || !empty($instagramEmbed_2)) :
            ?>
                        <h2 class="subtitle">Acompanhe pelo Instagram</h2>
                        <div class="instagram-posts">
                            <?= htmlspecialchars_decode($instagramEmbed_1) ?>
                            <?= htmlspecialchars_decode($instagramEmbed_2) ?>
                        </div>
            <?php endif; ?>
        </div>

        <?php
            $term = get_post_meta($eventPost->ID, 'one_event_term_value', true);
            if (!empty($term)):

                $args = [
                    'post_type' => 'post',
                    'order' => 'ASC',
                    's' => $term,
                    'posts_per_page' => 2
                ];

                $query = new WP_Query($args);

                if ($query->have_posts()) :
        ?>
                    <section class="event-linked-posts">
                        <h2 class="subtitle">Veja também</h2>
                        <div class="post-list-container">
                            <?php
                                while ($query->have_posts()) {
                                    $query->the_post();
                                    get_template_part( 'elements/post_card' );
                                }
                            ?>
                        </div>
                    </section>
        <?php
                endif;
            endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
