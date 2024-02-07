<?php

define('ONE_VERSION', '2.8.1');

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('custom-fields');

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

define('ONE_GRSD', [
  0 => 'No começo tava ruim, aí depois parece que piorou!',
  2.5 => 'Era melhor ter ido ver o pelé!',
  4.5 => 'Tá ruim, mas tá bom...',
  6 => 'Passou de ano!',
  8 => 'Jogo bonito, jogo formoso!',
  9.5 => 'Esse só perde para Chrono Trigger...'
]);

function getGRSD($score) {
  $finalDefinition = '';
  foreach (ONE_GRSD as $baseScore => $definition) {
    if (doubleval($score) >= $baseScore)
      $finalDefinition = $definition;
  }

  return $finalDefinition;
}

function add_widget_Support() {
  register_sidebar([
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ]);
}
add_action( 'widgets_init', 'add_Widget_Support' );  

function create_posttype() {
  register_post_type( 'event',
    [
      'labels' => [
        'name' => __( 'Eventos' ),
        'singular_name' => __( 'Eventos' )
      ],
      'public' => true,
      'has_archive' => true,
      'rewrite' => ['slug' => 'event'],
      'show_in_rest' => true,
      'supports' => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'],
      'menu_icon' => 'dashicons-location'
    ]
  );

  register_post_type( 'team',
    [
      'labels' => [
        'name' => __( 'Equipe' ),
        'singular_name' => __( 'Equipe' )
      ],
      'public' => true,
      'publicly_queryable'  => false,
      'has_archive' => true,
      'rewrite' => ['slug' => 'team'],
      'show_in_rest' => true,
      'supports' => [ 'title', 'excerpt', 'thumbnail', 'custom-fields'],
      'menu_icon' => 'dashicons-admin-users'
    ]
  );

  register_post_type( 'fixed_highlight',
    [
      'labels' => [
        'name' => __( 'Destaques fixos' ),
        'singular_name' => __( 'Destaques fixos' )
      ],
      'public' => true,
      'publicly_queryable'  => false,
      'has_archive' => true,
      'rewrite' => ['slug' => 'fixed_highlight'],
      'show_in_rest' => true,
      'supports' => [ 'title', 'excerpt', 'thumbnail', 'custom-fields']
    ]
  );
}
add_action( 'init', 'create_posttype' );

// ========== Event & Infos Metas ==========

function one_instagram() {
  $data_1 = (get_post_meta(get_the_ID(), 'one_instagram_data_1', true)) ?? '';
  $data_2 = (get_post_meta(get_the_ID(), 'one_instagram_data_2', true)) ?? '';

  ?>
    <input type="text" class="components-text-control__input" name="one_instagram_data_1" id="one_instagram_data_1" value="<?= $data_1 ?>" style="margin-bottom: 1rem;">
    <input type="text" class="components-text-control__input" name="one_instagram_data_2" id="one_instagram_data_2" value="<?= $data_2 ?>" style="margin-bottom: 1rem;">
  <?php
}

function one_custom_thumbnail() {
  $url = (get_post_meta(get_the_ID(), 'one_custom_thumbnail_url', true)) ?? '';

  ?>
    <div class="metabox-content">
      <img id="one_custom_thumbnail_show" src="<?= !empty($url) ? $url : (get_template_directory_uri() . '/img/default-image.png') ?>" alt="">
      <button class="button" type="button" name="one_custom_thumbnail_select" id="one_custom_thumbnail_select">Selecionar imagem</button>
      <button class="button" type="button" name="one_custom_thumbnail_remove" id="one_custom_thumbnail_remove">Remover imagem</button>
      <input type="hidden" id="one_custom_thumbnail_url" name="one_custom_thumbnail_url" value="<?= $url ?>">
    </div>

    <script type="text/javascript">
      var defaultOneUploadImage = '<?= (get_template_directory_uri() . '/img/default-image.png') ?>';
      if (document.querySelector('#one_custom_thumbnail')) {
        jQuery(document).ready(function($){
          // Instantiates the variable that holds the media library frame.
          var meta_image_frame;

          // Runs when the image button is clicked.
          $('#one_custom_thumbnail_select').click(function(e){

            // Prevents the default action from occuring.
            e.preventDefault();

            // If the frame already exists, re-open it.
            if ( meta_image_frame ) {
              meta_image_frame.open();
              return;
            }

            // Sets up the media library frame
            meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
              library: { type: 'image' }
            });

            // Runs when an image is selected.
            meta_image_frame.on('select', function(){

              // Grabs the attachment selection and creates a JSON representation of the model.
              var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

              // Sends the attachment URL to our custom image input field.
              document.querySelector('#one_custom_thumbnail_url').value = media_attachment.url;
              document.querySelector('#one_custom_thumbnail_show').setAttribute('src', media_attachment.url);
            });

            // Opens the media library frame.
            meta_image_frame.open();
          });
        });

        document.getElementById('one_custom_thumbnail_remove').addEventListener('click', function(){
          document.querySelector('#one_custom_thumbnail_url').value = '';
          document.querySelector('#one_custom_thumbnail_show').setAttribute('src', defaultOneUploadImage);
        });
      }
    </script>
  <?php
}

function one_podcast_tag() {
  $tag = (get_post_meta(get_the_ID(), 'one_podcast_tag_value', true)) ?? '';

  ?>
    <input type="text" name="one_podcast_tag_value" value="<?= $tag ?>" id="one_podcast_tag_value" class="components-text-control__input">
  <?php
}

function one_event_term() {
  $term = (get_post_meta(get_the_ID(), 'one_event_term_value', true)) ?? '';

  ?>
    <input type="text" name="one_event_term_value" value="<?= $term ?>" id="one_event_term_value" class="components-text-control__input">
  <?php
}

function one_podcast_highlight() {
  $highlighted = (get_post_meta(get_the_ID(), 'one_event_highlight_value', true)) ?? '';
  ?>
    <p>Destacar esse evento na página inicial?</p>
    <input type="hidden" name="one_event_highlight_value" id="one_event_highlight_value" value="<?= $highlighted ?>">
    <input id="one_podcast_highlight_check" type="checkbox" <?= ($highlighted == 'true') ? 'checked' : '' ?>>
    <script type="text/javascript">
      document.getElementById('one_podcast_highlight_check').addEventListener('change', function() {
        let input = document.getElementById('one_event_highlight_value');
        if (this.checked) {
          input.value = 'true';
        } else {
          input.value = 'false';
        }
      });
    </script>
  <?php
}

function one_game_cover() {
  $url = (get_post_meta(get_the_ID(), 'one_game_cover_url', true)) ?? '';
  ?>
    <div class="metabox-content">
      <img id="one_game_cover_show" src="<?= !empty($url) ? $url : (get_template_directory_uri() . '/assets/img/default-image.png') ?>" alt="">
      <button class="button" type="button" name="one_game_cover_select" id="one_game_cover_select">Selecionar imagem</button>
      <button class="button" type="button" name="one_game_cover_remove" id="one_game_cover_remove">Remover imagem</button>
      <input type="hidden" id="one_game_cover_url" name="one_game_cover_url" value="<?= $url ?>">
    </div>

    <script type="text/javascript">
      var defaultOneUploadImage = '<?= (get_template_directory_uri() . '/assets/img/default-image.png') ?>';
      if (document.querySelector('#one_game_cover')) {
        jQuery(document).ready(function($){
          // Instantiates the variable that holds the media library frame.
          var meta_image_frame;

          // Runs when the image button is clicked.
          $('#one_game_cover_select').click(function(e){

            // Prevents the default action from occuring.
            e.preventDefault();

            // If the frame already exists, re-open it.
            if ( meta_image_frame ) {
              meta_image_frame.open();
              return;
            }

            // Sets up the media library frame
            meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
              library: { type: 'image' }
            });

            // Runs when an image is selected.
            meta_image_frame.on('select', function(){

              // Grabs the attachment selection and creates a JSON representation of the model.
              var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

              // Sends the attachment URL to our custom image input field.
              document.querySelector('#one_game_cover_url').value = media_attachment.url;
              document.querySelector('#one_game_cover_show').setAttribute('src', media_attachment.url);
            });

            // Opens the media library frame.
            meta_image_frame.open();
          });
        });

        document.getElementById('one_game_cover_remove').addEventListener('click', function(){
          document.querySelector('#one_game_cover_url').value = '';
          document.querySelector('#one_game_cover_show').setAttribute('src', defaultOneUploadImage);
        });
      }
    </script>
  <?php
}

function one_game_infos() {
  $year = (get_post_meta(get_the_ID(), 'one_game_info_year', true)) ?? '';
  $publisher = (get_post_meta(get_the_ID(), 'one_game_info_publisher', true)) ?? '';
  $developer = (get_post_meta(get_the_ID(), 'one_game_info_developer', true)) ?? '';
  $genre = (get_post_meta(get_the_ID(), 'one_game_info_genre', true)) ?? '';
  $platforms = (get_post_meta(get_the_ID(), 'one_game_info_platforms', true)) ?? '';

  ?>
    <input type="text" name="one_game_info_year" value="<?= $year ?>" id="one_game_info_year" class="components-text-control__input" placeholder="Ano de lançamento">
    <input type="text" name="one_game_info_publisher" value="<?= $publisher ?>" id="one_game_info_publisher" class="components-text-control__input" placeholder="Distribuidora">
    <input type="text" name="one_game_info_developer" value="<?= $developer ?>" id="one_game_info_developer" class="components-text-control__input" placeholder="Desenvolvedora">
    <input type="text" name="one_game_info_genre" value="<?= $genre ?>" id="one_game_info_genre" class="components-text-control__input" placeholder="Gêneros">
    <input type="text" name="one_game_info_platforms" value="<?= $platforms ?>" id="one_game_info_platforms" class="components-text-control__input" placeholder="Plataformas">
  <?php
}

function one_game_review_score() {
  $score = (get_post_meta(get_the_ID(), 'one_game_review_score_value', true)) ?? '';

  ?>
    <input type="text" name="one_game_review_score_value" value="<?= $score ?>" id="one_game_review_score_value" class="components-text-control__input">
  <?php
}

function one_podcast_cover() {
  $url = (get_post_meta(get_the_ID(), 'one_podcast_cover_url', true)) ?? '';
    if (empty($url))
      $url = (get_post_meta(get_the_ID(), 'podcast_mp3_thumb', true)) ?? ''; // old url
  ?>
    <div class="metabox-content">
      <img id="one_podcast_cover_show" src="<?= !empty($url) ? $url : (get_template_directory_uri() . '/assets/img/default-image.png') ?>" alt="">
      <button class="button" type="button" name="one_podcast_cover_select" id="one_podcast_cover_select">Selecionar imagem</button>
      <button class="button" type="button" name="one_podcast_cover_remove" id="one_podcast_cover_remove">Remover imagem</button>
      <input type="hidden" id="one_podcast_cover_url" name="one_podcast_cover_url" value="<?= $url ?>">
    </div>

    <script type="text/javascript">
      var defaultOneUploadImage = '<?= (get_template_directory_uri() . '/assets/img/default-image.png') ?>';
      if (document.querySelector('#one_podcast_cover')) {
        jQuery(document).ready(function($){
          // Instantiates the variable that holds the media library frame.
          var meta_image_frame;

          // Runs when the image button is clicked.
          $('#one_podcast_cover_select').click(function(e){

            // Prevents the default action from occuring.
            e.preventDefault();

            // If the frame already exists, re-open it.
            if ( meta_image_frame ) {
              meta_image_frame.open();
              return;
            }

            // Sets up the media library frame
            meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
              library: { type: 'image' }
            });

            // Runs when an image is selected.
            meta_image_frame.on('select', function(){

              // Grabs the attachment selection and creates a JSON representation of the model.
              var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

              // Sends the attachment URL to our custom image input field.
              if (media_attachment.sizes != null && media_attachment.sizes.large != null && media_attachment.sizes.large.url) {
                document.querySelector('#one_podcast_cover_url').value = media_attachment.sizes.large.url;
                document.querySelector('#one_podcast_cover_show').setAttribute('src', media_attachment.sizes.large.url);
              } else {
                document.querySelector('#one_podcast_cover_url').value = media_attachment.url;
                document.querySelector('#one_podcast_cover_show').setAttribute('src', media_attachment.url);
              }
              
            });

            // Opens the media library frame.
            meta_image_frame.open();
          });
        });

        document.getElementById('one_podcast_cover_remove').addEventListener('click', function(){
          document.querySelector('#one_podcast_cover_url').value = '';
          document.querySelector('#one_podcast_cover_show').setAttribute('src', defaultOneUploadImage);
        });
      }
    </script>
  <?php
}

function one_highlight_thumb() {
  $url = (get_post_meta(get_the_ID(), 'one_highlight_thumb_url', true)) ?? '';
  ?>
    <div class="metabox-content">
      <img id="one_highlight_thumb_show" src="<?= !empty($url) ? $url : (get_template_directory_uri() . '/assets/img/default-image.png') ?>" alt="">
      <button class="button" type="button" name="one_highlight_thumb_select" id="one_highlight_thumb_select">Selecionar imagem</button>
      <button class="button" type="button" name="one_highlight_thumb_remove" id="one_highlight_thumb_remove">Remover imagem</button>
      <input type="hidden" id="one_highlight_thumb_url" name="one_highlight_thumb_url" value="<?= $url ?>">
    </div>

    <script type="text/javascript">
      var defaultOneUploadImage = '<?= (get_template_directory_uri() . '/assets/img/default-image.png') ?>';
      if (document.querySelector('#one_highlight_thumb')) {
        jQuery(document).ready(function($){
          // Instantiates the variable that holds the media library frame.
          var meta_image_frame;

          // Runs when the image button is clicked.
          $('#one_highlight_thumb_select').click(function(e){

            // Prevents the default action from occuring.
            e.preventDefault();

            // If the frame already exists, re-open it.
            if ( meta_image_frame ) {
              meta_image_frame.open();
              return;
            }

            // Sets up the media library frame
            meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
              library: { type: 'image' }
            });

            // Runs when an image is selected.
            meta_image_frame.on('select', function(){

              // Grabs the attachment selection and creates a JSON representation of the model.
              var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

              // Sends the attachment URL to our custom image input field.
              if (media_attachment.sizes != null && media_attachment.sizes.large != null && media_attachment.sizes.large.url != null) {
                document.querySelector('#one_highlight_thumb_url').value = media_attachment.sizes.large.url;
                document.querySelector('#one_highlight_thumb_show').setAttribute('src', media_attachment.sizes.large.url);
              } else {
                document.querySelector('#one_highlight_thumb_url').value = media_attachment.url;
                document.querySelector('#one_highlight_thumb_show').setAttribute('src', media_attachment.url);
              }
            });

            // Opens the media library frame.
            meta_image_frame.open();
          });
        });

        document.getElementById('one_highlight_thumb_remove').addEventListener('click', function(){
          document.querySelector('#one_highlight_thumb_url').value = '';
          document.querySelector('#one_highlight_thumb_show').setAttribute('src', defaultOneUploadImage);
        });
      }
    </script>
  <?php
}

function one_add_custom_meta_boxes() {
  add_meta_box(
    'one_podcast_cover',
    'Capa do Episódio',
    'one_podcast_cover',
    'post',
    'side',
    'high'
  );

  add_meta_box(
    'one_highlight_thumb',
    'Imagem para "Destaques"',
    'one_highlight_thumb',
    'post',
    'side',
    'high'
  );
  
  add_meta_box(
    'one_custom_thumbnail',
    'Logo do Evento',
    'one_custom_thumbnail',
    'event',
    'side',
    'high'
  );

  add_meta_box(
    'one_instagram',
    'Posts do Instagram',
    'one_instagram',
    'event',
    'side',
    'high'
  );

  add_meta_box(
    'one_podcast_tag',
    'Monitorar Podcasts',
    'one_podcast_tag',
    'event',
    'side',
    'high'
  );

  add_meta_box(
    'one_event_term',
    'Termo para linkar posts',
    'one_event_term',
    'event',
    'side',
    'high'
  );

  add_meta_box(
    'one_podcast_highlight',
    'Destacar na home',
    'one_podcast_highlight',
    'event',
    'side',
    'high'
  );

  add_meta_box(
    'one_game_review_score',
    'Nota da review',
    'one_game_review_score',
    'post',
    'side',
    'high'
  );

  add_meta_box(
    'one_game_infos',
    'Ficha técnica',
    'one_game_infos',
    'post',
    'side',
    'high'
  );

  add_meta_box(
    'one_game_cover',
    'Capa do jogo',
    'one_game_cover',
    'post',
    'side',
    'high'
  );
}
add_action('add_meta_boxes', 'one_add_custom_meta_boxes');

function one_metabox_save( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if ( $parent_id = wp_is_post_revision( $post_id ) ) {
    $post_id = $parent_id;
  }

  $fields = [
    'one_custom_thumbnail_url',
    'one_instagram_data_1',
    'one_instagram_data_2',
    'one_podcast_tag_value',
    'one_event_term_value',
    'one_event_highlight_value',
    'one_game_cover_url',
    'one_game_info_year',
    'one_game_info_publisher',
    'one_game_info_developer',
    'one_game_info_genre',
    'one_game_info_platforms',
    'one_game_review_score_value',
    'one_podcast_cover_url',
    'podcast_mp3_thumb',
    'one_highlight_thumb_url'
  ];

  foreach ( $fields as $field ) {
    if ( array_key_exists( $field, $_POST ) ) {
      update_post_meta( $post_id, $field, htmlspecialchars($_POST[$field]) );
    }
  }
}
add_action( 'save_post', 'one_metabox_save' );

function add_nav_menus() {
  register_nav_menu('header-menu',__('Header Menu'));
}
add_action('init','add_nav_menus');

function get_first_image( $post_id ) {
  $attach = get_children( [
    'post_parent'    => $post_id,
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'order'          => 'DESC',
    'numberposts'    => 1
  ] );
  if ( is_array( $attach ) && is_object( current( $attach ) ) ) {
    return current( $attach )->guid;
  }
}

function excerpt($limit, $postId = null) {
  if($postId)
    $excerpt = explode(' ', get_the_excerpt($postId), $limit);
  else
    $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' [...]';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

register_rest_field( 'post', 'metadata', [
  'get_callback' => function ( $data ) {
    return get_post_meta( $data['id'], '', '' );
  }
]);

function post_featured_image_json( $data, $post, $context ) {
  $featured_image_id = $data->data['featured_media'];
  $featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'large' );

  if( $featured_image_url ) {
    $data->data['featured_image_url'] = $featured_image_url[0];
  }

  return $data;
}
add_filter( 'rest_prepare_post', 'post_featured_image_json', 10, 3 );

function rest_filter_by_custom_taxonomy( $args, $request ) {

  if ( isset($request['category_slug']) ) {
    $category_slug = sanitize_text_field($request['category_slug']);
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $category_slug,
      ]
    ];
  }
  
  return $args;
  
}
add_filter('rest_post_query', 'rest_filter_by_custom_taxonomy', 10, 3);

function oneGetYoutubeIdFromUrl($url) {
  $parts = parse_url($url);
  if (isset($parts['query'])) {
      parse_str($parts['query'], $qs);
      if (isset($qs['v'])) {
          return $qs['v'];
      } else if(isset($qs['vi'])) {
          return $qs['vi'];
      }
  }
  if (isset($parts['path'])) {
      $path = explode('/', trim($parts['path'], '/'));
      return $path[count($path)-1];
  }
  return false;
}

if ( !function_exists('one_esports_stats_page') ) {
  function one_esports_stats_page() {
    // user permissions
    if (!current_user_can('manage_options')) {
      return;
    }

    wp_add_inline_script(
      'map-scripts',
      'const ajax_info = ' . json_encode(array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('one_esports_stats_nonce_handler')
       )),
      'before'
    );

    wp_enqueue_script(
      'one_esports_stats_admin_js',
      get_template_directory_uri() . '/admin/js/admin.js',
      [],
      '1.0.0',
      true
    );

    $options = [
      'panda_token' => get_option('one_esports_stats_panda_token', '')
    ];

    // settings 
    include_once('admin/templates/esports_stats_settings.php');
  }
}

function one_esports_stats_save() {
  try {
    update_option('one_esports_stats_panda_token', sanitize_text_field($_POST['one_esports_stats_panda_token']));

    echo 'Saved!';
  } catch (\Throwable $th) {
    echo 'Error during save... ' . $th;
  }

  die();
}
add_action('wp_ajax_one_esports_stats_save', 'one_esports_stats_save');
add_action('wp_ajax_nopriv_one_esports_stats_save', 'one_esports_stats_save');

if ( !function_exists('one_esports_stats_menu') ) {
  function one_esports_stats_menu() {    
    add_menu_page(
      'One eSports Stats',
      'eSports Stats',
      'manage_options',
      'one_esports_stats',
      'one_esports_stats_page',
      'dashicons-games',
      28
    );
  }
}
add_action( 'admin_menu', 'one_esports_stats_menu' );

function oneGetEsportsApiData($slug, $pageId = null) {
  $token = get_option('one_esports_stats_panda_token', '');
  if (!empty($token)) {
    $url = "https://api.pandascore.co/" . $slug . "/matches?filter[finished]=true&page[size]=3&page[number]=1&token=" . $token;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
  
    $data = curl_exec($ch);
    curl_close($ch);

    // save data on page meta
    if (!empty($pageId)) {
      if (!empty($slug)) {
        update_post_meta($pageId, 'one_esports_stats_' . $slug, $data);
      }      
    }
  
    return $data;
  }
}

function oneGetESportsStats($slug = 'csgo', $eSportsPage = null) {  
  $statsData = '';

  if (empty($eSportsPage))
    $eSportsPage = get_page_by_path('esports', OBJECT, 'page');

  if (!empty($eSportsPage)) {
    // verify stored data
    $lastModified = strtotime(get_the_modified_date('Y-m-d H:i:s'), $eSportsPage->ID);

    // updated data? (3h)
    if (($lastModified + 10800) < time()) {
      // not updated
      $statsData = oneGetEsportsApiData($slug, $eSportsPage->ID);
    } else {
      // updated
      $statsData = get_post_meta($eSportsPage->ID, 'one_esports_stats_' . $slug, true);
    }
  } else if (empty($eSportsPage) || empty($statsData)) {
    $statsData = oneGetEsportsApiData($slug);
  }

  return $statsData;
}

function one_str_lreplace($search, $replace, $subject) {
  $pos = strrpos($subject, $search);

  if ($pos !== false) {
      $subject = substr_replace($subject, $replace, $pos, strlen($search));
  }

  return $subject;
}

function one_esports_load() {
  $slug = sanitize_text_field($_GET['slug']);

  $statsData = oneGetESportsStats($slug);
  $obj = json_decode($statsData);

  get_template_part('elements/esports_stats_table', null, [
    'obj' => $obj
  ]);

  die();
}
add_action('wp_ajax_one_esports_load', 'one_esports_load');
add_action('wp_ajax_nopriv_one_esports_load', 'one_esports_load');

if ( !function_exists('one_news_page') ) {
  function one_news_page() {
    // user permissions
    if (!current_user_can('manage_options')) {
      return;
    }

    wp_add_inline_script(
      'map-scripts',
      'const ajax_info = ' . json_encode(array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('one_news_nonce_handler')
       )),
      'before'
    );

    wp_enqueue_script(
      'one_news_admin_js',
      get_template_directory_uri() . '/admin/js/admin.js',
      [],
      '1.0.0',
      true
    );

    $options = [
      'feed_url' => get_option('one_news_feed_url', '')
    ];

    // settings 
    include_once('admin/templates/news_settings.php');
  }
}

function one_news_save() {
  try {
    update_option('one_news_feed_url', sanitize_text_field($_POST['one_news_feed_url']));

    echo 'Saved!';
  } catch (\Throwable $th) {
    echo 'Error during save... ' . $th;
  }

  die();
}
add_action('wp_ajax_one_news_save', 'one_news_save');
add_action('wp_ajax_nopriv_one_news_save', 'one_news_save');

if ( !function_exists('one_news_menu') ) {
  function one_news_menu() {    
    add_menu_page(
      'One RSS News',
      'RSS News',
      'manage_options',
      'one_news',
      'one_news_page',
      'dashicons-media-document',
      28
    );
  }
}
add_action( 'admin_menu', 'one_news_menu' );

function one_news_load() {
  $feedUrl = get_option('one_news_feed_url', '');
  if (!empty($feedUrl)) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $feedUrl);
  
    $data = curl_exec($ch);
    curl_close($ch);

    $rss = simplexml_load_string($data);    
    if ($rss && !empty($rss)) {
      // limited to 3 itens
      for ($i = 0; $i < 4; $i++) { 
        get_template_part('elements/rss_news_item', null, [
          'item' => $rss->channel->item[$i]
        ]);
      }
    }
  }

  die();
}
add_action('wp_ajax_one_news_load', 'one_news_load');
add_action('wp_ajax_nopriv_one_news_load', 'one_news_load');

function one_featured_content() {
  $livePage = get_page_by_path('live', OBJECT, 'page');
  if (!empty($livePage)) {
    $ytApiKey = get_post_meta($livePage->ID, 'youtube_api_key', true);
    $ytChannelId = get_post_meta($livePage->ID, 'youtube_channel_id', true);

    if (!empty($ytApiKey) && !empty($ytChannelId)) {
      $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=' . $ytChannelId . '&type=video&eventType=live&key=' . $ytApiKey;

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $url);
    
      $data = curl_exec($ch);
      curl_close($ch);

      if (!empty($data)) {
        $liveData = json_decode($data);
        if (count($liveData->items) > 0) {
          $liveVideoId = $liveData->items[0]->id->videoId;
          if (!empty($liveVideoId)) {
            get_template_part('parts/live_video', null, [
              'live_video_id' => $liveVideoId,
              'title' => $liveData->items[0]->snippet->title,
              'description' => get_the_excerpt($livePage->ID)
            ]);
            die();
          }
        }
      }
    }
  }

  get_template_part('parts/highlight_event');
  die();
}
add_action('wp_ajax_one_featured_content', 'one_featured_content');
add_action('wp_ajax_nopriv_one_featured_content', 'one_featured_content');