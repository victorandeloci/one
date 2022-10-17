<aside class="primary-sidebar widget-area" id="primary-sidebar">
  <?php if (in_category('analises-games', get_the_ID()) && !empty(get_post_meta(get_the_ID(), 'one_game_cover_url', true))): ?>
    <div class="info-board">
      <h2><?= get_the_title() ?></h2>
      <img class="game-cover" src="<?= get_post_meta(get_the_ID(), 'one_game_cover_url', true) ?>" alt="Cover">
      <div class="info-content">
        <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_year', true))): ?>
          <span>Ano</span>
          <p><?= get_post_meta(get_the_ID(), 'one_game_info_year', true) ?></p>
          <hr>
        <?php endif; ?>
        <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_publisher', true))): ?>
          <span>Publisher</span>
          <p><?= get_post_meta(get_the_ID(), 'one_game_info_publisher', true) ?></p>
          <hr>
        <?php endif; ?>
        <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_developer', true))): ?>
          <span>Developer</span>
          <p><?= get_post_meta(get_the_ID(), 'one_game_info_developer', true) ?></p>
          <hr>
        <?php endif; ?>
        <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_genre', true))): ?>
          <span>Gênero</span>
          <p><?= get_post_meta(get_the_ID(), 'one_game_info_genre', true) ?></p>
          <hr>
        <?php endif; ?>
        <?php if (!empty(get_post_meta(get_the_ID(), 'one_game_info_platforms', true))): ?>
          <span>Plataformas</span>
          <p><?= get_post_meta(get_the_ID(), 'one_game_info_platforms', true) ?></p>
          <hr>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="esports">
    <h2><i class="fas fa-gamepad"></i> eSports</h2>
    <hr>
	  <div class="game-selector">
	    <div class="btn game active" slug="lol">LoL</div>
		  <div class="btn game" slug="csgo">CS:GO</div>
		  <div class="btn game" slug="dota2">Dota 2</div>
		  <div class="btn game" slug="ow">Ow</div>
		  <div class="btn game" slug="pubg">PUBG</div>
	  </div>
    <div id="eSportsContainer">
  		<?php get_template_part("parts/eSportsStats"); ?>
  	</div>
  </div>

  <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar' ); ?>
  <?php endif; ?>
</aside>
