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
    <meta property="og:image" content=""/>
    <title><?php echo $post->post_title; ?></title>
    <meta property="og:title" content="<?php echo $post->post_title; ?>"/>
    <meta property="og:description" content="<?php echo $post->post_content; ?>" />
    <meta property="og:url" content="<?php echo get_the_permalink($postId); ?>/contato/"/>
  </div>

  <div class="content-back">
    <div class="container">
      <div class="page-block">
        <article class="post-container">
          <h1><?php echo $post->post_title; ?></h1>
          <?php echo $post->post_content; ?>
          <div class="column-content">
            <div class="column">
              <h2>Geral</h2>
              <p>Envie um Email para: <a id="socialLink" rel="noreferrer noopener" target="_blank" href="mailto:&#099;&#111;&#110;&#116;&#097;&#116;&#111;&#064;&#112;&#108;&#097;&#121;&#101;&#114;&#115;&#101;&#108;&#101;&#099;&#116;&#046;&#099;&#111;&#109;&#046;&#098;&#114;">contato@playerselect.com.br</a></p>
            </div>
          </div>
        </article>
      </div>

     </div>
   </div>

<?php
}
 ?>
