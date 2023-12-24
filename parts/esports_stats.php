<?php
  $slug = $args['slug'] ?? null;
  $statsData = oneGetESportsStats($slug);
  $obj = json_decode($statsData);
?>

<section id="esports">
  <div class="container">
    <h2 class="subtitle">eSports</h2>
    <div class="game-selector">
      <button class="game" slug="lol">LoL</button>
      <button class="game active" slug="csgo">CS:GO</button>
      <button class="game" slug="valorant">Valorant</button>
      <button class="game" slug="dota2">Dota 2</button>
    </div>
    <div id="eSportsContainer">
      <?php get_template_part('elements/esports_stats_table', null, [
        'obj' => $obj
      ]); ?>
    </div>
  </div>
</section>

  
