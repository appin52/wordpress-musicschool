<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
  // トップページ（フロントページ）の場合
  if (is_front_page()): ?>
    <title>きたむらミュージックスクール | 「音楽で生きる」を叶える ミュージックスクール</title>
    <meta name="description" content="「音楽で生きる」を叶える ミュージックスクール「きたむらミュージックスクール」の公式ホームページです。">

  <?php
  // 固定ページの場合
  elseif (is_page()): ?>
    <title><?php echo get_the_title(); ?> | きたむらミュージックスクール</title>
    <meta name="description" content="きたむらミュージックスクール公式ホームページの<?php echo get_the_title(); ?>ページです。">

  <?php
  // 投稿ページの場合
  elseif (is_single()): ?>
    <title><?php echo get_the_title(); ?> | きたむらミュージックスクール</title>

    <?php
    // 投稿に「抜粋」があるかチェック
    if (has_excerpt()) {
      // 抜粋がある場合はそれを説明文に使う
      $excerpt = get_the_excerpt();
    } else {
      // 抜粋がない場合は本文から120文字を取り出して説明文に使う
      $content = get_the_content();
      $content = strip_tags($content); // HTMLタグを除去
      $content = str_replace(["\r\n", "\r", "\n", "&nbsp;"], '', $content); // 改行や空白を除去
      $excerpt = mb_substr($content, 0, 120, "UTF-8"); // 最初の120文字を取得
    }
    ?>
    <meta name="description" content="<?php echo esc_attr($excerpt); ?>">

  <?php
  // アーカイブページ（カテゴリ・タグ・カスタム投稿タイプ一覧など）の場合
  elseif (is_archive()): ?>
    <?php
    // 現在のページ番号を取得（1ページ目は「1」になる）
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    // カテゴリーアーカイブ
    if (is_category()) {
      $term_name = single_cat_title('', false);
    }
    // カスタムタクソノミー
    elseif (is_tax()) {
      $term_name = single_term_title('', false);
    }
    // カスタム投稿タイプのアーカイブ
    elseif (is_post_type_archive()) {
      $post_type_obj = get_post_type_object(get_post_type());
      $term_name = $post_type_obj ? $post_type_obj->labels->name : '一覧';
    }
    // その他のアーカイブ
    else {
      $term_name = '一覧';
    }

    // 2ページ目以降かどうかでタイトルを変える
    if ($paged > 1) {
      $title = $term_name . '一覧ページ ' . $paged . 'ページ目';
      $description = 'きたむらミュージックスクール公式ホームページの' . $term_name . '一覧ページ ' . $paged . 'ページ目です。';
    } else {
      $title = $term_name . '一覧ページ';
      $description = 'きたむらミュージックスクール公式ホームページの' . $term_name . '一覧ページです。';
    }
    ?>
    <title><?php echo esc_html($title); ?> | きたむらミュージックスクール</title>
    <meta name="description" content="<?php echo esc_attr($description); ?>">

  <?php
  // 検索結果ページの場合
  elseif (is_search()): ?>
    <title>検索結果 | きたむらミュージックスクール</title>
    <meta name="description" content="きたむらミュージックスクール公式ホームページの検索結果ページです。">

  <?php
  // 404ページ
  elseif (is_404()): ?>
    <title>お探しのページはございません | きたむらミュージックスクール</title>
    <meta name="description" content="きたむらミュージックスクール公式ホームページの404ページです。">

  <?php
  // それ以外のページ
  else: ?>
    <title><?php echo get_the_title(); ?> | きたむらミュージックスクール</title>
    <meta name="description" content="きたむらミュージックスクール公式ホームページの<?php echo get_the_title(); ?>ページです。">
  <?php endif; ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon180x180.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.svg">
    <meta property="og:title" content="きたむらミュージックスクール">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://rina-suzuki.com/musicschool/images/ogp.jpg">
    <meta property="og:url" content="https://rina-suzuki.com/musicschool/">
    <meta property="og:description" content="音楽業界初！収益化までサポートするミュージックスクールです">
    <meta property="og:site_name" content="きたむらミュージックスクール">
    <meta property="og:locale" content="ja_JP">
    <meta name="twitter:card" content="Summary with Large Image">
    <!-- Webフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
    <!-- Webフォント -->
<?php wp_head(); ?>
</head>
<body style="display: none;">
<div id="container">
    <header class="l-header p-header">
        <div class="p-header__inner">
            <?php if ( is_front_page() || is_search() ) : ?>
                <h1 class="l-header__logo">
            <?php else : ?>
                <div class="l-header__logo">
             <?php endif; ?>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="p-header__logo p-header-logo">
                <div class="p-header-logo__image">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-red.svg' ); ?>" alt="きたむらミュージックスクール">
                </div>
            <span class="p-header-logo__text">
            きたむら<br class="u-pc"><span>ミュージックスクール</span>
            </span>
        </a>

        <?php if ( is_front_page() || is_search() ) : ?>
        </h1>
        <?php else : ?>
        </div>
        <?php endif; ?>
            <div class="p-header__right">
                <div class="c-hamburger u-sp">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="p-header__nav p-header-nav" aria-label="ヘッダーナビゲーション">
                    <?php
                    wp_nav_menu(
                    array(
                        'menu_class'     => 'p-header-nav__lists',
                        'theme_location' => 'primary',
                        'container'      => false,
                    )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>