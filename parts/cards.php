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
                  <h3><?php the_title(); ?></h3>
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
