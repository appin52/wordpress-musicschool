'use strict';

$(function(){

  $('body').show();

  // -----------------------------------
  // ハンバーガーメニュー
  // -----------------------------------
  $('.c-hamburger').click(function() {
    $(this).toggleClass('active');
    $('.p-header-nav__lists').toggleClass('active');
  });


  // -----------------------------------
  // トップへ戻るボタン・お問い合わせボタン
  // -----------------------------------

  const btn = $('.js-contact-btn');
  const topArrow = $('.c-back-btn');
  const footer = $('.l-footer');

  $(window).on('scroll', function () {
    const scrollTop = $(this).scrollTop();
    const windowHeight = $(window).height();
    const footerTop = footer.offset().top;
    const btnHeight = btn.length ? btn.outerHeight() : 0;
    const bottomSpace = (window.innerWidth <= 767) ? 20 : 30;

    // スクロール量による表示制御
    if (scrollTop > 100) {
      btn.addClass('active');
      topArrow.addClass('active');
    } else {
      btn.removeClass('active');
      topArrow.removeClass('active');
    }

    // フッター手前で位置を変える
    if (scrollTop + windowHeight > footerTop - bottomSpace) {
      // absolute配置（フッター上に重ならないように）
      if (btn.length) {
        btn.css({
          position: 'absolute',
          bottom: windowHeight - footerTop + 'px',
        });
        topArrow.css({
          position: 'absolute',
          bottom: windowHeight - footerTop + btnHeight + bottomSpace + 'px',
        });
      } else {
        topArrow.css({
          position: 'absolute',
          bottom: windowHeight - footerTop + bottomSpace + 'px',
        });
      }
    } else {
      // fixed配置（通常スクロール中）
      if (btn.length) {
        btn.css({
          position: 'fixed',
          bottom: '0px',
        });
        topArrow.css({
          position: 'fixed',
          bottom: (window.innerWidth <= 767 ? 69 : 81) + 'px', // お問い合わせボタンの上
        });
      } else {
        topArrow.css({
          position: 'fixed',
          bottom: bottomSpace + 'px',
        });
      }
    }
  });

  // スムーススクロール
  $('.c-back-btn').click(function (event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 700, 'swing');
  });

  // -----------------------------------
  // テキスト省略（25文字）
  // -----------------------------------
  const LIMIT25 = 25;
  $('.js-ellipsis25').each(function(){
    const txt = $(this).text().trim();
    if (txt.length > LIMIT25) {
      $(this).text(txt.substr(0, LIMIT25) + '…');
    }
  });

  // -----------------------------------
  // テキスト省略（15文字）
  // -----------------------------------
  const LIMIT15 = 15;
  $('.js-ellipsis15').each(function(){
    const txt = $(this).text().trim();
    if (txt.length > LIMIT15) {
      $(this).text(txt.substr(0, LIMIT15) + '…');
    }
  });

});
