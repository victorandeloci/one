<?php
  $mp3Url = !empty(get_post_meta((!empty($args['post_id']) ? $args['post_id'] : get_the_ID()), 'anchor_mp3_url', true))
              ? trim(get_post_meta((!empty($args['post_id']) ? $args['post_id'] : get_the_ID()), 'anchor_mp3_url', true))
              : trim(get_post_meta((!empty($args['post_id']) ? $args['post_id'] : get_the_ID()), 'episode_mp3_url', true)); // old migration url or feed monitor plugin url
  if (!empty($mp3Url)) :
?>
  <audio id="player" controls preload="none" <?= (!empty($args['hide_controls']) && $args['hide_controls']) ? 'hide-controls="true"' : '' ?>>
    <source src="<?= $mp3Url ?>">
  </audio>
<?php endif; ?>
