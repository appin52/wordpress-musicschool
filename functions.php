<?php
// --------------------------------------------------
// 最初の設定
// --------------------------------------------------
function custom_theme_setup()
{
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script'
    )
  );
  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'custom_theme_setup');


// --------------------------------------------------
// ファイル読み込み
// --------------------------------------------------
function add_files() {
  $now = date('YmdHis'); // キャッシュ対策（更新反映用）

  // -----------------------------------
  // CSS
  // -----------------------------------
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    array(),
    null
  );

  wp_enqueue_style(
    'common-style',
    get_theme_file_uri('/css/style.css'),
    array('swiper-css'),
    $now
  );

  // -----------------------------------
  // JS
  // -----------------------------------
  wp_deregister_script('jquery');

  wp_enqueue_script(
    'jquery',
    'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
    array(),
    null,
    true
  );

  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    array(),
    null,
    true
  );

  wp_enqueue_script(
    'common-script',
    get_theme_file_uri('/js/main.js'),
    array('jquery'),
    $now,
    true
  );

  if (is_front_page()) {
    wp_enqueue_script(
      'top-script',
      get_theme_file_uri('/js/top.js'),
      array('swiper-js', 'jquery'),
      $now,
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'add_files');


// --------------------------------------------------
//1ページに表示する記事数指定
// --------------------------------------------------
function my_page_conditions($query)
{
  if (!is_admin() && $query->is_main_query()) {
    if (is_post_type_archive(['blog', 'result'])) {
      $query->set('posts_per_page', 10);
    }
    if ($query->is_search()) {
      $query->set('post_type', 'blog');
    }
  }
}
add_action('pre_get_posts', 'my_page_conditions');


// --------------------------------------------------
//管理画面で投稿を非表示
// --------------------------------------------------
function remove_menus() {
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus');


// --------------------------------------------------
//Contact Form 7で自動挿入されるPタグ、brタグを削除
// --------------------------------------------------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}


// --------------------------------------------------
// 管理画面「外観＞メニュー」 を表示
// --------------------------------------------------
function register_my_menus()
{
  register_nav_menus(array(
    'primary' => 'Primary Menu',
    'footer'  => 'Footer Menu',
  ));
}
add_action('after_setup_theme', 'register_my_menus');


// --------------------------------------------------
// SVG表示
// --------------------------------------------------
function add_file_types_to_uploads($file_types){
  $new_filetypes = array('svg' => 'image/svg+xml');
  return array_merge($file_types, $new_filetypes);
}
add_filter('upload_mimes', 'add_file_types_to_uploads');
