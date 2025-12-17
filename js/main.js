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
  // 問い合わせボタンとトップへ戻るボタンの制御
  // -----------------------------------
  const $fixArea = $(".p-fix-area");
  const $targetFooter = $(".l-footer");
  
  // 初期状態は非表示
  $fixArea.hide();

  // スクロール時の動作
  $(window).on("scroll", function () {
    const scrollHeight = $(document).height();
    const scrollPosition = $(window).height() + $(window).scrollTop();
    
    const footHeight = $targetFooter.innerHeight(); 
    const scrollTop = $(this).scrollTop();

    // 1. 表示・非表示の切り替え
    if (scrollTop > 100) {
      $fixArea.fadeIn();
    } else {
      $fixArea.fadeOut();
    }

    // 2. フッター手前で止める制御
    if (scrollHeight - scrollPosition <= footHeight) {
      $fixArea.css({
        "position": "absolute",
        "bottom": footHeight + "px"
      });
    } else {
      $fixArea.css({
        "position": "fixed",
        "bottom": "0"
      });
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
