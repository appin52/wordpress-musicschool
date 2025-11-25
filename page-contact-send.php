<?php get_header(); ?>
    <main class="p-contact-send">
        <!-- ファーストビュー -->
        <section class="p-contact-send__fv p-fv-lower">
            <div class="p-fv-lower__bg">
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/contact/contact-sp.jpg">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/contact/contact.jpg" alt="お問い合わせ">
                </picture>
            </div>
            <div class="p-fv-lower__title">
                <h1>お問い合わせ</h1>
            </div>
        </section>
        <!-- パンくずリスト -->
        <?php get_template_part('template-parts/breadcrumbs'); ?>
        <!-- contact-form-area -->
        <div class="p-contact-send__area">
            <div class="p-contact-send__inner l-inner">
                <p class="p-contact-send__text">
                    お問い合わせいただきありがとうございました。<br>
                    内容確認後、担当者よりメールにてご連絡いたします。
                </p>
                <div class="p-contact-send__btnarea">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="p-contact-send__btn c-btn">
                    ホームへ戻る
                </a>
                </div>
            </div>
        </div>
    </main>
<?php get_footer(); ?>