<section id="social">
  <div class="container">
    <h2 class="subtitle">Conecte-se</h2>
    <?php get_template_part('elements/social_links'); ?>
  </div>
  <div class="container videos">
    <h2 class="subtitle">Vídeos & Transmissões</h2>
    <?php echo do_shortcode( '[youtube-feed]' ); ?>
  </div>
</section>