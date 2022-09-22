<?php
  get_header();
  $eventPost = get_post(get_the_ID());
?>
  <main id="mainContainer" class="event" style="background-image: url(<?= get_the_post_thumbnail_url($eventPost->ID) ?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="column">
          <?php
            $logoUrl = get_post_meta(get_the_ID(), 'one_custom_thumbnail_url', true);
            if (!empty($logoUrl)):
          ?>
            <img src="<?= $logoUrl ?>" alt="Event Logo" class="event-logo">
          <?php endif; ?>
          <div class="event-post-content">
            <h1><?= $eventPost->post_title ?></h1>
            <div class="h-decoration"></div>
            <p><?= get_the_excerpt($eventPost->ID) ?></p>
          </div>
          <?php get_template_part('parts/sharer'); ?>
        </div>
        <div class="column">
          <div class="event-post-content">
            <?= $post->post_content ?>
          </div>
          <?php
            $podcastTag = get_post_meta($eventPost->ID, 'one_podcast_tag_value', true);
            if (!empty($podcastTag)):

              $args = [
                'post_type' => 'post',
                'category_name' => 'podcast',
                'order' => 'DESC',
                'tag' => $podcastTag,
                'posts_per_page' => 3
              ];

              $query = new WP_Query($args);

              if ($query->have_posts()):
            ?>
                <a href="<?= get_home_url() ?>/podcasts" class="subtitle" target="_blank" rel="noopener noreferrer">
                  <i class="fas fa-headphones-alt"></i>
                  Últimos episódios
                </a>
                <div class="h-decoration"></div>
                <div class="event-podcast-content">
                  <?php
                    while($query->have_posts()): $query->the_post();
                      get_template_part('parts/podcast_block');
                    endwhile;
                  ?>
                </div>
          <?php
              endif;
            endif;
          ?>
          <?php
            $instagramEmbed_1 = get_post_meta($eventPost->ID, 'one_instagram_data_1', true);
            $instagramEmbed_2 = get_post_meta($eventPost->ID, 'one_instagram_data_2', true);

            if (!empty($instagramEmbed_1) || !empty($instagramEmbed_2)):
          ?>
            <a href="https://www.instagram.com/playerselectbr/" class="subtitle" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-instagram"></i>
              Acompanhe pelo Instagram
            </a>
            <div class="h-decoration"></div>
            <div class="instagram-posts">
              <?= htmlspecialchars_decode($instagramEmbed_1) ?>
              <?= htmlspecialchars_decode($instagramEmbed_2) ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
