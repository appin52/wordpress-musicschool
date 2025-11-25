<?php get_header(); ?>
    <main class="p-search">
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumbs'); ?>
        <!-- search-list -->
        <section class="p-search__list p-search-list">
            <div class="p-search-list__inner l-inner">
                    <?php if (!empty(get_search_query())): ?>
                    <?php
                    if (have_posts()):
                    $total_posts = $wp_query->found_posts;
                    ?>
                <div class="p-search-list__keyword">
                    <h1 class="p-search-list__title">
                        「<span><?php echo get_search_query(); ?></span>」の検索結果
                    </h1>
                    <p><?php echo $total_posts ?>件</p>
                </div>
            <div class="p-search-list__items">
                <?php
                while (have_posts()):
                the_post();
                ?>
                <a href="<?php the_permalink(); ?>" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="No image">
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
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title">
                                <?php echo wp_trim_words(get_the_title(), 26, '...'); ?>
                            </h2>
                            <time datetime="<?php the_time('Y-m-d'); ?>" class="p-list-item__time">
                                <?php the_time('Y.m.d'); ?>
                            </time>
                            <p class="p-list-item__article">
                                <?php echo wp_trim_words(get_the_content(), 120, '...'); ?>
                            </p>
                        </div>
                    </div>
                </a>
                <?php
                endwhile;
                ?>
                <!-- <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog02sp.jpg">
                                <img src="images/blog-list/blog02.png" alt="集客してる間は売れないという法則">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                集客方法
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                集客してる間は売れないという法則
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                 <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog03sp.jpg">
                                <img src="images/blog-list/blog03.png" alt="フォロワーではなくファンを増やせとは？">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                SNS
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                フォロワーではなくファンを増やせとは？
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                 <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog01sp.jpg">
                                <img src="images/blog-list/blog01.png" alt="技術面はプロによるマンツーマン授業！">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                ギター
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                アルペジオが劇的に向上する3つの習慣
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog02sp.jpg">
                                <img src="images/blog-list/blog02.png" alt="集客してる間は売れないという法則">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                集客方法
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                集客してる間は売れないという法則
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                 <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog03sp.jpg">
                                <img src="images/blog-list/blog03.png" alt="フォロワーではなくファンを増やせとは？">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                SNS
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                フォロワーではなくファンを増やせとは？
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                 <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog01sp.jpg">
                                <img src="images/blog-list/blog01.png" alt="技術面はプロによるマンツーマン授業！">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                ギター
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                アルペジオが劇的に向上する3つの習慣
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog02sp.jpg">
                                <img src="images/blog-list/blog02.png" alt="集客してる間は売れないという法則">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                集客方法
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                集客してる間は売れないという法則
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                 <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog03sp.jpg">
                                <img src="images/blog-list/blog03.png" alt="フォロワーではなくファンを増やせとは？">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                SNS
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                フォロワーではなくファンを増やせとは？
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a>
                <a href="./blog-details.html" class="p-list-section__item p-list-item">
                    <div class="p-list-item__wrap">
                        <div class="p-list-item__right">
                            <div class="p-list-item__image">
                            <picture>
                                <source media="(max-width: 767px)" srcset="images/blog-list/blog01sp.jpg">
                                <img src="images/blog-list/blog01.png" alt="技術面はプロによるマンツーマン授業！">
                            </picture>
                            </div>
                            <div class="c-category p-list-item__category">
                                ギター
                            </div>
                        </div>
                        <div class="p-list-item__textarea">
                            <h2 class="p-list-item__title js-ellipsis25">
                                アルペジオが劇的に向上する3つの習慣
                            </h2>
                            <time datetime="0000-00-00" class="p-list-item__time">
                                0000.00.00
                            </time>
                            <p class="p-list-item__article">
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                                本文が入ります。本文が入ります。本文が入ります。本文が入ります。
                            </p>
                        </div>
                    </div>
                </a> -->
            </div>
            <!-- ページネーション -->
             <div class="c-pager">
                <?php wp_pagenavi(); ?>
            </div>
            <?php else : ?>
            <div class="p-search-result__no-result">
                <p>検索されたキーワードにマッチする<br class="pc-none">記事はありませんでした。</p>
                <a onclick="history.back()" class="p-search-result__btn c-btn">戻る</a>
            </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="p-search-result__no-result">
            <p>検索キーワードが未入力です。</p>
            <a onclick="history.back()" class="p-search-result__btn c-btn">戻る</a>
            </div>
        <?php endif; ?>
        </div>
        </div>
        </section>
     <?php get_template_part('template-parts/fix-area'); ?>
    </main>
 <?php get_footer(); ?> 