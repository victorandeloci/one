<div id="sharer" class="sharer">
  <a title="Compartilhar" id="socialLink" class="facebook" target="_blank" rel="noreferrer noopener" href='

<?php
	echo "https://www.facebook.com/sharer.php?u=" . urlencode(get_permalink($postId));
?>

    '><i class="fab fa-facebook"></i></a>

  <a title="Tweetar" id="socialLink" class="twitter" target="_blank" rel="noreferrer noopener" href='

  <?php
    echo "https://twitter.com/intent/tweet?url=" . urlencode(get_permalink($postId)) . "&text=" . $post->post_title . "&hashtags=";

    $tags = get_tags($post->post_ID);
    $i = 0;
    foreach ($tags as $tag) {
      if($i)
        echo ",";
      echo $tag->name;
      $i++;
    }

   ?>

  '><i class="fab fa-twitter"></i></a>

  <a title="Enviar" id="socialLink" class="whatsapp" target="_blank" rel="noreferrer noopener" href='

  <?php
    echo "whatsapp://send?text=" . urlencode(get_permalink($postId));
   ?>

  ' data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
</div>
