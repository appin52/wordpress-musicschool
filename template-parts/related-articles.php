<!-- <?php
$post_type = get_post_type(); // 投稿タイプを取得
$post_id = get_the_ID();

// 投稿タイプに応じて使うタクソノミーを定義（必要に応じて追加可能）
$taxonomy_map = [
  'blog' => 'blog_cate',
  'result' => 'genre',
];

// 投稿タイプに対応するタクソノミーが定義されているか確認
if (!isset($taxonomy_map[$post_type])) {
  return;
}

$taxonomy = $taxonomy_map[$post_type];
$terms = get_the_terms($post_id, $taxonomy);

if (!empty($terms)) :
  $term_ids = wp_list_pluck($terms, 'term_id');

  $args = [
    'posts_per_page' => 3,
    'post_type' => $post_type,
    'post__not_in' => [$post_id],
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
      [
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $term_ids,
      ],
    ],
  ];

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) :
?>
<div class="p-blog-details__related p-related">
    <h2 class="p-related__label">
        関連記事
    </h2>
    <div class="p-related__list">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <?php
        // 投稿の最初のタームの名前を取得
        $post_terms = get_the_terms(get_the_ID(), 'blog_cate');
        $term_name = (!empty($post_terms)) ? $post_terms[0]->name : '';
        ?>
        <a href="<?php the_permalink(); ?>" class="p-related__item">
            <div class="p-related__wrap">
                <div class="p-related__right p-related__right2">
                    <div class="p-related__image2">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/common/no-image.png" alt="No image">
                        <?php endif; ?>
                    </div>
                    <div class="c-category p-related__category">
                        <?php echo esc_html($term_name); ?>
                    </div>
                </div>
                <div class="p-related__textarea p-related__textarea2">
                    <h3 class="p-related__title">
                        <?php echo wp_trim_words(get_the_title(), 32, '...'); ?>
                    </h3>
                    <time datetime="0000-00-00" class="p-related__time">
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?>
                    </time>
                </div>
            </div>
        </a>
    <?php endwhile;
    wp_reset_postdata(); ?>
    </div>
</div>
<?php
    endif;
endif;
?> -->

<!-- 新しいコード -->
<?php
$post_type = get_post_type(); // 現在の投稿タイプ
$post_id   = get_the_ID();

// 投稿タイプごとのタクソノミーマップ
$taxonomy_map = [
  'blog'   => 'blog_cate',
  'result' => 'genre',
];

// マップにない投稿タイプなら何も出さない
if ( ! isset($taxonomy_map[$post_type]) ) {
  return;
}

$taxonomy = $taxonomy_map[$post_type];
$terms    = get_the_terms($post_id, $taxonomy);

if ( ! empty($terms) && ! is_wp_error($terms) ) :
  $term_ids = wp_list_pluck($terms, 'term_id');

  $args = [
    'posts_per_page'      => 3,
    'post_type'           => $post_type,
    'post__not_in'        => [$post_id],
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
    'tax_query'           => [
      [
        'taxonomy' => $taxonomy,
        'field'    => 'term_id',
        'terms'    => $term_ids,
      ],
    ],
  ];

  $the_query = new WP_Query($args);

  if ( $the_query->have_posts() ) :
?>
<div class="p-blog-details__related p-related">
  <h2 class="p-related__label">関連記事</h2>
  <div class="p-related__list">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php
        // ここの取得も “$taxonomy” を使うのが肝！
        $post_terms = get_the_terms(get_the_ID(), $taxonomy);
        $term_name  = '';
        if ( ! empty($post_terms) && ! is_wp_error($post_terms) ) {
          // 複数タームを「 / 」で連結（好みで変更OK）
          $term_name = implode(' / ', wp_list_pluck($post_terms, 'name'));
        }
      ?>
      <a href="<?php the_permalink(); ?>" class="p-related__item">
        <div class="p-related__wrap">
          <div class="p-related__right">
            <div class="p-related__image">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/common/no-image.png' ); ?>" alt="No image">
              <?php endif; ?>
            </div>
            <div class="c-category p-related__category">
              <?php echo esc_html($term_name); ?>
            </div>
          </div>
          <div class="p-related__textarea">
            <h3 class="p-related__title">
              <?php echo esc_html( wp_trim_words( get_the_title(), 32, '...' ) ); ?>
            </h3>
            <time class="p-related__time" datetime="<?php echo esc_attr( get_the_date('Y-m-d') ); ?>">
              <?php echo esc_html( get_the_date('Y.m.d') ); ?>
            </time>
          </div>
        </div>
      </a>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</div>
<?php
  endif;
endif;
