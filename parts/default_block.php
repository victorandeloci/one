<div class="default">
  <a alt="<?php echo the_title(); ?>" class="post" id="<?php the_id(); ?>" href="<?php echo get_permalink(); ?>">
    <div class="post-thumb" style="background-image: url('<?php the_post_thumbnail_url('thumbnail'); ?>');"></div>
    <div class="post-details">
      <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
      <h2><?php echo get_the_title(); ?></h2>
    </div>
  </a>
</div>
