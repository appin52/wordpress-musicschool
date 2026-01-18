<?php
// --------------------------------------------------
// 最初の設定
// --------------------------------------------------
function custom_theme_setup()
{
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  // add_theme_support('title-tag');
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


// --------------------------------------------------
// お問い合わせページを除き、「reCAPTCHA」を読み込ませない
// --------------------------------------------------
function load_recaptcha_js() {
 if ( ! is_page( 'contact' ) ) {
  wp_deregister_script( 'google-recaptcha' );
 }
}
add_action( 'wp_enqueue_scripts', 'load_recaptcha_js',100 );

// --------------------------------------------------
// タイトルのカスタマイズ
// --------------------------------------------------
function custom_document_title(string $title): string
{
    $site_name = 'きたむらミュージックスクール';

    // トップページ
    if (is_front_page()) {
        return $site_name . ' | 「音楽で生きる」を叶える ミュージックスクール';
    }

    // 固定ページ
    if (is_page()) {
        return get_the_title() . ' | ' . $site_name;
    }

    // 投稿個別ページ
    if (is_single()) {
        return get_the_title() . ' | ' . $site_name;
    }

    // アーカイブ（ページ番号対応）
    if (is_archive()) {
        $paged = max(1, (int) get_query_var('paged'));

        if (is_category()) {
            $name = single_cat_title('', false);
        } elseif (is_tax()) {
            $name = single_term_title('', false);
        } elseif (is_post_type_archive()) {
            $name = post_type_archive_title('', false);
        } else {
            $name = get_the_archive_title();
        }

        // 2ページ目以降だけ「○ページ目」を付ける
        $suffix = ($paged > 1) ? ' ' . $paged . 'ページ目' : '';

        return $name . '一覧ページ' . $suffix . ' | ' . $site_name;
    }

    // 検索結果
    if (is_search()) {
        return '検索結果 | ' . $site_name;
    }

    // 404
    if (is_404()) {
        return 'お探しのページはございません | ' . $site_name;
    }

    // その他
    return get_the_title() . ' | ' . $site_name;
}
add_filter('pre_get_document_title', 'custom_document_title');

// --------------------------------------------------
// メタディスクリプションの出力
// --------------------------------------------------
function custom_meta_description(): void
{
    $description = '';

    // トップページ
    if (is_front_page()) {
        $description = '「音楽で生きる」を叶える ミュージックスクール「きたむらミュージックスクール」の公式ホームページです。';

    // 固定ページ
    } elseif (is_page()) {
        $description = 'きたむらミュージックスクール公式ホームページの' . get_the_title() . 'ページです。';

    // 投稿個別ページ
    } elseif (is_single()) {
        if (has_excerpt()) {
            $description = get_the_excerpt();
        } else {
            $content = get_the_content();
            $content = wp_strip_all_tags($content);      // HTML除去
            $content = preg_replace('/\s+/u', '', $content); // 改行・空白除去
            $description = mb_substr($content, 0, 120, 'UTF-8');
        }

    // 投稿アーカイブ
    } elseif (is_archive()) {
        if (is_category()) {
            $name = single_cat_title('', false);
        } elseif (is_tax()) {
            $name = single_term_title('', false);
        } elseif (is_post_type_archive()) {
            $name = post_type_archive_title('', false);
        } else {
            $name = get_the_archive_title();
        }

        $description = 'きたむらミュージックスクール公式ホームページの' . $name . '一覧ページです。';

    // 検索結果
    } elseif (is_search()) {
        $description = 'きたむらミュージックスクール公式ホームページの検索結果ページです。';

    // 404
    } elseif (is_404()) {
        $description = 'きたむらミュージックスクール公式ホームページの404ページです。';

    // その他のページ
    } else {
        $description = 'きたむらミュージックスクール公式ホームページの' . get_the_title() . 'ページです。';
    }

    if ($description !== '') {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }
}
add_action('wp_head', 'custom_meta_description', 1);