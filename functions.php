<?php

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('custom-fields');

define('ONE_VERSION', '1.4.4');

define('ONE_GRSD', [
  0 => 'No começo tava ruim, aí depois parece que piorou!',
  2.5 => 'Era melhor ter ido ver o pelé!',
  4.5 => 'Tá ruim, mas tá bom...',
  6 => 'Passou de ano!',
  8 => 'Jogo bonito, jogo formoso!',
  10 => 'Esse só perde para Chrono Trigger...'
]);

function getGRSD($score) {
  $finalDefinition = '';
  foreach (ONE_GRSD as $baseScore => $definition) {
    if ($score >= $baseScore)
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

// ========== EVENTS ==========

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
      'supports' => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields']
    ]
  );
}
add_action( 'init', 'create_posttype' );

function one_add_custom_meta_boxes() {
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

function one_podcast_highlight() {
  $highlighted = (get_post_meta(get_the_ID(), 'one_podcast_highlight_value', true)) ?? '';
  ?>
    <p>Destacar esse evento na página inicial?</p>
    <input type="hidden" name="one_podcast_highlight_value" id="one_podcast_highlight_value" value="<?= $highlighted ?>">
    <input id="one_podcast_highlight_check" type="checkbox" <?= ($highlighted == 'true') ? 'checked' : '' ?>>
    <script type="text/javascript">
      document.getElementById('one_podcast_highlight_check').addEventListener('change', function() {
        let input = document.getElementById('one_podcast_highlight_value');
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
      <img id="one_game_cover_show" src="<?= !empty($url) ? $url : (get_template_directory_uri() . '/img/default-image.png') ?>" alt="">
      <button class="button" type="button" name="one_game_cover_select" id="one_game_cover_select">Selecionar imagem</button>
      <button class="button" type="button" name="one_game_cover_remove" id="one_game_cover_remove">Remover imagem</button>
      <input type="hidden" id="one_game_cover_url" name="one_game_cover_url" value="<?= $url ?>">
    </div>

    <script type="text/javascript">
      var defaultOneUploadImage = '<?= (get_template_directory_uri() . '/img/default-image.png') ?>';
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
    'one_podcast_highlight_value',
    'one_game_cover_url',
    'one_game_info_year',
    'one_game_info_publisher',
    'one_game_info_developer',
    'one_game_info_genre',
    'one_game_info_platforms',
    'one_game_review_score_value'
  ];

  foreach ( $fields as $field ) {
    if ( array_key_exists( $field, $_POST ) ) {
      update_post_meta( $post_id, $field, htmlspecialchars($_POST[$field]) );
    }
  }
}
add_action( 'save_post', 'one_metabox_save' );

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

function add_nav_menus() {
  register_nav_menu('header-menu',__('Header Menu'));
}
add_action('init','add_nav_menus');

function reg_featured_podcast_mp3_thumb_meta() {
  add_meta_box( 'podcast_mp3_thumb', "Podcast Mp3 SRC", 'podcast_mp3_thumb_display_callback', 'post', 'side' );
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
