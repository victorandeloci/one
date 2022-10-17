<div class="tags-container">
  <?php
    $i = 0;
    $tags = get_the_tags(get_the_id());
    if ($tags):
      foreach ($tags as $tag):
        if ($i <= 4):
        ?>
          <a
            href="<?php echo get_home_url(); ?>/tag/<?php echo str_replace(' ', '-', $tag->name); ?>"
            tag="<?php echo str_replace(' ', '-', $tag->name); ?>"
            id="tagLink"
            class="tag"
          >
              <span># </span><?php echo $tag->name; ?>
          </a>
        <?php
        endif;
        $i++;
      endforeach;
    endif;
  ?>
</div>
