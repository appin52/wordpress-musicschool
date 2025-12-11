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
  const fixArea = $(".p-fix-area");
  const footer = $(".l-footer"); // ★フッターのクラス名を指定
  
  // 基本の浮く位置（CSSで設定する bottom: 0; などと同じ値にする）
  const defaultBottom = 0; 

  $(window).on("scroll", function () {
    const scrollPosition = $(this).scrollTop();
    const windowHeight = $(window).height();
    const bodyHeight = $(document).height();

    // --- 1. 表示・非表示の切り替え（元のコード） ---
    if (scrollPosition > 100) {
      fixArea.fadeIn();
    } else {
      fixArea.fadeOut();
    }

    // --- 2. フッターで止まる処理（今回追加） ---
    // フッターの開始位置を取得
    const footerTop = footer.offset().top;
    
    // 現在の画面下端の位置
    const currentBottom = scrollPosition + windowHeight;

    // 画面下端がフッター位置を超えた場合
    if (currentBottom > footerTop) {
        // 重なっている分だけ bottom の値を増やす
        const pushUp = currentBottom - footerTop + defaultBottom;
        fixArea.css("bottom", pushUp + "px");
    } else {
        // フッターより上の時は元の位置に戻す
        fixArea.css("bottom", defaultBottom + "px");
    }
  });

  // -----------------------------------
  // 画面の高さまで表示領域を広げる
  // -----------------------------------
  const $footer = $(".l-footer");
  if (window.innerHeight > $footer.offset().top + $footer.outerHeight()) {
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
