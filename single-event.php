<?php
  get_header();
  $post = get_post(get_the_ID());
?>
  <main id="mainContainer" class="event" style="background-image: url(<?= get_the_post_thumbnail_url($post->ID) ?>);">
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
            <h1><?= $post->post_title ?></h1>
            <hr>
            <p><?= get_the_excerpt($post->ID) ?></p>
          </div>
        </div>
        <div class="column">
          <?php
            $instagramEmbed_1 = get_post_meta(get_the_ID(), 'one_instagram_data_1', true);
            $instagramEmbed_2 = get_post_meta(get_the_ID(), 'one_instagram_data_2', true);

            if (!empty($instagramEmbed_1) || !empty($instagramEmbed_2) || !empty($instagramEmbed_3) || !empty($instagramEmbed_4)):
          ?>
            <div class="instagram-content">
              <a href="https://www.instagram.com/playerselectbr/" class="instagram" target="_blank" rel="noopener noreferrer">
                Acompanhe pelo Instagram
                <i class="fab fa-instagram"></i>
              </a>
              <hr>
              <div class="instagram-posts">
                <?= htmlspecialchars_decode($instagramEmbed_1) ?>
                <?= htmlspecialchars_decode($instagramEmbed_2) ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
