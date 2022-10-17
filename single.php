<?php get_header(); ?>
  <main id="mainContainer">
    <?php
      $postId = get_the_id();
      if ($postId) :
        $post = get_post($postId);

        // thumbnail
        $thumbnail = get_the_post_thumbnail_url($postId);
        // get first image if no thumbnail
        if (empty($thumbnail)) {
          $thumbnail = get_first_image($postId);
        }

      ?>
        <div class="content-back" style="background-image: url('<?= $thumbnail ?>');">

          <div class="post-title">
            <h1><?php echo $post->post_title; ?></h1>
            <?php get_template_part('elements/tags_container'); ?>
            <?php
              if (in_category("podcast", $postId)) {

                if ( $episode_content = get_the_powerpress_content() ) {
                  ?>
                    <div class="power-press-player"><?php echo $episode_content; ?></div>
                  <?php
                }

                $EpisodeData = powerpress_get_enclosure_data(get_the_ID(), 'podcast');
                $MediaURL = powerpress_add_flag_to_redirect_url($EpisodeData['url'], 'p');

                ?>
                <div class="podcast-btns">
                  <a href="<?php echo $MediaURL; ?>" target="_blank" rel="noreferrer noopener" class="podcast-btn btn" id="podPlay" source="<?php echo $MediaURL; ?>">
                    <span><i class="fas fa-play"></i> Reproduzir</span>
                  </a>
                  <a id="podDownload" target="_blank" rel="noreferrer noopener" class="podcast-btn btn" href="<?php echo $MediaURL; ?>" download>
                    <span><i class="fas fa-download"></i> Download</span>
                  </a>
                </div>
                <?php
              }
             ?>
          </div>

          <div class="post-content">
            <div class="container">
              <div class="post-block">

                <?php

                  //checa se tem um meta de url de video
                  if (trim(get_post_meta($postId, "fvideoUrl", true))):

                    $fVideoUrl = trim(get_post_meta($postId, "fvideoUrl", true));

                    //pega id do video (YouTube)
                    if (strpos($fVideoUrl, "watch?v="))
                      $ytId = substr($fVideoUrl, strpos($fVideoUrl, "watch?v=") + 8);
                    else if (strpos($fVideoUrl, "youtu.be/"))
                      $ytId = substr($fVideoUrl, strpos($fVideoUrl, "youtu.be/") + 9);
                  ?>

                  <div class="video-container">
                    <iframe src="https://youtube.com/embed/<?php echo $ytId; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>

                <?php
                  endif;
                 ?>

                <div class="post-column-layout">
                  <article class="post-container">
                    <div class="details">
                      <i class="fas fa-user-alt"></i>
                      <span><?php echo get_the_author_meta("nickname", $post->post_author); ?></span>
                      <i class="far fa-calendar-minus"></i>
                      <span><?php echo get_the_date("d / m / Y", $postId); ?></span>
                    </div>
                    <?php echo $post->post_content; ?>

                    <?php get_template_part("parts/sharer"); ?>

                    <?php get_template_part("parts/comments"); ?>

                    </article>
                  <?php get_sidebar(); ?>
                </div>

                <?php get_template_part("parts/more_posts") ?>

              </div>
             </div>
          </div>

        </div>
      <?php endif; ?>
  </main>
<?php get_footer(); ?>
