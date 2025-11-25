<?php get_header(); ?>
    <main class="p-contact-form">
        <!-- ファーストビュー -->
        <section class="p-contact-form__fv p-fv-lower">
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
        <div class="p-contact-form__area">
            <div class="p-contact-form__inner l-inner">
                <p class="p-contact-form__text">
                    当校に関するご質問・ご相談・資料請求は下記のフォームからお気軽にお問い合わせください。<br>
                    通常３営業日以内にメールにてご連絡させていただきます。
                </p>
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        remove_filter('the_content', 'wpautop');
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
     <?php get_template_part('template-parts/fix-area'); ?>
    </main>
<?php get_footer(); ?>     