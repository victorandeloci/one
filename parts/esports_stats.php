<?php
  $eSportsPage = get_page_by_path('esports', OBJECT, 'page');
  $slug = $args['slug'] ?? null;
  $statsData = oneGetESportsStats($slug, $eSportsPage);
  $obj = json_decode($statsData);  
?>

<section id="esports">
  <div class="container">
    <h2 class="subtitle"><?= $eSportsPage->post_title ?></h2>
    <div class="page-content">
      <?= $eSportsPage->post_content ?>
    </div>
    <div class="selector">
      <select class="game-selector" name="eSports Game Selector">
          <option title="Counter Strike: Global Offensive" value="csgo" selected>Counter Strike: Global Offensive</option>
          <option title="League of Legends" value="lol">League of Legends</option>          
          <option title="Valorant" value="valorant">Valorant</option>
          <option title="Dota 2" value="dota2">Dota 2</option>
      </select>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
    </div>
    <div id="eSportsContainer">
      <?php get_template_part('elements/esports_stats_table', null, [
        'obj' => $obj
      ]); ?>
    </div>
  </div>
</section>

  
