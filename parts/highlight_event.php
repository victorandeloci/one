<?php
  $args = [
    'post_type' => 'event',
    'order' => 'DESC',
    'meta_query'  => [
      [
        'key' => 'one_podcast_highlight_value',
        'value' => 'true'
      ]
    ]
  ];

  $query = new WP_Query($args);
  if ($query->have_posts()):
    $post = $query->posts[0];
?>
  <section class="highlight-event">
    <div class="container">
      <a href="<?= get_permalink($post->ID) ?>">
        <h2><i class="fas fa-map-marker-alt"></i> <?= $post->post_title ?></h2>
      </a>
      <hr>
      <a href="<?= get_permalink($post->ID) ?>">
        <p class="description">Acompanhe a cobertura do evento!</p>
      </a>
    </div>
  </section>
<?php
  endif;
?>
