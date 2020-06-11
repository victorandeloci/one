<?php

  if(isset($_GET['url'])){
    $url = $_GET['url'];
    if($url)
      $postId = url_to_postid($url);
    else
      echo "URL não definida!";
  }

  if(!isset($url)){
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $postId = url_to_postid($url);

  }

  if($postId){
    $post = get_post($postId);
      if($post->post_type == "post"){
      ?>

        <div id="metaInformation">
          <meta property="og:image" content="<?php echo get_the_post_thumbnail_url($postId); ?>"/>
          <title><?php echo $post->post_title; ?></title>
          <meta property="og:title" content="<?php echo $post->post_title; ?>"/>
          <meta property="og:description" content="" />
          <meta property="og:url" content="<?php echo get_permalink($postId); ?>"/>
          <meta name="keywords" content="<?php
            $tags = get_tags($post->post_ID);
            $i = 0;
            foreach ($tags as $tag) {
              if($i)
                echo ',';
              echo $tag->name;
              $i++;
            }
           ?>">
		   <?php echo get_post_meta($post->post_ID); ?>
        </div>

        <div class="content-back" style="background-image: url('<?php echo get_the_post_thumbnail_url($postId); ?>');">

          <div class="post-title">
            <h1><?php echo $post->post_title; ?></h1>
            <div class="tags-container">
              <?php

                $i = 0;
                $tags = get_the_tags($postId);
                if($tags):
                  foreach ($tags as $tag) {
                    if($i <= 4){
                    ?>
                      <a href="/tag/<?php echo str_replace(" ", "-", $tag->name); ?>" tag="<?php echo str_replace(" ", "-", $tag->name); ?>" id="tagLink" class="tag"><span># </span><?php echo $tag->name; ?></a>
                    <?php
                    }
                    $i++;
                  }
                endif;
               ?>
            </div>
            <?php
              if(in_category("podcast", $postId)){

                if( $episode_content = get_the_powerpress_content() ) {
                  ?>
                    <div class="power-press-player"><?php echo $episode_content; ?></div>
                  <?php
                }

                $EpisodeData = powerpress_get_enclosure_data(get_the_ID(), 'podcast');
                $MediaURL = powerpress_add_flag_to_redirect_url($EpisodeData['url'], 'p');

                ?>
                <div class="podcast-btns">
                  <div class="podcast-btn btn" id="podPlay" source="<?php echo $MediaURL; ?>">
                    <span><i class="fas fa-play"></i> Reproduzir</span>
                  </div>
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
                  if(trim(get_post_meta($postId, "fvideoUrl", true))):

                    $fVideoUrl = trim(get_post_meta($postId, "fvideoUrl", true));

                    //pega id do video (YouTube)
                    if(strpos($fVideoUrl, "watch?v="))
                      $ytId = substr($fVideoUrl, strpos($fVideoUrl, "watch?v=") + 8);
                    else if(strpos($fVideoUrl, "youtu.be/"))
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
      <?php
    }
    else if($post->post_type == "page" && $post->post_name == "podcasts"){
      get_template_part("parts/podcast_content");
    }
    else if($post->post_type == "page" && $post->post_name == "contate-nos"){
      get_template_part("parts/contact_content");
    }
    else if($post->post_type == "page" && $post->post_name == "equipe"){
      get_template_part("parts/equipe_content");
    }
    else if($post->post_type == "page"){
      ?>
      <div id="metaInformation">
        <meta property="og:image" content="<?php echo get_the_post_thumbnail_url($postId); ?>"/>
        <title><?php echo $post->post_title; ?></title>
        <meta property="og:title" content="<?php echo $post->post_title; ?>"/>
        <meta property="og:description" content="" />
        <meta property="og:url" content="<?php echo get_permalink($postId); ?>"/>
      </div>

      <div class="content-back" style="background-image: url('<?php echo get_the_post_thumbnail_url($postId); ?>');">
        <div class="post-title">
          <h1><?php echo $post->post_title; ?></h1>
        </div>
        <div class="container">
          <div class="page-block">
            <article class="post-container">
              <?php echo $post->post_content; ?>
            </article>
          </div>

         </div>
       </div>
      <?php
    }
  }
  else {
    echo "No ID!!!";
  }
 ?>
