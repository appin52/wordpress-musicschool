<?php get_header(); ?>
    <main class="p-result-list">
        <!-- ファーストビュー -->
        <section class="p-blog-list__fv p-fv-lower">
            <div class="p-fv-lower__bg">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/result-list/result.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/result-list/result.jpg" alt="卒業実績">
                </picture>
            </div>
            <div class="p-fv-lower__title">
                <h1>卒業実績</h1>
            </div>
        </section>
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumbs'); ?>
        <!-- result-list -->
       <section class="p-result-list__section p-result-section">
            <div class="p-result-section__inner l-inner">
                <h2 class="c-title2">
                    卒業実績一覧
                </h2>
                
                <?php if (have_posts()): ?>
                <div class="p-result-section__list">
                    <?php
                        while (have_posts()):
                            the_post();
                    ?>
                        <div class="p-result-section__item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="<?php the_permalink(); ?>">
                                    <div class="p-result-section__image">
                                     <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="No image">
                                    <?php endif; ?>
                                    </div>
                                    <div class="c-category p-result-section__category">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'genre');
                                        if (!empty($terms) && !is_wp_error($terms)) {
                                            echo esc_html($terms[0]->name);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="p-result-section__textarea">
                                    <h3 class="p-result-section__title"><?php echo wp_trim_words(get_the_title(), 32, '...'); ?></h3>
                                    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    
                    <div class="c-pager">
                        <?php wp_pagenavi(); ?>
                    </div>

                <?php else : ?>
                <div class="c-no-data">
                    <p class="c-no-data__text">投稿された記事はありません。</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="c-no-data__btn c-btn">TOPへ戻る</a>
                </div>
                <?php endif; ?>
                
            </div>
        </section>
</main>
<?php get_template_part('template-parts/fix-area'); ?>
<?php get_footer(); ?>  