//ドロップダウンの設定を関数でまとめる
function mediaQueriesWin() {
  $(".hamburger__nav__item>a").off("click");
  console.log("a");
  $(".hamburger__nav__item>a").on("click", function () {
    var parentElem = $(this).parent();
    console.log(parentElem);
    $(parentElem).toggleClass("header__active"); //矢印方向を変えるためのクラス名を付与して
    $(parentElem).children("ul").stop().slideToggle(500); //liの子要素のスライドを開閉させる※数字が大きくなるほどゆっくり開く
    return false;
  });
}

$(window).on("load", function () {
  mediaQueriesWin();
});
