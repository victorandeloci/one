<div class="tags-container">
  <?php
    $i = 0;
    $tags = get_the_tags(get_the_id());
    if ($tags) :
      foreach ($tags as $tag) :
        if ($i <= 3 || is_single()) :
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