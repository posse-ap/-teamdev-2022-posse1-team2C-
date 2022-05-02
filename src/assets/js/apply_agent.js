function changeForm(e) {
  const next__apply =
    e.target.parentNode.parentNode.parentNode.nextElementSibling;

  // すべてのSTEPを非表示
  document
    .querySelectorAll('[role="apply"]')
    .forEach((p) => p.setAttribute("hidden", true));

  // 次のSTEPを表示
  next__apply.removeAttribute("hidden");

  window.scroll({ top: 0, left: 0, behavior: "smooth" });
}

// イベントを非同期で取得する
HTMLElement.prototype.observe = function (type) {
  const getHandler = (resolve) => {
    const result = () => {
      resolve();
      this.removeEventListener(type, result);
    };
    return result;
  };
  return new Promise((resolve) =>
    this.addEventListener(type, getHandler(resolve))
  );
};

(async () => {
  while (true) {
    document.querySelectorAll('[role="submit"]').forEach((element) => {
      element.addEventListener(
        "click",
        function (t) {
          console.log(t);
          t.preventDefault();
          changeForm(t);
        },
        false
      );
    });

    // ボタンクリックを待つ
    await document.getElementById("step1").observe("click");

    // 確認画面に内容を挿入する
    const formElements = document.forms.apply__form;
    document.getElementById("insert__agent").innerHTML =
      formElements.name.value;
    document.getElementById("insert__url").innerHTML =
      formElements.url.value;
    document.getElementById("insert__name__kanji").innerHTML =
      formElements.name__kanji.value;
    document.getElementById("insert__name__kana").innerHTML =
      formElements.name__kana.value;
    document.getElementById("insert__mail").innerHTML =
      formElements.email.value;
    document.getElementById("insert__tel").innerHTML = formElements.tel.value;
    document.getElementById("insert__postcode").innerHTML =
      formElements.postcode.value;
    document.getElementById("insert__address").innerHTML =
      formElements.address.value;
    document.getElementById("insert__content").innerHTML =
      formElements.content.value;

    document.querySelectorAll("#back").forEach((element) => {
      element.addEventListener(
        "click",
        function (h) {
          console.log(h);
          h.preventDefault();
          toBackForm(h);
        },
        false
      );
    });

    // 戻るボタンのクリックを待つ

    await document.getElementById("back").observe("click");

    function toBackForm(e) {
      const now__apply = e.target.parentNode.parentNode.parentNode;
      const back__apply = now__apply.previousElementSibling;
      now__apply.setAttribute("hidden", true);
      back__apply.removeAttribute("hidden");

      window.scroll({ top: 0, left: 0, behavior: "smooth" });
    }
  }
})();
