<section class="podcasts">

  <div class="container">
    <div class="column first">
      <?php
        query_posts("category_name=podcast");
        $i = 0;
        if (have_posts()) : while(have_posts() && $i <= 3) : the_post();

              get_template_part('parts/podcast_block');

              $i++;
          endwhile;
        endif;
        ?>
    </div>
    <div class="column second">
      <?php get_template_part('parts/podcast_details'); ?>
    </div>

  </div>

</section>
