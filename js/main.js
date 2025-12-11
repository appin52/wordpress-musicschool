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
  // 問い合わせボタンとトップへ戻るボタンを途中から表示
  // -----------------------------------
  const fixArea = $(".p-fix-area");
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      fixArea.fadeIn();
    } else {
      fixArea.fadeOut();
    }
  });

  // -----------------------------------
  // 画面の高さまで表示領域を広げる
  // -----------------------------------
  const $footer = $(".l-footer");
  if (window.innerHeight > $footer.offset().top + $footer.outerHeight()) {
    console.log($footer.offset().top);
    $footer.attr({
      style:
        "position:fixed; width:100%; top:" +
        (window.innerHeight - $footer.outerHeight()) +
        "px;",
    });
  }

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

  // -----------------------------------
 // フォームバリデーションメッセージ表示
 // -----------------------------------
 $(".wpcf7-submit").click(function () {
   $(".wpcf7-form-control-wrap").addClass("is-show");
 });

});
