<?php
  // get anchor mp3 url
  $anchorMp3 = trim(get_post_meta(get_the_ID(), 'anchor_mp3_url', true)) ?? null;

	//checa se tem um meta de url de thumb mp3
	if (trim(get_post_meta(get_the_ID(), "podcast_mp3_thumb", true)))
		$podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), "podcast_mp3_thumb", true));
?>

<div class="item" style="background-image: url('<?= !empty($podcast_mp3_thumb) ? $podcast_mp3_thumb : (!empty(get_the_post_thumbnail_url(get_the_ID(), 'medium')) ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/img/default-image.png') ?>');">
  <div class="overlay"></div>
  <div class="details">
    <a href="<?php the_permalink(); ?>" class="post"><h3><?php echo mb_substr(get_the_title(), 0, 40);
      if (strlen(get_the_title()) > 40)
        echo "(...)"; ?></h3></a>
    <?php if (!empty($anchorMp3)) : ?>
      <a target="_blank" rel="nofollow noreferrer" href="<?php echo $anchorMp3; ?>" class="btn play-podcast" data-src="<?php echo "mp3 src"; ?>"><i class="fas fa-play"></i> Reproduzir</a>
    <?php endif; ?>
  </div>
</div>
