    <?php get_template_part("parts/player"); ?>

    <footer>
      <div class="container">
        <div class="column">
          <?php the_custom_logo(); ?>
          <ul class="menu">
            <li><a alt="Equipe" class="post" href="/equipe/">Equipe</a></li>
            <li><a id="socialLink" rel="noreferrer noopener" target="_blank" href="mailto:&#099;&#111;&#110;&#116;&#097;&#116;&#111;&#064;&#112;&#108;&#097;&#121;&#101;&#114;&#115;&#101;&#108;&#101;&#099;&#116;&#046;&#099;&#111;&#109;&#046;&#098;&#114;" title="contato@playerselect.com.br">Contate-nos</a></li>
          </ul>
          <?php get_search_form(); ?>
        </div>
        <div class="column">
          <a class="post menu-link" href="/podcasts/"><h3>Podcasts</h3></a>
          <ul class="menu">
            <li class="item"><a slug="playercast" class="category-item menu-link" href="/category/playercast/">PlayerCast</a></li>
            <li class="item"><a slug="bkp" class="category-item menu-link" href="/category/bkp/">BKP</a></li>
            <li class="item"><a slug="psnews" class="category-item menu-link" href="/category/psnews/">PS News</a></li>
          </ul>
        </div>
        <div class="column">
          <a slug="textos" class="category-item menu-link" href="/category/textos/"><h3>Textos</h3></a>
          <ul class="menu">
            <li class="item"><a slug="analises-games" class="category-item menu-link" href="/category/analises-games/">Análises</a></li>
			  <li class="item"><a slug="artigos" class="category-item menu-link" href="/category/artigos/">Artigos</a></li>
			  <li class="item"><a slug="filmes-series" class="category-item menu-link" href="/category/filmes-series/">Filmes e Séries</a></li>
          </ul>
        </div>
        <div class="column">
          <h3>Redes Sociais</h3>
          <div class="social-links">
            <a href="https://twitter.com/playerselectBR" data-link="social" class="twitter" target="_blank" rel="noopener noreferrer" id="socialLink"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/playerselecttv" data-link="social" class="youtube" target="_blank" rel="noopener noreferrer" id="socialLink"><i class="fab fa-youtube"></i></a>
            <a href="https://www.facebook.com/PlayerSelectSite/" data-link="social" class="facebook" target="_blank" rel="noopener noreferrer" id="socialLink"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/playerselect_/" data-link="social" class="instagram" target="_blank" rel="noopener noreferrer" id="socialLink"><i class="fab fa-instagram"></i></i></a>
          </div>
          <h4>Grupo de Ouvintes</h4>
          <div class="social-links">
            <a href="https://t.me/playerselect" data-link="social" class="telegram" target="_blank" rel="noopener noreferrer" id="socialLink"><i class="fab fa-telegram"></i></a>
			  <a href="https://discord.gg/43jtZYX" data-link="social" class="discord" target="_blank" rel="noopener noreferrer" id="socialLink"><i class="fab fa-discord"></i></a>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>

    <div class="back-overlay"></div>

  </body>
</html>
