<?php

  function wpdocs_one_scripts() {
    wp_enqueue_style( 'fonts-awesome', get_template_directory_uri() . "/css/all.min.css" );
    wp_enqueue_style( 'style', get_template_directory_uri() . "/style.min.css" );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(), '3.4.1', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.min.js', array(), '1.0.0', true );
  }
  add_action( 'wp_enqueue_scripts', 'wpdocs_one_scripts' );

  $page = 1;

  function add_widget_Support() {
    register_sidebar( array(
                    'name'          => 'Sidebar',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
  }
  // Hook the widget initiation and run our function
  add_action( 'widgets_init', 'add_Widget_Support' );

  // function wp_custom_menu() {
  //   register_nav_menus(
  //     array(
  //       'nav-menu' => __( 'Nav Menu' )
  //     )
  //   );
  // }
  // add_action( 'init', 'wp_custom_menu' );

  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'custom-logo' );
  add_theme_support("custom-fields");

  function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
  }

  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
      $content = implode(" ",$content).'...';
    } else {
      $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
  }

  /**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
  function disable_emojis_tinymce( $plugins ) {
   if ( is_array( $plugins ) ) {
   return array_diff( $plugins, array( 'wpemoji' ) );
   } else {
   return array();
   }
  }

  /**
   * Remove emoji CDN hostname from DNS prefetching hints.
   *
   * @param array $urls URLs to print for resource hints.
   * @param string $relation_type The relation type the URLs are printed for.
   * @return array Difference betwen the two arrays.
   */
  function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
      /** This filter is documented in wp-includes/formatting.php */
      $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
      $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
  }

  //post especifico
  function loadPost(){


    get_template_part("parts/post_page");

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_loadPost', 'loadPost');
  add_action('wp_ajax_nopriv_loadPost', 'loadPost');

  function category_load_more(){
    if(isset($_GET["category"]))
      $category = $_GET["category"];

    if(isset($_GET["page"]))
      $page = $_GET["page"];

    query_posts(array("post_type" => "post",
                      "category_name" => $category,
                      "posts_per_page" => "6",
                      "paged" => $page
                ));

    $i = 1;
    if (have_posts()) : while (have_posts() && $i <= 6) : the_post();

      get_template_part("parts/default_block");

      $i++;
        endwhile;
      else:
        ?>
          <h2 class="no-more-posts">Sem Mais Posts</h2>
        <?php
      endif;

      wp_reset_query();

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_category_load_more', 'category_load_more');
  add_action('wp_ajax_nopriv_category_load_more', 'category_load_more');

  function podcast_load_more(){
    if(isset($_GET["category"]))
      $category = $_GET["category"];

    if(isset($_GET["page"]))
      $page = $_GET["page"];

    query_posts(array("post_type" => "post",
                      "category_name" => $category,
                      "posts_per_page" => "6",
                      "paged" => $page
                ));

    $i = 1;
    if (have_posts()) : while (have_posts() && $i <= 4) : the_post();

      get_template_part("parts/podcast_block");

      $i++;
        endwhile;
      else:
        ?>
          <h2 class="no-more-posts">Sem Mais Posts</h2>
        <?php
      endif;

      wp_reset_query();

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_podcast_load_more', 'podcast_load_more');
  add_action('wp_ajax_nopriv_podcast_load_more', 'podcast_load_more');

  function search_load_more(){
    if(isset($_GET["s"]))
      $s = $_GET["s"];

    if(isset($_GET["page"]))
      $page = $_GET["page"];

    query_posts(array("post_type" => "post",
                      "s" => $s,
                      "posts_per_page" => "6",
                      "paged" => $page
                ));

    $i = 1;
    if (have_posts()) : while (have_posts() && $i <= 6) : the_post();

     ?>

       <div class="default">
        <a alt="<?php echo the_title(); ?>" class="post" id="<?php the_id(); ?>" href="<?php echo get_permalink(); ?>">
          <div class="post-thumb" style="background-image: url('<?php the_post_thumbnail_url('thumbnail'); ?>');"></div>
          <div class="post-details">
            <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
            <h2><?php the_title(); ?></h2>
			  <p><?php echo excerpt(12); ?></p>
          </div>
        </a>
      </div>
    <?php
      $i++;
        endwhile;
      else:
        ?>
          <h2 class="no-more-posts">Sem Mais Posts</h2>
        <?php
      endif;

      wp_reset_query();

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_search_load_more', 'search_load_more');
  add_action('wp_ajax_nopriv_search_load_more', 'search_load_more');

  function default_load_more(){

    if(isset($_GET["page"]))
      $page = $_GET["page"];

    query_posts('posts_per_page=4&paged=' . $page);

      $i = 1;
      if (have_posts()) : while (have_posts() && $i <= 4) : the_post();

     ?>

       <div class="default">
        <a alt="<?php echo the_title(); ?>" class="post" id="<?php the_id(); ?>" href="<?php echo get_permalink(); ?>">
          <div class="post-thumb" style="background-image: url('<?php the_post_thumbnail_url('thumbnail'); ?>');"></div>
          <div class="post-details">
            <span><?php echo get_the_category(get_the_id())[0]->name; ?></span>
            <h2><?php the_title(); ?></h2>
			  <p><?php echo excerpt(12); ?></p>
          </div>
        </a>
      </div>
    <?php
      $i++;
        endwhile;
      else:
        ?>
          <h2 class="no-more-posts">Sem Mais Posts</h2>
        <?php
      endif;

      wp_reset_query();

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_default_load_more', 'default_load_more');
  add_action('wp_ajax_nopriv_default_load_more', 'default_load_more');

  //método de busca
  function load_search(){

    get_template_part("parts/search_result");

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_load_search', 'load_search');
  add_action('wp_ajax_nopriv_load_search', 'load_search');

  function load_tag(){

    get_template_part("parts/tag_content");

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_load_tag', 'load_tag');
  add_action('wp_ajax_nopriv_load_tag', 'load_tag');

  //conteúdo da home
  function load_home(){
    // modificados do loop
  	query_posts(array(
  		'post_status' => 'publish',
  		'post_type' => 'post'
  	));

    get_template_part("parts/home");

  	// limpa da memória a query
  	wp_reset_query();

  	// finaliza o script
  	wp_die();
  }
  add_action('wp_ajax_load_home', 'load_home');
  add_action('wp_ajax_nopriv_load_home', 'load_home');

  function load_category(){

    if(isset($_GET['slug'])){
      $slug = $_GET['slug'];
      $cat = get_category_by_slug($slug);
      query_posts(array(
    		'post_status' => 'publish',
    		'post_type' => 'post',
        'category_name' => $slug
    	));
    }

    get_template_part("parts/category_content");

    // limpa da memória a query
  	wp_reset_query();

  	// finaliza o script
    wp_die();
  }
  add_action('wp_ajax_load_category', 'load_category');
  add_action('wp_ajax_nopriv_load_category', 'load_category');

  function load_esport(){
    get_template_part("parts/eSportsStats");
  }
  add_action('wp_ajax_load_esport', 'load_esport');
  add_action('wp_ajax_nopriv_load_esport', 'load_esport');

  function reg_featured_video_meta() {
    add_meta_box( 'fvideo', "Video Destacado", 'fvideo_display_callback', 'post' );
  }
  add_action( 'add_meta_boxes', 'reg_featured_video_meta' );

  function fvideo_display_callback( $post ) {
    get_template_part("parts/fvideo");
  }

  function fvideo_save_meta( $post_id ) {
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
      if ( $parent_id = wp_is_post_revision( $post_id ) ) {
          $post_id = $parent_id;
      }
      $fields = [
          'fvideoUrl'
      ];
      foreach ( $fields as $field ) {
          if ( array_key_exists( $field, $_POST ) ) {
              update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
          }
       }
    }
    add_action( 'save_post', 'fvideo_save_meta' );

function reg_featured_podcast_mp3_thumb_meta() {
    add_meta_box( 'podcast_mp3_thumb', "Podcast Mp3 SRC", 'podcast_mp3_thumb_display_callback', 'post' );
  }
  add_action( 'add_meta_boxes', 'reg_featured_podcast_mp3_thumb_meta' );

  function podcast_mp3_thumb_display_callback( $post ) {
    get_template_part("parts/podcast_mp3_thumb");
  }

  function podcast_mp3_thumb_save_meta( $post_id ) {
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
      if ( $parent_id = wp_is_post_revision( $post_id ) ) {
          $post_id = $parent_id;
      }
      $fields = [
          'podcast_mp3_thumb'
      ];
      foreach ( $fields as $field ) {
          if ( array_key_exists( $field, $_POST ) ) {
              update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
          }
       }
    }
    add_action( 'save_post', 'podcast_mp3_thumb_save_meta' );

	function statsRequest($slug, $file){

    /*
    Filtros:
      finished: true
    */
    $url = "https://api.pandascore.co/" . $slug . "/matches?filter[finished]=true&page[size]=3&page[number]=1&token=7a12RbW6MUyqa8315UW_f9LqHxQVAGXxEO5ezayhYuc0MAIuFzI";

    $json = file_get_contents($url);
    file_put_contents($file, $json);

    return $json;
  }

 ?>
