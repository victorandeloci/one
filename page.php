<?php get_header(); ?>
<main id="mainContainer">
  <div class="content-back" style="background-image: url('<?php echo get_the_post_thumbnail_url($postId); ?>');">
    <div class="post-title">
      <h1><?php echo get_the_title(); ?></h1>
    </div>
    <div class="container">
      <div class="page-block">
        <article class="post-container">
          <?php echo get_the_content(); ?>
        </article>
      </div>

     </div>
   </div>
</main>
<?php get_footer(); ?>
