<div class="default">
    <a onclick="return false;" alt="<?php echo the_title(); ?>" class="post" id="<?php the_id(); ?>" href="<?php echo get_permalink(); ?>">
      <div class="post-thumb" style="background-image: url('<?php the_post_thumbnail_url('thumbnail'); ?>');"></div>
      <div class="post-details">
        <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
        <h2><?php echo mb_substr(get_the_title(), 0, 40);
        if(strlen(get_the_title()) > 40)
          echo "(...)"; ?></h2>
<p><?php echo excerpt(12); ?></p>
      </div>
    </a>
  </div>
