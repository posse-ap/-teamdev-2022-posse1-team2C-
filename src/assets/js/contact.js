function changeForm(e) {
  const next__apply =
    e.target.parentNode.parentNode.parentNode.nextElementSibling;

  // すべてのSTEPを非表示
  document
    .querySelectorAll('[role="contact__form"]')
    .forEach((p) => p.setAttribute("hidden", true));

  // 次のSTEPを表示
  next__apply.removeAttribute("hidden");

  window.scroll({top: 0, left: 0, behavior: 'smooth'});
}

document.querySelectorAll('[type="submit"]').forEach((element) => {
  element.addEventListener(
    "click",
    function (t) {
      t.preventDefault();
      changeForm(t);
    },
    false
  );
});
