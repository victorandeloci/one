<aside class="primary-sidebar widget-area" id="primary-sidebar">
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
