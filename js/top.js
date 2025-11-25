'use strict';

$(function () {

  // -----------------------------------
  // アコーディオン
  // -----------------------------------
  $('.p-qa-list__a').hide();

  // 質問クリックで開閉
  $('.p-qa-list__q').off('click.qa').on('click.qa', function (e) {
    e.preventDefault();
    e.stopPropagation();

    const $q = $(this);
    const $a = $q.next('.p-qa-list__a');

    if ($a.is(':visible')) {
      $a.stop(true, true).slideUp(200);
      $q.removeClass('active');
    } else {
      $a.stop(true, true).slideDown(200);
      $q.addClass('active');
    }
  });

  // 答えをクリックしても閉じる
  $('.p-qa-list__a').on('click', function () {
    const $answer = $(this);
    const $question = $answer.prev('.p-qa-list__q');
    $answer.slideUp();
    $question.removeClass('active');
  });

  // -----------------------------------
  // スライダー
  // -----------------------------------
  if (document.querySelector('.p-voice-slider')) {
  const voiceSlider = new Swiper('.p-voice-slider', {
    loop: true,
    // SP（767px以下）：1枚全幅（ベース設定）
    slidesPerView: 1,

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // 768px以上の場合に上書き
    breakpoints: {
      768: {
        slidesPerView: 'auto', // PCで3枚表示（CSS側で幅調整）
      },
    },
  });
}


});