<!-- トップへ戻るボタン -->
 <a href="#" class="c-back-btn">
    <div class="c-back-btn__icon">
        <img srcset="<?php echo get_template_directory_uri(); ?>/images/top-back-btn.svg">
    </div>
 </a>

<!-- お問い合わせボタン -->
<?php if ( !is_page('contact') ) : ?>
 <a href="<?php echo esc_url(home_url('contact')); ?>" class="c-btn c-btn--contact js-contact-btn">
    お問い合わせ
 </a>
 <?php endif; ?>