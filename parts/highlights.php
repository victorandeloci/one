<section id="highlights">
  <?php
    $args = [
      'post_type' => 'post',
      'category_name' => 'highlight',
      'order' => 'DESC',
      'posts_per_page' => 5
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()):
  ?>

  <div class="slider-wrapper">
    <button class="slide-arrow" id="slide-arrow-prev">
      &#8249;
    </button>
    <button class="slide-arrow" id="slide-arrow-next">
      &#8250;
    </button>
    <div class="slides-container" id="slides-container">
      <?php
        while ($query->have_posts()):
          $query->the_post();
      ?>

        <div
          class="slide"
          style="background-image: url(<?= the_post_thumbnail_url() ?>);"
        >
          <div class="overlay"></div>
          <div class="container">
            <a class="title-link" href="<?= get_the_permalink() ?>">
              <div class="title-container">
                <h2><?= get_the_title() ?></h2>
                <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_review_score_value', true))): ?>
                  <div class="score-container" style="background-image: url(<?= get_template_directory_uri() . '/img/logo_base_empty.png' ?>);">
                    <span><?= get_post_meta(get_the_ID(), 'one_game_review_score_value', true) ?></span>
                  </div>
                <?php endif; ?>
              </div>
              <p><?= excerpt(20) ?></p>
            </a>

            <?php
              $categories = get_the_category();
              if (!empty($categories)):
            ?>
              <div class="category-container">
                <?php
                  foreach ($categories as $cat):
                    if ($cat->slug != 'highlight'):
                ?>
                      <a href="<?= get_category_link($cat) ?>"><?= $cat->name ?></a>
                <?php
                    endif;
                  endforeach;
                ?>
              </div>
            <?php endif; ?>

            <?php get_template_part('elements/tags_container'); ?>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
  </div>
  <?php endif; ?>
</section>
