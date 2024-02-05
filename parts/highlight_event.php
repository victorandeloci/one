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
    <div class="container">
      <h2 class="subtitle">Eventos</h2>
      <a class="event-container" href="<?= get_permalink($post->ID) ?>" style="background-image: url(<?= get_the_post_thumbnail_url($post->ID) ?>);">
        <h2><i class="fas fa-map-marker-alt"></i> <?= $post->post_title ?></h2>
        <hr>
        <p class="description">Acompanhe nossa cobertura!</p>
      </a>
    </div>    
  </section>
<?php endif; ?>
