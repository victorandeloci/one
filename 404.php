<?php get_header(); ?>

<main id="mainContainer">

  <div class="content-back">
    <div class="container">
      <section class="sec404">
        <h1>404</h1>
        <p>Não encontramos o que você procura aqui. Talvez o link esteja errado ou essa página deixou de existir : /</p>

        <?php query_posts(array("post_type" => "post")); ?>

        <?php get_template_part("parts/default"); ?>

        <?php wp_reset_query(); ?>

      </section>
    </div>
  </div>

</main>

<?php get_footer(); ?>
