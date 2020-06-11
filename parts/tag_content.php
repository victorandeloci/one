<?php

  if(isset($_GET['tag']))
    $tag = $_GET['tag'];
  else {
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $tag = substr($url, strpos($url, "tag/") + 4);

    if(!$tag || $tag == null)
      $tag = "";
  }

  $args = array('tag' => $tag,
                'post_type' => 'post');
  // The Query
  query_posts($args);
  if(have_posts()){
    ?>
    <div class="content-back">
      <div class="container">
        <section class="default-container">
          <div class="last-posts">
            <h1 class="title-space"><span class="searchTerm">#<?php echo $tag; ?></span></h1>
            <div class="posts">
              <?php
              while(have_posts()){
                 the_post();
                   get_template_part("parts/default_block");
              }
              ?>
            </div>
          </div>
          <div class="vr"></div>
          <?php get_sidebar(); ?>
        </section>
      </div>
    </div>
          <?php
  }
  else{
  ?>
  <div class="content-back">
    <div class="container">
      <section class="default-container">
        <div class="last-posts">
          <h1>Sem marcações para: <span class="searchTerm"><?php echo $s; ?></span></h1>
        </div>
      </section>
    </div>
  </div>
  <?php
  }

  wp_reset_query();

?>
