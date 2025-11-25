<?php get_header(); ?>
    <main class="p-blog-details">
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumbs'); ?>
        <!-- blog-details -->
        <div class="l-two-col-container l-inner">
            <!-- メイン  -->
            <div class="l-two-col-container__main">
                <!-- ブログ詳細エリア -->
                <?php
                if (have_posts()):
                 while (have_posts()):
                  the_post();
                ?>
                <section class="p-blog-details__main">
                    <div class="p-blog-details__head">
                        <div class="p-blog-details__imgarea">
                            <div class="p-blog-details__image">
                               <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="No image">
                                <?php endif; ?>
                            </div>
                            <div class="c-category p-blog-details__category">
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'blog_cate');
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    echo esc_html($terms[0]->name);
                                }
                                ?>
                            </div>
                        </div>
                        <h1 class="p-blog-details__title">
                            <?php the_title(); ?>
                        </h1>
                        <time datetime="<?php the_time('Y-m-d'); ?>" class="p-blog-details__time">
                            <?php the_time('Y.m.d'); ?>
                        </time>
                        <div class="p-blog-details__sns p-sns-share">
                            <?php
                            $url = urlencode(get_permalink());
                            $title = urlencode(get_the_title());
                            ?>
                            <a href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url); ?>" class="p-sns-share__item p-facebook">
                                <span class="p-facebook__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-details/icon-share-facebook.svg" alt="facebook">
                                </span>
                                <span class="p-sns-share__name u-pc">Facebook</span>
                            </a>
                            <a href="<?php echo esc_url('https://x.com/share?url=' . $url . '&text=' . $title); ?>" class="p-sns-share__item p-twitter">
                                <span class="p-twitter__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-details/icon-share-twitter.svg" alt="twitter">
                                </span>
                                <span class="p-sns-share__name u-pc">Twitter</span>
                            </a>
                            <a href="<?php echo esc_url('http://b.hatena.ne.jp/add?mode=confirm&url=' . $url . '&title=' . $title); ?>" class="p-sns-share__item p-hatena">
                                <span class="p-hatena__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-details/icon-share-hatena.svg" alt="hatena">
                                </span>
                                <span class="p-sns-share__name u-pc">Hatena</span>
                            </a>
                            <a href="<?php echo esc_url('https://social-plugins.line.me/lineit/share?url=' . $url); ?>" class="p-sns-share__item p-line">
                                <span class="p-line__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-details/icon-share-line.svg" alt="line">
                                </span>
                                <span class="p-sns-share__name u-pc">Twitter</span>
                            </a>
                            <a href="<?php echo esc_url('https://getpocket.com/edit?url=' . $url . '&title=' . $title); ?>" class="p-sns-share__item p-pocket">
                                <span class="p-pocket__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog-details/icon-share-pocket.svg" alt="pocket">
                                </span>
                                <span class="p-sns-share__name u-pc">Pocket</span>
                            </a>
                        </div>
                    </div>
                    <div class="p-blog-details__contents">
                        <div class="p-blog-details__body p-blog-body">
                            <?php the_content(); ?>
                        </div>

                <!-- ページネーション  -->
                <?php get_template_part('template-parts/single-pagination'); ?>

                <!-- 関連記事 -->
                <?php get_template_part('template-parts/related-articles'); ?>
            </div>
        </section>
        <?php
         endwhile;
        endif;
        ?>
        </div>
        <?php get_sidebar(); ?>
        </div>
    <?php get_template_part('template-parts/fix-area'); ?>
    </main>
 <?php get_footer(); ?>   