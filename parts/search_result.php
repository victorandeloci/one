<?php

  if(isset($_GET['search']))
    $s = $_GET['search'];
  else
    $s = get_search_query();

  $args = array('s' => $s,
                'post_type' => 'post');
  // The Query
  query_posts($args);
  if(have_posts()){
    ?>
    <div class="content-back">
      <div class="container">
        <section class="default-container">
          <div class="last-posts">
            <h1 class="title-space">Resultados para: <span class="searchTerm"><?php echo $s; ?></span></h1>
            <div class="posts" id="defaultContainer">
              <?php
              $i = 1;
              while(have_posts() && $i <= 6){
                 the_post();

                  get_template_part("parts/default_block");

                  $i++;
              }
              ?>
            </div>
            <button class="btn" type="button" name="loadMore" id="searchLoadMore" s="<?php echo $s; ?>">Carregar Mais</button>
          </div>
          <?php get_sidebar(); ?>
        </section>
      </div>
    </div>
          <?php
  }
  else{
  ?>
  <section class="default-container">
    <div class="content-back">
      <div class="container">
        <div class="last-posts">
          <h1>Sem resultados para: <span class="searchTerm"><?php echo $s; ?></span></h1>
        </div>
      </div>
    </div>
  </section>
  <?php
  }

  wp_reset_query();

?>
