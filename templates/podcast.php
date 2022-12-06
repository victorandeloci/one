<?php /* Template Name: Podcast Page */ ?>
<?php get_header(); ?>
<main id="mainContainer">
  <section class="podcasts podcasts-details">

    <div class="container">
      <div class="column first">

      <?php query_posts('category_name=podcast'); ?>

      <?php
        $i = 0;
        if (have_posts()) : while(have_posts() && $i <= 0) : the_post();

        //checa se tem um meta de url de thumb mp3
        if (trim(get_post_meta(get_the_ID(), "podcast_mp3_thumb", true)))
          $podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), "podcast_mp3_thumb", true));

              ?>
            <a href="<?php the_permalink(); ?>" class="post" title="<?= get_the_title() ?>"><img src="<?php if ($podcast_mp3_thumb) echo $podcast_mp3_thumb; else echo the_post_thumbnail_url('medium');  ?>"></a>
          <?php
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

  <section class="podcasts podcast-page">

    <?php query_posts('category_name=playercast'); ?>

    <div class="container">
      <h2>PlayerCast</h2>
      <?php if(category_description()) echo category_description(); ?>
      <div class="podcasts" id="playercastContainer">
        <?php
          $i = 0;
          if (have_posts()) : while(have_posts() && $i <= 3) : the_post();

              get_template_part('parts/podcast_block');
              $i++;
            endwhile;
          endif;

          ?>
      </div>

      <button class="btn" type="button" name="loadMore" slug="playercast" container="#playercastContainer" id="podcastsLoadMore">Carregar Mais</button>

    </div>

    <?php query_posts('category_name=psnews'); ?>

    <div class="container">
      <h2>PS News</h2>
      <?php if(category_description()) echo category_description(); ?>
      <div class="podcasts" id="psnewsContainer">
        <?php
          $i = 0;
          if (have_posts()) : while(have_posts() && $i <= 3) : the_post();

              get_template_part('parts/podcast_block');
              $i++;
            endwhile;
          endif;

          ?>
      </div>

      <button class="btn" type="button" name="loadMore" slug="psnews" container="#psnewsContainer" id="podcastsLoadMore">Carregar Mais</button>

    </div>

    <?php query_posts('category_name=bkp'); ?>

    <div class="container">
      <h2>BKP</h2>
      <?php if(category_description()) echo category_description(); ?>
      <div class="podcasts" id="bkpContainer">
        <?php
          $i = 0;
          if (have_posts()) : while(have_posts() && $i <= 3) : the_post();

              get_template_part('parts/podcast_block');
              $i++;
            endwhile;
          endif;

          ?>
      </div>

      <button class="btn" type="button" name="loadMore" slug="bkp" container="#bkpContainer" id="podcastsLoadMore">Carregar Mais</button>

    </div>

  </section>
</main>
<?php get_footer(); ?>