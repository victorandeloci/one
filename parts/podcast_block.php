<?php
  if ( $episode_content = get_the_powerpress_content() ) {
    ?>
      <div class="power-press-player"><?php echo $episode_content; ?></div>
    <?php
  }

  $EpisodeData = powerpress_get_enclosure_data(get_the_ID(), 'podcast');
  $MediaURL = powerpress_add_flag_to_redirect_url($EpisodeData['url'], 'p');
 ?>

<?php
	//checa se tem um meta de url de thumb mp3
	if (trim(get_post_meta(get_the_ID(), "podcast_mp3_thumb", true)))
		$podcast_mp3_thumb = trim(get_post_meta(get_the_ID(), "podcast_mp3_thumb", true));
?>

<div class="item" style="background-image: url('<?php if($podcast_mp3_thumb) echo $podcast_mp3_thumb; else echo the_post_thumbnail_url('medium');  ?>');">
  <div class="overlay"></div>
  <div class="details">
    <a href="<?php the_permalink(); ?>" class="post"><h3><?php echo mb_substr(get_the_title(), 0, 40);
    if (strlen(get_the_title()) > 40)
      echo "(...)"; ?></h3></a>
    <a id="podPlay" target="_blank" rel="nofollow noreferrer" href="<?php echo $MediaURL; ?>" class="btn play-podcast" data-src="<?php echo "mp3 src"; ?>"><i class="fas fa-play"></i> Reproduzir</a>
  </div>
</div>
