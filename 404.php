<?php get_header(); ?>
    <main class="p-404">
        <!-- ファーストビュー -->
        <section class="p-404__fv p-fv-lower">
            <div class="p-fv-lower__bg">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/404/404-sp.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/404/404.jpg" alt="404 not fonud">
                </picture>
            </div>
            <div class="p-fv-lower__title">
                <h1>404 not fonud</h1>
            </div>
        </section>
        <!-- 404 -->
        <div class="p-404__area">
            <div class="p-404__inner l-inner">
                <p class="p-404__text">
                    申し訳ございませんが、お探しのページが見つかりませんでした。<br>
                    お探しのページは一時的に表示ができない状態にあるか、移動または削除された可能性があります。
                </p>
                <div class="p-404__btnarea">
                <a href="index.html" class="p-404__btn c-btn">
                    ホームへ戻る
                </a>
                </div>
            </div>
        </div>
    </main>
 <?php get_footer(); ?> 