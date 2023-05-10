    <footer>
      <div class="container">
        <?php
          get_search_form();
          get_template_part('elements/nav');
        ?>
        <p class="credits">ONE - Version: <?= ONE_VERSION ?><br>Development by <a href="https://github.com/victorandeloci" target="_blank" rel="nofollow noreferrer">@victorandeloci</a></p>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
