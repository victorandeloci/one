<div class="tags-container">
  <?php
    $i = 0;
    $tags = get_the_tags((!empty($args['post_id']) ? $args['post_id'] : get_the_ID()));
    if ($tags) :

      usort( $tags, function( $a, $b ) {
        return $b->count - $a->count;
      });

      foreach ($tags as $tag) :
        if (!in_array($tag->name, EXCLUDED_TAGS) && ($i <= 2 || (is_single() && $i <= 6))) :
  ?>
          <a
            href="<?= get_home_url() ?>/tag/<?= str_replace(' ', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $tag->name)) ?>"
            tag="<?= str_replace(' ', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $tag->name)) ?>"
            class="tag"
          >
            #<?= $tag->name ?>
          </a>
  <?php
          $i++;
        endif;        
      endforeach;
    endif;
  ?>
</div>