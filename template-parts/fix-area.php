<div class="p-fix-area">
      <div class="p-fix-area__inner">
         <a href="#" class="c-back-btn">
            <div class="c-back-btn__img">
               <img srcset="<?php echo get_template_directory_uri(); ?>/images/top-back-btn.svg">
            </div>
         </a>
         <?php if ( !is_page('contact') ) : ?>
            <a href="<?php echo esc_url(home_url('contact')); ?>" class="c-btn c-btn--contact" alt="">
               お問い合わせ
            </a>
         <?php endif; ?>
      </div>
</div>