<?php
  $mp3Url = !empty(get_post_meta(get_the_ID(), 'anchor_mp3_url', true))
              ? trim(get_post_meta(get_the_ID(), 'anchor_mp3_url', true))
              : trim(get_post_meta(get_the_ID(), 'episode_mp3_url', true)); // old migration url or feed monitor plugin url
  if (!empty($mp3Url)) :
?>
  <audio controls preload="metadata">
    <source src="<?= $mp3Url ?>">
  </audio>
<?php endif; ?>
