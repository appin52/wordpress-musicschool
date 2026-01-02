<?php get_header(); ?>
    <main class="p-blog-list">
        <!-- ファーストビュー -->
        <section class="p-blog-list__fv p-fv-lower">
            <div class="p-fv-lower__bg">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/blog-list/blog-sp.jpg">
                    <img srcset="<?php echo get_template_directory_uri(); ?>/images/blog-list/blog.jpg" alt="プラン・料金">
                </picture>
            </div>
            <div class="p-fv-lower__title">
                <h1>ブログ</h1>
            </div>
        </section>
        <!-- パンくずリスト -->
       <?php get_template_part('template-parts/breadcrumbs'); ?>
        
        <!-- blog-list -->
        <section class="p-blog-list__section p-list-section">
        <div class="p-list-section__inner l-inner">
           <div class="p-list-section__items">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                ?>
                    <a href="<?php the_permalink(); ?>" class="p-list-section__item p-list-item">
                        <div class="p-list-item__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="No Image">
                            <?php endif; ?>
                        </div>
                        <div class="c-category p-list-item__category">
                            <?php
                                $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    echo esc_html($terms[0]->name);
                                }
                            ?>
                        </div>
                        <div class="p-list-item__textarea">
                            <h3 class="p-list-item__title">
                                <?php echo wp_trim_words(get_the_title(), 50, '...'); ?>
                            </h3>
                            <time datetime="<?php the_time('Y-m-d'); ?>" class="p-list-item__time">
                                <?php the_time('Y.m.d'); ?>
                            </time>
                            <p class="p-list-item__article">
                                <?php echo wp_trim_words(get_the_content(), 120, '...'); ?>
                            </p>
                        </div>
                    </a>
                <?php endwhile; else :?>
                    <div class="c-no-data">
                        <p class="c-no-data__text">投稿された記事はありません。</p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="c-no-data__btn c-btn">TOPへ戻る</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        </section>
    </main>
<?php get_template_part('template-parts/fix-area'); ?>
<?php get_footer(); ?> 