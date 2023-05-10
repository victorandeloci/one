<div class="tags-container">
  <?php
    $i = 0;
    $tags = get_the_tags(get_the_id());
    if ($tags):
      foreach ($tags as $tag) :
        if ($i <= 3):
        ?>
          <a
            href="<?= get_home_url() ?>/tag/<?= str_replace(' ', '-', $tag->name) ?>"
            tag="<?= str_replace(' ', '-', $tag->name) ?>"
            class="tag"
          >
            #<?= $tag->name ?>
          </a>
        <?php
        endif;
        $i++;
      endforeach;
    endif;
  ?>
</div>