<?php get_header(); ?>
<main id="mainContainer" class="page">
  <div class="container">
    <div class="post-title">
      <h1><?php echo get_the_title(); ?></h1>
      <hr>
    </div>
    <article class="post-container">
      <?php echo get_the_content(); ?>
    </article>
   </div>
</main>
<?php get_footer(); ?>
