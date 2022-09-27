<?php /* Template Name: Contact Page */ ?>
<?php get_header(); ?>
<main id="mainContainer" class="page contact">
  <div class="container">
    <div class="post-title">
      <h1><?php echo get_the_title(); ?></h1>
      <hr>
    </div>
    <article class="post-container">
      <?php echo get_the_content(); ?>
      <h2>Redes Sociais</h2>
      <?php get_template_part('elements/social_links'); ?>
    </article>
   </div>
</main>
<?php get_footer(); ?>
