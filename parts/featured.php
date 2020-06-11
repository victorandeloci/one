<section class="featured">
  <?php
    $i = 0;
    if(have_posts()) : while(have_posts() && $i <= 4) : the_post();

      ?>
        <div class="big" style="background-image: url('<?php echo the_post_thumbnail_url('large'); ?>');">
          <a href="<?php the_permalink(); ?>" class="post">
            <h3>
              <?php
                echo substr(get_the_title(), 0, 50);
                if(strlen(get_the_title()) > 50)
                  echo "(...)";
              ?>
            </h3>
			  <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
          </a>
        </div>
      <?php

        $i++;
      endwhile;
    endif;

   ?>
</section>
