<div class="default">
  <a alt="<?php echo the_title(); ?>" class="post" id="<?php the_id(); ?>" href="<?php echo get_permalink(); ?>">
    <?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium'); if (empty($thumbnail)) $thumbnail = get_template_directory_uri() . '/img/default-image.png'; ?>
    <div class="post-thumb" style="background-image: url('<?= $thumbnail ?>');"></div>
    <div class="post-details">
      <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
      <h2><?php echo get_the_title(); ?></h2>
    </div>
  </a>
</div>
