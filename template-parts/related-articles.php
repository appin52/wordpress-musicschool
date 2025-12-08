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
?>
<div class="p-blog-details__related p-related">
  <h2 class="p-related__label">関連記事</h2>

  <?php if ( $the_query->have_posts() ) : ?>
    <div class="p-related__list">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php
          $post_terms = get_the_terms(get_the_ID(), $taxonomy);
          $term_name  = '';
          if ( ! empty($post_terms) && ! is_wp_error($post_terms) ) {
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

  <?php else : ?>
    <p class="p-related__no-post">関連記事はありません</p>
  <?php endif; ?>

</div>
<?php
endif;
?>