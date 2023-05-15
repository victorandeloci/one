<?php
  $args = [
    'post_type' => 'event',
    'order' => 'DESC',
    'meta_query'  => [
      [
        'key' => 'one_event_highlight_value',
        'value' => 'true'
      ]
    ]
  ];

  $query = new WP_Query($args);
  if ($query->have_posts()):
    $post = $query->posts[0];
?>
  <section class="highlight-event">
    <a class="container" href="<?= get_permalink($post->ID) ?>">
      <h2><i class="fas fa-map-marker-alt"></i> <?= $post->post_title ?></h2>
      <hr>
      <p class="description">Acompanhe a cobertura do evento!</p>
    </a>
  </section>
<?php
  endif;
?>