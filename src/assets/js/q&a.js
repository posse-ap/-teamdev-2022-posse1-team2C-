$(function () {
  $(".accordion__title").on("click", function () {
    $(this).next(".accordion__content").slideToggle();
    $(this).toggleClass("active");
    $(".accordion__title").not($(this)).next(".accordion__content").slideUp();
    $(".accordion__title").not($(this)).removeClass("active");
  });
});
