<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

function add_nav_menus() {
	register_nav_menu('header-menu',__('Header Menu'));
	register_nav_menu('footer-menu',__('Footer Menu'));
}
add_action('init','add_nav_menus');

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
