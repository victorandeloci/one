<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta property="og:site_name" content="<?php echo get_bloginfo("name"); ?>"/>
    <meta property="og:type" content="website"/>

	<?php
		if(isset($_GET['url'])){
			$url = $_GET['url'];
			if($url)
			  $postId = url_to_postid($url);
			else
			  echo "URL não definida!";
		  }

		  if(!isset($url)){
			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			$postId = url_to_postid($url);

		  }

	  	  if($postId){
			  ?>
			  <title><?php echo get_the_title($postId); ?></title>
			  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url($postId); ?>"/>
			  <meta property="og:title" content="<?php echo get_the_title($postId); ?>"/>
			  <meta property="og:description" content="<?php echo get_the_excerpt($postId); ?>" />
			  <meta property="og:url" content="<?php echo get_permalink($postId); ?>"/>
			  <meta name="keywords" content="<?php
				$tags = get_tags($postId);
				$i = 0;
				foreach ($tags as $tag) {
				  if($i)
					echo ',';
				  echo $tag->name;
				  $i++;
				}
			   ?>">
	  			<?php
		  }
		  else{
			?><title><?php echo get_bloginfo("name"); ?></title>
	  <?php } ?>

    <?php wp_head(); ?>

    <style media="screen">
    @font-face {
      font-family: Agency;
      src: url("<?php echo get_template_directory_uri(); ?>/fonts/agency.ttf");
    }
		
	@font-face {
		font-family: Myriad;
		src: url("<?php echo get_template_directory_uri(); ?>/fonts/MyriadPro-Regular.otf");
    }
    </style>

    <meta content="width=device-width, initial-scale=1" name="viewport" />

  </head>
  <body>
    <nav>
      <div class="container">
        <a class="logo" id="home" alt="<?php echo get_bloginfo(); ?>" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="PS Logo"> </a>
        <div class="mobile-btn" id="headerBtn">
          <i class="fas fa-bars"></i>
        </div>
        <ul class="menu" id="navMenu">
          <li class="menu-item"><a id="home" alt="<?php echo get_bloginfo(); ?>" href="<?php echo get_home_url(); ?>">Home</a></li>
          <li class="menu-item">
            <a alt="Podcasts" class="post menu-link" href="/podcasts/" onclick="return false;">Podcasts</a>
            <ul class="submenu">
              <li class="menu-item"><a alt="PlayerCast" slug="playercast" class="category-item menu-link" href="/category/playercast/">PlayerCast</a></li>
              <li class="menu-item"><a alt="PS News" slug="psnews" class="category-item menu-link" href="/category/psnews/">PS News</a></li>
              <li class="menu-item"><a alt="BKP" slug="bkp" class="category-item menu-link" href="/category/bkp/">BKP</a></li>
            </ul>
          </li>
          <li class="menu-item">
			  <a alt="Textos" slug="textos" class="category-item menu-link" href="/category/textos/">Textos</a>
			  <ul class="submenu">
				  <li class="menu-item"><a slug="analises-games" class="category-item menu-link" href="/category/analises-games/">Análises</a></li>
			  <li class="menu-item"><a slug="artigos" class="category-item menu-link" href="/category/artigos/">Artigos</a></li>
			  <li class="menu-item"><a slug="filmes-series" class="category-item menu-link" href="/category/filmes-series/">Filmes e Séries</a></li>
			  </ul>
			</li>
          <li class="menu-item"><a alt="Vídeos" slug="videos" class="category-item menu-link" href="/category/videos/">Vídeos</a></li>
			<li class="menu-item"><a alt="Equipe" class="menu-link post" href="/equipe/">Equipe</a></li>
        </ul>
      </div>
    </nav>
