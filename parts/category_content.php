<div class="content-back">
  <div class="container">
    <section class="default-container">
      <div class="last-posts">
        <div class="cat-title-container">
          <h1><?php echo single_cat_title( '', false ); ?></h1>
          <?php if(category_description()) echo category_description(); ?>
        </div>
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
        <button class="btn" type="button" name="loadMore" id="categoryLoadMore">Carregar Mais</button>
      </div>
      <?php get_sidebar(); ?>
    </section>
  </div>
</div>
