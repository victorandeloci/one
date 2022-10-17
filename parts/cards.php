<section class="cards">
  <div class="container">
    <h2>Textos <i class="far fa-file-alt"></i></h2>
    <hr>
    <div>
      <?php
        query_posts("category_name=textos");

        $i = 0;
        if(have_posts()) : while(have_posts() && $i <= 3) : the_post();
            ?>
              <a class="item post <?php if($i % 2) echo "odd"; ?>" href="<?php the_permalink(); ?>">
                <div class="thumb" style="background-image: url('<?php echo the_post_thumbnail_url('medium');  ?>');"></div>
                <div class="description">
                  <div class="title-container">
                    <h3><?php the_title(); ?></h3>
                    <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_review_score_value', true))): ?>
                      <div class="score-container" style="background-image: url(<?= get_template_directory_uri() . '/img/logo_base_empty.png' ?>);">
                        <span><?= get_post_meta(get_the_ID(), 'one_game_review_score_value', true) ?></span>
                      </div>
                    <?php endif; ?>
                  </div>
                  <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
                  <p><?php echo excerpt(10); ?></p>
                </div>
              </a>
            <?php
            $i++;
          endwhile;
        endif;

       ?>
    </div>
  </div>
 </section>
