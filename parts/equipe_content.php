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
  $post = get_post($postId);
  ?>
  <div id="metaInformation">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url($postId); ?>"/>
    <title><?php echo $post->post_title; ?></title>
    <meta property="og:title" content="<?php echo $post->post_title; ?>"/>
    <meta property="og:description" content="" />
    <meta property="og:url" content="<?php echo get_permalink($postId); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo("name"); ?>"/>
    <meta property="og:type" content="podcast"/>
  </div>

  <section class="equipe">
    <div class="content-back" style="background-image: url('<?php echo get_the_post_thumbnail_url($postId); ?>');">
      <div class="post-title">
        <h1><?php echo $post->post_title; ?></h1>
      </div>

     </div>
     <div class="container">
       <div class="page-block">
         <article class="post-container">
           <?php echo $post->post_content; ?>
         </article>
       </div>
       <div class="separator">
         <h2>Time Atual</h2>
         <hr>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/almir.jpg');"></div>
         <h3>Almir “Branco”</h3>
         <p>"Quando cheguei aqui era tudo mato. Fã de beat' em up"</p>
         <div class="contact">
           <a href="https://twitter.com/almir_branco" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a>
			 <a href="https://www.instagram.com/almirtadeu/" data-link="social" id="socialLink" class="instagram" target="_blank" rel="noopener norefereer"><i class="fab fa-instagram"></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/marlos.jpg');"></div>
         <h3>Marlos Sanuto ‘O Catedrático’</h3>
         <p>Carioca, Bombeiro Militar, Produtor Musical, Editor, DJ e  Diplomata na arte do vacilo. Catedrático nas horas vagas. Forjado no submundo dos fliperamas de buteco.</p>
         <div class="contact">
           <a href="https://www.instagram.com/marlos_catedratico/" data-link="social" id="socialLink" class="instagram" target="_blank" rel="noopener norefereer"><i class="fab fa-instagram"></i></a>
			 <a href="https://twitter.com/Marlos_BM" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/chico.jpg');"></div>
         <h3>Francisco “Master Miller”</h3>
         <p>"A vida, o universo e tudo mais!"</p>
         <div class="contact">
			 <a href="https://twitter.com/Francisco_Miler" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a></i></i></a>
           <a href="https://www.instagram.com/xico_muller/" data-link="social" id="socialLink" class="instagram" target="_blank" rel="noopener norefereer"><i class="fab fa-instagram"></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/andrews.png');"></div>
         <h3>Andrews Reis</h3>
         <p>Gosto: Final Fantasy, Java e batata frita.<br>
			Odeio: Indiferença, o Almir e editar podcast.</p>
         <div class="contact">
           <a href="https://twitter.com/andrewsreis" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a></i></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/victor.jpg');"></div>
         <h3>Victor "CiganoSA" Andeloci</h3>
         <p>o melhor jogador de Resident Evil da minha rua</p>
         <div class="contact">
           <a href="https://www.instagram.com/victor.andeloci/" data-link="social" id="socialLink" class="instagram" target="_blank" rel="noopener norefereer"><i class="fab fa-instagram"></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/mackson.jpg');"></div>
         <h3>Mackson Lima</h3>
         <p>"O embaixador de Steins; Gate e Fire Emblem. Não sou weeaboo, é tudo um personagem."</p>
         <div class="contact">
           <a href="https://twitter.com/macksonnnn" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/sharon.jpg');"></div>
         <h3>Sharon "Lady Hellcat" Fiedler</h3>
         <p>“Pro Gamer, Alpha Tester, 70+ Horas Day One”
Apaixonada por games, filmes e livros, qualquer história tá valendo desde que seja bem contada. Como dizem, o diabo está nos detalhes, e eu amo desvendar todos!</p>
         <div class="contact">
           <a href="https://twitter.com/gaminghellcat" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a>
           <a href="http://youtube.com/ladyhellcatgaming" data-link="social" id="socialLink" class="youtube" target="_blank" rel="noopener norefereer"><i class="fab fa-youtube"></i></a></i></i></a>
         </div>
       </div>
       <div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/luz.jpg');"></div>
         <h3>OwLuz</h3>
         <p>Desde guri já me interessava por games, animes, filmes e TV (acredite, a TV já foi legal). Atualmente Podcaster/Youtuber, jogando sempre que possível e vivendo uma quest de cada vez.
</p>
         <div class="contact">
           <a href="https://twitter.com/owluz" data-link="social" id="socialLink" class="twitter" target="_blank" rel="noopener norefereer"><i class="fab fa-twitter"></i></a>
           
         </div>
       </div>
		<div class="person">
         <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/fernando.jpg');"></div>
         <h3>Fernando Russo</h3>
         <p>Gamer desde sempre. Teve o prazer de jogar quase todas as plataformas desde o Atari2600. Era jovem quando a maior parte da geração Playstation nem tinha nascido. Respeite a barba do tio.</p>
         <div class="contact">
           <a href="https://www.instagram.com/fegarusso/" data-link="social" id="socialLink" class="instagram" target="_blank" rel="noopener norefereer"><i class="fab fa-instagram"></i></a>
           
         </div>
       </div>
      </div>
      <div class="container">
        <div class="separator">
          <h2>Fundadores</h2>
          <hr>
        </div>
        <div class="person">
          <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/danlost.jpg');"></div>
          <h3>Daniel “Danlost”</h3>
          <div class="contact">
            
          </div>
        </div>
        <div class="person">
          <div class="thumb" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/equipe/igor.png');"></div>
          <h3>Igor Ritter</h3>
			<p>
				Publicitário, maçom e eterno advogado de Half-Life. Podcaster em repouso, co-criador do Player Select. Fanático por tecnologia e games, mesmo que hoje em dia só jogando os PubG no celular.
			</p>
          <div class="contact">
            
          </div>
        </div>
      </div>
  </section>

  <?php
}
 ?>
