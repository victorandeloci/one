<div class="more-posts">
  <h2>Mais em <span><?php echo get_the_category($post->ID)[0]->name; ?></span></h2>
  <?php

    $articlePostId = $post->ID;
    $slug = get_the_category($articlePostId)[0]->slug;

    query_posts(array("category_name" => $slug));

    ?>

    <div class="last-posts">
      <div class="posts" id="defaultContainer">

        <?php
          $i = 0;
          if (have_posts()) : while (have_posts() && $i <= 3) : the_post();
            if($articlePostId != get_the_id()):
              get_template_part("parts/default_block");
            endif;
          $i++;
            endwhile;
          else:
            echo "Sem mais posts!";
          endif;
        ?>
      </div>
    </div>

    <?php

    wp_reset_query();

   ?>
</div>
